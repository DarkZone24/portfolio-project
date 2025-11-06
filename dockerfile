FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip zip git curl \
    libpng-dev libjpeg62-turbo-dev libfreetype6-dev libwebp-dev libxpm-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo pdo_mysql gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy app source code
COPY . .

# Install PHP dependencies (no dev packages)
RUN composer install --no-dev --optimize-autoloader

# Optimize Laravel configuration and routes
RUN php artisan key:generate && \
    php artisan config:cache && \
    php artisan route:cache

# Expose HTTP port
EXPOSE 80

# Start Apache (Laravel will be served via Apache, not php artisan serve)
CMD ["apache2-foreground"]
