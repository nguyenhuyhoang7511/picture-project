# base
FROM php:8.1.13-fpm-alpine3.17 AS base

RUN apk add --update --no-cache bash youtube-dl ffmpeg alsa-utils

ADD https://github.com/mlocati/docker-php-extension-installer/releases/download/1.5.33/install-php-extensions /usr/local/bin/

ENV IPE_GD_WITHOUTAVIF=1

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions \
    @composer-2.3.5 \
    pdo_mysql \
    gd \
    xdebug-3.1.5

COPY ./docker/config/ /var/config/

RUN cp /var/config/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    cp /var/config/php.ini /usr/local/etc/php/conf.d/php.ini-development.ini

COPY ./docker/config/crontab /etc/cron.d/crontab
RUN crontab /etc/cron.d/crontab

ENV PATH=/var/www/html/vendor/bin:$PATH

# build
FROM base

ENV XDEBUG_MODE=off

COPY composer.json composer.lock ./

RUN composer install --no-autoloader -n --no-scripts --no-dev

COPY . .

RUN composer dump-autoload -o -n

CMD ["bash", "./docker/scripts/cron-deploy-entrypoint.sh"]
