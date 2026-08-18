FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    curl \
    git \
    && docker-php-ext-install pdo pdo_pgsql mbstring exif pcntl bcmath gd \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www

RUN composer install --no-interaction --no-plugins --no-scripts --prefer-dist --optimize-autoloader \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache \
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 8080

CMD ["sh", "-c", "php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]
