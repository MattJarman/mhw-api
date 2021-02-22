#!/usr/bin/env bash

# Colours
NO_COLOUR=$'\033[0m'
LIGHT_GREEN=$'\033[1;32m'

#######################################
# Prints a message
#
# @param message Message to print
#######################################
log () {
  printf >&2 "%s%s%s\r\n" "$LIGHT_GREEN" "$@" "$NO_COLOUR"
}

if [ ! -f .env ]; then
    log "Couldn't find an env file, creating."
    cp .env.example .env
    log "Done."
fi

log "Installing dependencies."
docker-compose run --rm \
    --user "$(id -u)":"$(id -g)" \
    mhw-php \
    composer install

source .env
if [ -z "$APP_KEY" ]; then
    log "No app key set, generating."
    docker-compose run --rm \
        mhw-php \
        php artisan key:generate
fi
