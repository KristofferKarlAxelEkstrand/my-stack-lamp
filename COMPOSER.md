# Composer

## What is Composer?

Composer is the dependency manager for PHP. It allows you to declare the libraries your project depends on and it will manage (install/update) them for you.

**Key Features:**

- **Dependency Resolution** - Automatically resolves and installs package dependencies
- **Autoloading** - Generates optimized autoload files for better performance
- **Version Management** - Handles package versions and conflicts
- **Global Installation** - Can install packages globally or per-project
- **Packagist Integration** - Access to thousands of PHP packages

## Composer in This Project

This Laravel project uses Composer to manage all PHP dependencies and development tools:

### Core Dependencies

- **Laravel Framework** - The main web framework (`laravel/framework`)
- **PHP Extensions** - Required extensions like `ext-pdo`, `ext-mbstring`
- **Development Tools** - Testing and code quality packages

### Project Management

- **`composer.json`** - Defines project dependencies and scripts
- **`composer.lock`** - Locks exact package versions for consistency
- **`vendor/`** - Contains all installed packages and autoloader

### Development Workflow

- **`composer install`** - Installs all project dependencies
- **`composer update`** - Updates packages to latest compatible versions
- **`composer run dev`** - Custom script that starts Laravel development server, queue worker, and Vite

### Key Commands Used

```bash
composer install          # Install dependencies
composer update           # Update packages
composer require package  # Add new dependency
composer run dev          # Start development environment
```

Composer ensures all team members work with identical dependency versions, making the development environment consistent and reliable across different machines.

**Learn More:** [Composer Documentation](https://getcomposer.org/doc/)
