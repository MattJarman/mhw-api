#!/usr/bin/env bash

ROOT_DIR="$(dirname $(realpath "$0"))/.."

if [ ! -d "$ROOT_DIR/vendor" ]; then
    docker run --rm \
        -v "$ROOT_DIR":/opt \
        -w /opt \
        laravelsail/php80-composer:latest \
        composer install
fi

