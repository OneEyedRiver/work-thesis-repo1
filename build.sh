#!/usr/bin/env bash

# Install Composer dependencies
composer install --no-dev --optimize-autoloader

# Install NPM packages
npm install

# Compile Tailwind (or Vue/React)
npm run build

# Laravel setup
php artisan key:generate
php artisan migrate --force
php artisan storage:link
