#!/usr/bin/env bash

# Exit on fail
set -e

# Wait for mysql to be ready
# dir=$(dirname "$0")

# $dir/wait-for-it.sh mysql:3306 -t 300

# Migrate DB
php artisan migrate --force

# Start supervisord
/usr/bin/supervisord -c /etc/supervisord.conf

# Start fpm
php-fpm

# Finally call command issued to the docker service
exec "$@"
