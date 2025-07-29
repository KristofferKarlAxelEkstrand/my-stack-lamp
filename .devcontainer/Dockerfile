FROM php:8.3-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libgd-dev \
    jpegoptim optipng pngquant gifsicle \
    vim \
    nodejs \
    npm \
    mariadb-client \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip \
    opcache

# Install Xdebug for development
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Configure Xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.log=/tmp/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure Apache
RUN a2enmod rewrite headers deflate
COPY .devcontainer/apache-config.conf /etc/apache2/sites-available/000-default.conf
# Hide Apache version information
RUN echo "ServerTokens Prod" >> /etc/apache2/apache2.conf

# Copy PHP configuration
COPY .devcontainer/php.ini /usr/local/etc/php/conf.d/custom.ini

# Set working directory
WORKDIR /var/www/html

# Change ownership of the working directory to www-data
RUN chown -R www-data:www-data /var/www/html

# Create a startup script
RUN echo '#!/bin/bash\n\
    # Ensure proper permissions\n\
    chown -R www-data:www-data /var/www/html\n\
    chmod -R 755 /var/www/html\n\
    \n\
    # Start Apache in foreground\n\
    exec apache2-foreground\n\
    ' > /usr/local/bin/start-apache.sh && chmod +x /usr/local/bin/start-apache.sh

# Expose port 80
EXPOSE 80

# Start Apache (keep as root for proper permissions)
CMD ["/usr/local/bin/start-apache.sh"]
