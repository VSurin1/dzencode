FROM php:8.4-fpm-bookworm

ARG APP_UID=1000
ARG APP_GID=1000

RUN apt-get update && apt-get install -y --no-install-recommends \
    git unzip libicu-dev libzip-dev libpng-dev libjpeg62-turbo-dev libfreetype6-dev \
    libonig-dev librabbitmq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" pdo_mysql mbstring intl zip gd bcmath pcntl sockets opcache \
    && pecl install redis-6.2.0 amqp-2.1.2 \
    && docker-php-ext-enable redis amqp \
    && groupmod -o -g "${APP_GID}" www-data \
    && usermod -o -u "${APP_UID}" -g www-data www-data \
    && mkdir -p /var/www/.composer \
    && chown -R www-data:www-data /var/www \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
COPY php.ini /usr/local/etc/php/conf.d/app.ini
ENV COMPOSER_HOME=/var/www/.composer
WORKDIR /var/www/html
USER www-data
CMD ["php-fpm"]
