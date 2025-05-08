FROM php:8.4-fpm-alpine

RUN cp "${PHP_INI_DIR}/php.ini-development" "${PHP_INI_DIR}/php.ini"

RUN apk add --no-cache -- \
        php84-pdo_mysql \
    && docker-php-ext-install \
        pdo_mysql

COPY --from=composer:latest -- /usr/bin/composer /usr/bin/composer

RUN composer global require laravel/installer

RUN apk add --update nodejs npm
RUN npm install \
@fullcalendar /core \
@fullcalendar /timegrid
