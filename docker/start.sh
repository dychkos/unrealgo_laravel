#!/bin/sh

chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Install Laravel dependencies
composer install --no-scripts --no-interaction

# Build npm assets
npm install && npm run dev

# Generate the application key
php artisan key:generate
php artisan config:clear

# Prepare the database
php artisan migrate
php artisan db:seed

# Run supervisord to manage Nginx and PHP-FPM
/usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
