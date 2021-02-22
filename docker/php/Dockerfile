FROM php:8.0-fpm

ARG WWWGROUP

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && docker-php-ext-configure gd

RUN groupadd --force -g $WWWGROUP sail \
    && useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail
