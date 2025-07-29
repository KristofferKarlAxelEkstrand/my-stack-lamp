# Laravel LAMP Stack Development Environment

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<p align="center">
  <img alt="Laravel" src="https://img.shields.io/badge/Laravel-12.21.0-red?style=flat&logo=laravel">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-8.3-blue?style=flat&logo=php">
  <img alt="MariaDB" src="https://img.shields.io/badge/MariaDB-10.11-brown?style=flat&logo=mariadb">
  <img alt="Docker" src="https://img.shields.io/badge/Docker-Enabled-blue?style=flat&logo=docker">
  <img alt="Vite" src="https://img.shields.io/badge/Vite-7.0-646CFF?style=flat&logo=vite">
  <img alt="TailwindCSS" src="https://img.shields.io/badge/TailwindCSS-4.0-38B2AC?style=flat&logo=tailwind-css">
</p>

A modern, containerized LAMP stack development environment built with **Laravel 12.21.0**, featuring Docker containerization, VS Code Dev Container integration, and cutting-edge frontend tooling.

## 🚀 Quick Start

### Prerequisites

-   [Docker Desktop](https://www.docker.com/products/docker-desktop/) (with WSL2 on Windows)
-   [Visual Studio Code](https://code.visualstudio.com/)
-   [Dev Containers Extension](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers)

### Getting Started

1. **Clone and open the project**

    ```bash
    git clone <your-repository-url>
    cd my-stack-lamp
    code .
    ```

2. **Start in Dev Container**

    - VS Code will detect the Dev Container configuration
    - Click "Reopen in Container" when prompted, or:
    - Press `Ctrl+Shift+P` → "Dev Containers: Reopen in Container"
    - Wait for the container to build and initialize (~2-3 minutes first time)

3. **Access your application**
    - 🌐 **Laravel App**: [http://localhost](http://localhost)
    - 🗄️ **phpMyAdmin**: [http://localhost:8080](http://localhost:8080)
    - 🔍 **API Test**: [http://localhost/test](http://localhost/test)

## 🏗️ Architecture Overview

### Container Services

| Service        | Technology           | Port | Purpose                           |
| -------------- | -------------------- | ---- | --------------------------------- |
| **web**        | PHP 8.3 + Apache 2.4 | 80   | Laravel application server        |
| **mariadb**    | MariaDB 10.11        | 3306 | Database server                   |
| **phpmyadmin** | phpMyAdmin 5.2       | 8080 | Database administration interface |

### Technology Stack

-   **Backend**: PHP 8.3.23, Laravel 12.21.0, Apache 2.4
-   **Database**: MariaDB 10.11 with UTF8MB4 support
-   **Frontend**: Vite 7.0, TailwindCSS 4.0, ES modules
-   **Development**: Xdebug 3, PHPUnit 11.5, VS Code integration
-   **Containerization**: Docker with multi-service orchestration

## 🛠️ Development Workflow

### Frontend Development

```bash
# Install dependencies (if not already done)
npm install

# Start Vite development server with hot reload
npm run dev

# Build for production
npm run build
```

### Backend Development

```bash
# Run Laravel development server with all services
composer run dev

# Database migrations
php artisan migrate

# Interactive REPL
php artisan tinker

# Clear caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Database Operations

```bash
# Run fresh migrations
php artisan migrate:fresh

# Seed database
php artisan db:seed

# Create new migration
php artisan make:migration create_example_table

# Create model with migration
php artisan make:model Example -m
```

### Testing & Quality

```bash
# Run all tests
composer test
# or
php artisan test

# Run tests with coverage
php artisan test --coverage

# Format code with Laravel Pint
./vendor/bin/pint

# Run specific test
php artisan test --filter=ExampleTest
```

## 📁 Project Structure

```
my-stack-lamp/
├── .devcontainer/              # Dev Container configuration
│   ├── devcontainer.json      # VS Code settings & extensions
│   ├── Dockerfile             # Custom PHP-Apache image
│   ├── apache-config.conf     # Apache virtual host configuration
│   ├── php.ini               # PHP custom settings
│   └── post-create.sh        # Container initialization script
├── app/                       # Laravel application logic
│   ├── Http/Controllers/      # Controllers
│   ├── Models/               # Eloquent models
│   └── Providers/            # Service providers
├── config/                    # Laravel configuration files
├── database/                  # Database related files
│   ├── migrations/           # Database schema migrations
│   ├── seeders/             # Database seeders
│   └── factories/           # Model factories
├── resources/                # Frontend assets and views
│   ├── css/app.css          # TailwindCSS main stylesheet
│   ├── js/app.js            # JavaScript entry point
│   └── views/               # Blade templates
├── routes/                   # Application routes
│   └── web.php              # Web routes (includes /test endpoint)
├── tests/                   # PHPUnit tests
├── public/                  # Public web assets
├── .env                    # Environment configuration
├── composer.json           # PHP dependencies
├── package.json           # Node.js dependencies
└── vite.config.js         # Vite build configuration
```

## 🔧 Configuration Details

### Environment Variables

Key settings in `.env` file:

```env
# Application
APP_NAME="Laravel LAMP Stack"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# Database (MariaDB)
DB_CONNECTION=mysql
DB_HOST=mariadb              # Container hostname
DB_PORT=3306
DB_DATABASE=laravel_app
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_password
```

### Database Access

| Setting       | Value          | Notes                     |
| ------------- | -------------- | ------------------------- |
| **Host**      | `mariadb`      | From containers           |
| **Host**      | `localhost`    | From host machine         |
| **Port**      | `3306`         | Standard MySQL port       |
| **Database**  | `laravel_app`  | Main application database |
| **Username**  | `laravel_user` | Application user          |
| **Root User** | `root`         | For phpMyAdmin            |

### Available URLs

| URL                                            | Purpose                    | Credentials                 |
| ---------------------------------------------- | -------------------------- | --------------------------- |
| [http://localhost](http://localhost)           | Laravel application        | -                           |
| [http://localhost:8080](http://localhost:8080) | phpMyAdmin                 | root / (see container logs) |
| [http://localhost/test](http://localhost/test) | Database connectivity test | -                           |

## 🚨 Troubleshooting

### Container Issues

```bash
# Check container status
docker ps

# View logs
docker logs lamp-web
docker logs lamp-mariadb
docker logs lamp-phpmyadmin

# Restart containers
docker restart lamp-web lamp-mariadb lamp-phpmyadmin

# Nuclear option: rebuild everything
docker-compose down
docker system prune -f
# Then reopen in Dev Container
```

### Laravel Issues

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Regenerate autoload files
composer dump-autoload

# Reset database
php artisan migrate:fresh --seed
```

### Frontend Issues

```bash
# Clear Vite cache
rm -rf node_modules/.vite

# Reinstall dependencies
rm -rf node_modules package-lock.json
npm install

# Force rebuild assets
npm run build
```

### Database Connection Issues

```bash
# Test database connectivity
php artisan tinker
>>> DB::connection()->getPdo();
>>> exit

# Check database status
docker exec lamp-mariadb mysql -u root -p -e "SHOW DATABASES;"
```

## 🔒 Security Features

-   **HTTP Security Headers**: Content-Type-Options, Frame-Options, XSS Protection
-   **CSRF Protection**: Laravel's built-in CSRF middleware enabled
-   **Server Security**: Apache signatures and tokens hidden
-   **Database Security**: Separate user with minimal required permissions
-   **Development Safety**: Debug mode enabled only in local environment

## 📊 API Endpoints

| Endpoint          | Method | Description                 | Response |
| ----------------- | ------ | --------------------------- | -------- |
| `/`               | GET    | Laravel welcome page        | HTML     |
| `/test`           | GET    | Database connectivity check | JSON     |
| `/up`             | GET    | Application health check    | Text     |
| `/storage/{path}` | GET    | File storage access         | File     |

### Example API Response

```bash
# Test database connectivity
curl http://localhost/test

# Response:
{
  "status": "success",
  "message": "Database connection successful",
  "database_version": "10.11.13-MariaDB-ubu2204",
  "php_version": "8.3.23",
  "laravel_version": "12.21.0"
}
```

## 📈 Performance & Production

### Production Optimization

```bash
# Install production dependencies
composer install --optimize-autoloader --no-dev

# Cache configurations
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Build optimized assets
npm run build
```

### Development Tools

-   **🐛 Xdebug**: Step-through debugging with VS Code
-   **🔥 Hot Reload**: Vite development server with HMR
-   **💾 Database Tools**: phpMyAdmin for visual database management
-   **🎨 Code Style**: Laravel Pint for consistent formatting
-   **🧪 Testing**: PHPUnit with coverage reporting

## 🧪 Testing

### Running Tests

```bash
# All tests
php artisan test

# Specific test file
php artisan test tests/Feature/ExampleTest.php

# With coverage (requires Xdebug)
php artisan test --coverage

# Parallel testing (faster)
php artisan test --parallel
```

### Writing Tests

```bash
# Create feature test
php artisan make:test UserCanLoginTest

# Create unit test
php artisan make:test UserTest --unit
```

## 🚀 Deployment

### Preparing for Production

1. **Environment Setup**

    ```bash
    cp .env.example .env.production
    # Configure production database and settings
    ```

2. **Optimization**

    ```bash
    composer install --optimize-autoloader --no-dev
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    npm run build
    ```

3. **Security Checklist**
    - [ ] Set `APP_DEBUG=false`
    - [ ] Configure secure `APP_KEY`
    - [ ] Use HTTPS in production
    - [ ] Set up proper database credentials
    - [ ] Configure mail settings
    - [ ] Set up error monitoring

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Make your changes
4. Run tests (`composer test`)
5. Commit changes (`git commit -m 'Add amazing feature'`)
6. Push to branch (`git push origin feature/amazing-feature`)
7. Open a Pull Request

## 📝 License

This Laravel application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🆘 Support

### Getting Help

1. **Check the logs**: `docker logs lamp-web`
2. **Verify containers**: `docker ps`
3. **Test database**: Visit [http://localhost/test](http://localhost/test)
4. **Rebuild container**: VS Code → "Dev Containers: Rebuild Container"

### Common Solutions

-   **Port conflicts**: Ensure ports 80, 3306, 8080 are available
-   **Docker issues**: Restart Docker Desktop
-   **Permission issues**: The containers handle file permissions automatically
-   **Database connection**: Check that MariaDB container is running

---

**Ready to build something amazing? 🎉**

Laravel 12.21.0 • PHP 8.3 • MariaDB 10.11 • Vite 7.0 • TailwindCSS 4.0
