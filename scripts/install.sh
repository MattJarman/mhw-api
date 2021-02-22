#!/usr/bin/env bash

ROOT_DIR="$(dirname "$(realpath "$0")")/.."

[ ! -f .env ] && cp .env.example .env

if [ ! -d "$ROOT_DIR/vendor" ]; then
    docker-compose run --rm \
        mhw-php \
        composer install
fi

source .env

if [ -n "$APP_NAME" ]; then
    docker-compose run --rm \
        mhw-php \
        php artisan key:generate
fi
