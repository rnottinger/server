FROM php:8.1-fpm-alpine3.17

LABEL maintainer="your-email@example.com"

#RUN apk update \
#    && apk add --no-cache bash wget autoconf \
#      nginx \
#      supervisor

RUN apk add --update --no-cache curl git bash wget pcre-dev $PHPIZE_DEPS \
        && pecl install redis \
        && docker-php-ext-enable redis.so

WORKDIR /var/www/html

COPY . .

#COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf
#COPY docker/php.ini /usr/local/etc/php/php.ini
#COPY docker/php-fpm.conf /usr/local/etc/php-fpm.conf

RUN docker-php-ext-install pdo pdo_mysql bcmath
