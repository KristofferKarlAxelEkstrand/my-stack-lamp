# Artisan

## What is Artisan?

Artisan is Laravel's built-in command-line interface (CLI) that provides helpful commands for developing Laravel applications. It offers a wide range of commands for common development tasks.

**Key Features:**

- **Code Generation** - Create controllers, models, migrations
- **Database Management** - Run migrations, seeders, factories
- **Development Tools** - Clear caches, generate keys, optimize
- **Custom Commands** - Create and run custom CLI commands
- **Task Automation** - Schedule and run background tasks

## Artisan in This Project

This Laravel project uses Artisan extensively for development and deployment:

### Code Generation Commands

- **`php artisan make:controller`** - Generate controllers
- **`php artisan make:model`** - Create Eloquent models
- **`php artisan make:migration`** - Database schema changes
- **`php artisan make:seeder`** - Database seeders

### Database Operations

- **`php artisan migrate`** - Run database migrations
- **`php artisan migrate:fresh`** - Reset and rerun migrations
- **`php artisan db:seed`** - Populate database with test data
- **`php artisan migrate:status`** - Check migration status

### Development Tools

- **`php artisan key:generate`** - Generate application key
- **`php artisan cache:clear`** - Clear application cache
- **`php artisan config:clear`** - Clear configuration cache
- **`php artisan route:clear`** - Clear route cache

### Custom Scripts

- **`composer run dev`** - Custom script that runs multiple Artisan commands
- **Queue Management** - Background job processing
- **Schedule Management** - Task scheduling

### Production Commands

- **`php artisan config:cache`** - Cache configuration for production
- **`php artisan route:cache`** - Cache routes for performance
- **`php artisan view:cache`** - Cache Blade templates

Artisan serves as the primary development tool for this Laravel project, handling everything from code generation to database management and deployment optimization.

**Learn More:** [Laravel Artisan Documentation](https://laravel.com/docs/artisan)
