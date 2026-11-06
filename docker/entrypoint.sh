#!/bin/sh
set -e

mkdir -p /app/database
touch /app/database/database.sqlite
chown -R www-data:www-data /app/storage /app/bootstrap/cache /app/database

php /app/artisan migrate --force
php /app/artisan config:cache

exec /usr/bin/supervisord -c /etc/supervisord.conf
