# Environment-Aware CSP Configuration

This project implements a conditional Content Security Policy (CSP) that automatically adapts based on the environment, following Laravel and Apache best practices.

## Implementation Overview

### Apache Configuration (`.devcontainer/apache-config.conf`)

The Apache configuration uses environment variable detection to apply different CSP policies:

```apache
# Environment detection based on hostname
SetEnvIf Host "localhost" IS_DEVELOPMENT
SetEnvIf Host "127.0.0.1" IS_DEVELOPMENT
SetEnvIf Host ".*\.local$" IS_DEVELOPMENT

# Development CSP - includes Vite dev server for HMR
Header always set Content-Security-Policy "..." env=IS_DEVELOPMENT

# Production CSP - strict policy for compiled assets
Header always set Content-Security-Policy "..." env=!IS_DEVELOPMENT
```

### Laravel Middleware (`app/Http/Middleware/SecurityHeaders.php`)

The SecurityHeaders middleware provides additional environment-aware security:

- **Development Environment**: Allows `unsafe-inline`, `unsafe-eval`, and Vite dev server
- **Production Environment**: Strict CSP with nonce support and HSTS headers

### Laravel CSP Nonce Support

The Blade template includes Laravel's CSP nonce for enhanced security:

```php
{!! Vite::useCspNonce() !!}
@vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])
```

## Environment Detection

### Development Triggers

- `APP_ENV=local` in Laravel
- Hostnames: `localhost`, `127.0.0.1`, `*.local`
- Vite dev server running on port 5173

### Production Characteristics

- `APP_ENV=production` in Laravel
- Custom domain names
- Compiled assets via `npm run build`

## Security Policies

### Development CSP

```
default-src 'self';
script-src 'self' 'unsafe-inline' 'unsafe-eval' http://localhost:5173 ws://localhost:5173;
style-src 'self' 'unsafe-inline' http://localhost:5173;
img-src 'self' data: https:;
font-src 'self' data: https:;
connect-src 'self' http://localhost:5173 ws://localhost:5173;
object-src 'none';
base-uri 'self'
```

### Production CSP

```
default-src 'self';
script-src 'self' 'nonce-{random}';
style-src 'self' 'unsafe-inline';
img-src 'self' data: https:;
font-src 'self' data: https:;
connect-src 'self';
object-src 'none';
base-uri 'self';
frame-ancestors 'none';
form-action 'self'
```

## Additional Security Headers

Both environments include:

- `X-Content-Type-Options: nosniff`
- `X-Frame-Options: DENY`
- `X-XSS-Protection: 1; mode=block`
- `Referrer-Policy: strict-origin-when-cross-origin`

Production additionally includes:

- `Strict-Transport-Security: max-age=31536000; includeSubDomains; preload`

## Usage

### Development Workflow

1. Start containers: `docker-compose up -d`
2. Install dependencies: `composer install && npm install`
3. Run development servers: `composer run dev`
4. Access application: `http://localhost:80`

The system automatically detects development environment and applies relaxed CSP.

### Production Deployment

1. Set `APP_ENV=production` in environment
2. Build assets: `npm run build`
3. Deploy with production domain
4. System automatically applies strict CSP with nonce support

## Testing CSP

### Development Testing

```bash
# Check CSP headers in development
curl -I http://localhost:80
```

### Production Testing

```bash
# Simulate production environment
export APP_ENV=production
# Check strict CSP headers
curl -I https://your-production-domain.com
```

## Troubleshooting

### Common Issues

1. **Vite HMR not working**: Ensure development CSP includes `localhost:5173` for WebSocket connections
2. **Assets blocked in production**: Verify assets are built via `npm run build` and nonce is properly set
3. **Mixed environment**: Check `APP_ENV` and hostname detection in Apache configuration

### Debug Commands

```bash
# Check Laravel environment
php artisan env

# Verify CSP headers
curl -I -H "Host: localhost" http://your-domain

# Test nonce generation
php artisan tinker
>>> \Illuminate\Support\Facades\Vite::cspNonce()
```

## Best Practices

1. **Environment Variables**: Use `APP_ENV` for Laravel-level detection
2. **Hostname Detection**: Use Apache `SetEnvIf` for web server-level policies
3. **Nonce Support**: Always implement Laravel's nonce system for production
4. **Asset Compilation**: Ensure production uses `npm run build` for optimized assets
5. **HSTS**: Enable only in production with HTTPS

## Security Considerations

- Development CSP allows `unsafe-inline` and `unsafe-eval` for developer tools
- Production CSP uses nonces and strict policies
- Both policies disallow `object-src` and restrict `base-uri`
- Production includes additional protections like `frame-ancestors 'none'`

This configuration provides a secure foundation that adapts to your deployment environment while maintaining developer productivity.
