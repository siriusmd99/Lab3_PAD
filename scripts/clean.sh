#!/usr/bin/env bash

if [ -d /var/www/html ]; then
    rm -rf /var/www/html
fi
mkdir -vp /var/www/html