#!/usr/bin/env bash

# Exit on fail
set -e

# Wait for mysql to be ready
dir=$(dirname "$0")

$dir/wait-for-it.sh api:9000 -t 300

# Start cronjob
crond

# Start serve
php artisan serve --host=0.0.0.0

# Finally call command issued to the docker service
exec "$@"
