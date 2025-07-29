#!/bin/bash

# Wait for MariaDB to be ready
echo "Waiting for MariaDB to be ready..."
until mysqladmin ping -h mariadb -u root -p"${DB_ROOT_PASSWORD}" --silent; do
    echo "Waiting for MariaDB..."
    sleep 2
done

echo "MariaDB is ready!"

# Check if Laravel is already installed
if [ ! -f "composer.json" ]; then
    echo "Installing Laravel..."
    
    # Create Laravel project
    composer create-project laravel/laravel . --prefer-dist --no-dev
    
    # Set proper permissions
    chown -R www-data:www-data /var/www/html
    chmod -R 755 /var/www/html
    chmod -R 775 /var/www/html/storage
    chmod -R 775 /var/www/html/bootstrap/cache
    
    echo "Laravel installed successfully!"
else
    echo "Laravel project already exists. Installing/updating dependencies..."
    composer install --no-dev --optimize-autoloader
fi

# Copy environment file if it doesn't exist
if [ ! -f ".env" ]; then
    if [ -f ".env.example" ]; then
        echo "Copying .env.example to .env..."
        cp .env.example .env
    else
        echo "Creating .env file..."
        cp /var/www/html/.env.example .env 2>/dev/null || true
    fi
    
    # Update .env with database settings
    sed -i 's/DB_CONNECTION=sqlite/DB_CONNECTION=mysql/' .env
    sed -i 's/DB_HOST=127.0.0.1/DB_HOST=mariadb/' .env
    sed -i 's/DB_PORT=3306/DB_PORT=3306/' .env
    sed -i "s/DB_DATABASE=laravel/DB_DATABASE=${DB_DATABASE}/" .env
    sed -i "s/DB_USERNAME=root/DB_USERNAME=${DB_USERNAME}/" .env
    sed -i "s/DB_PASSWORD=/DB_PASSWORD=${DB_PASSWORD}/" .env
    
    # Generate application key if Laravel is available
    if [ -f "artisan" ]; then
        php artisan key:generate
    fi
fi

# Run migrations
echo "Running database migrations..."
if [ -f "artisan" ]; then
    php artisan migrate --force
    
    # Clear and cache config
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
else
    echo "Laravel not yet installed, skipping migrations..."
fi

echo "Setup completed successfully!"
echo "Laravel app is ready at http://localhost"
echo "phpMyAdmin is available at http://localhost:8080"
echo ""
echo "Default database credentials:"
echo "- Database: ${DB_DATABASE}"
echo "- Username: ${DB_USERNAME}"
echo "- Password: ${DB_PASSWORD}"
echo ""
echo "phpMyAdmin credentials:"
echo "- Username: root"
echo "- Password: ${DB_ROOT_PASSWORD}"
