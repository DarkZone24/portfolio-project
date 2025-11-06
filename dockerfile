FROM php:8.2-apache
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip zip git curl libpng-dev libjpeg-dev libfreetype6-dev && \
    docker-php-ext-install pdo pdo_mysql gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .
RUN composer install --no-dev --optimize-autoloader
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache

EXPOSE 80
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
