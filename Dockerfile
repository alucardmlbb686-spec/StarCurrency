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
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

EXPOSE 8080

# Start the app and try to run migrations, but continue even if DB is not ready yet
CMD ["sh", "-c", "php artisan migrate --force 2>/dev/null || true && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]
