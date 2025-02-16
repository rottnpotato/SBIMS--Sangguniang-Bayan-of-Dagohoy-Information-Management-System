FROM php:8.1-fpm-alpine

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apk add --no-cache --virtual .build-deps \
    $PHPIZE_DEPS \
    zip \
    unzip

RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN pecl install redis && docker-php-ext-enable redis

RUN composer install --no-ansi --no-dev --no-interaction --no-scripts --optimize-autoloader

COPY . /var/www

# Clear cache
RUN php artisan route:cache
RUN php artisan config:cache
RUN php artisan view:cache

EXPOSE 9000
CMD ["php-fpm"]
