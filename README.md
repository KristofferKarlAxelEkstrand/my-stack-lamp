# Laravel LAMP Stack

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<p align="center">
  <img alt="Laravel" src="https://img.shields.io/badge/Laravel-12.21.0-red?style=flat&logo=laravel">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-8.3-blue?style=flat&logo=php">
  <img alt="MariaDB" src="https://img.shields.io/badge/MariaDB-10.11-brown?style=flat&logo=mariadb">
  <img alt="Docker" src="https://img.shields.io/badge/Docker-Enabled-blue?style=flat&logo=docker">
</p>

Modern containerized LAMP stack with Laravel 12, featuring Docker, Vite, and TailwindCSS.

## Quick Start

### Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [VS Code](https://code.visualstudio.com/) with [Dev Containers extension](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers)

### Setup Steps

1. **Clone & Open**

   ```bash
   git clone <your-repo-url>
   cd my-stack-lamp
   code .
   ```

2. **Launch Dev Container**
   - VS Code will prompt: "Reopen in Container"
   - Click **Reopen in Container** (first time: ~2-3 minutes)

3. **Start Development**

   ```bash
   composer run dev
   ```

4. **Access Your App**
   - **Laravel**: <http://localhost>
   - **phpMyAdmin**: <http://localhost:8080>
   - **Test DB**: <http://localhost/test>

## What's Included

| Service   | Technology       | Port | Purpose            |
| --------- | ---------------- | ---- | ------------------ |
| **Web**   | PHP 8.3 + Apache | 80   | Laravel app server |
| **DB**    | MariaDB 10.11    | 3306 | Database           |
| **Admin** | phpMyAdmin       | 8080 | DB management      |

### Tech Stack

- **Laravel 12.21.0** - PHP framework
- **PHP 8.3** - Server-side scripting
- **MariaDB 10.11** - Database
- **Vite 7.0** - Frontend build tool
- **TailwindCSS 4.0** - CSS framework
- **Docker** - Containerization

### Security Features

- **Environment-Aware CSP** - Automatic Content Security Policy switching
  - Development: Allows Vite HMR and dev tools
  - Production: Strict CSP with nonce support
- **Security Headers** - HSTS, X-Frame-Options, X-Content-Type-Options
- **Hostname Detection** - Automatic environment detection via Apache

## Development Commands

### Start Everything

```bash
composer run dev  # Laravel server + queue + logs + Vite
```

### Database

```bash
php artisan migrate        # Run migrations
php artisan migrate:fresh  # Reset database
php artisan db:seed        # Seed data
```

### Frontend

```bash
npm run dev     # Vite dev server
npm run build   # Production build
```

### Testing

```bash
composer test   # Run all tests
```

### Scripts

```bash
scripts/test-csp.sh   # Test environment-aware CSP configuration
```

See [`scripts/README.md`](scripts/README.md) for all available utility scripts.

## Project Structure

```text
├── app/           # Laravel application code
├── resources/     # Views, CSS, JS
├── routes/        # Route definitions
├── database/      # Migrations, seeders
├── public/        # Web root
├── .devcontainer/ # VS Code container config
└── docker-compose.yml
```

## Configuration

### Database Connection (`.env`)

```env
DB_CONNECTION=mysql
DB_HOST=mariadb
DB_PORT=3306
DB_DATABASE=laravel_app
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_password
```

### Access Points

- **Laravel App**: <http://localhost>
- **phpMyAdmin**: <http://localhost:8080> (root / see logs)
- **Database**: localhost:3306

## Troubleshooting

### Common Issues

```bash
# Check containers
docker ps

# View logs
docker logs lamp-web

# Restart services
docker-compose restart

# Rebuild container
# VS Code: Dev Containers → Rebuild Container
```

### Database Issues

```bash
# Test connection
curl http://localhost/test

# Clear Laravel caches
php artisan cache:clear
php artisan config:clear
```

## Key Features

- **Hot Reload** - Vite HMR for instant updates
- **Database Ready** - MariaDB with phpMyAdmin
- **Testing Setup** - PHPUnit configured
- **Code Quality** - Laravel Pint formatting + Prettier
- **Debug Ready** - Xdebug configured
- **Production Ready** - Optimized build process
- **Security First** - Environment-aware CSP and security headers

## Code Quality

### Formatting

```bash
npm run format        # Format all files
npm run format:check  # Check formatting
npm run format:md     # Format markdown only
```

### Pre-commit Recommendations

```bash
# Before committing, run:
npm run format        # Format code
composer test         # Run tests
scripts/test-csp.sh   # Test security config
```

## Next Steps

1. **Create your first controller**: `php artisan make:controller WelcomeController`
2. **Set up authentication**: `php artisan make:auth`
3. **Build your models**: `php artisan make:model Post -m`
4. **Style with Tailwind**: Edit `resources/css/app.css`

---

**Ready to build!** Laravel 12 • PHP 8.3 • MariaDB 10.11
