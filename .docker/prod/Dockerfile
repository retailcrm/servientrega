FROM php:7.4-fpm-alpine3.13

RUN apk --update add \
    autoconf \
    shadow \
    dpkg-dev dpkg \
    file \
    g++ \
    gcc \
    libc-dev \
    oniguruma-dev \
    make \
    pkgconf \
    re2c \
    wget \
    libxml2-dev \
    postgresql-dev \
    icu-dev \
    && docker-php-ext-install mbstring soap \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/include/postgresql/ \
    && docker-php-ext-configure intl \
    && docker-php-ext-install pgsql pdo_pgsql bcmath intl sockets \
    && docker-php-ext-enable opcache \
    && rm -rf /var/cache/apk/*

RUN apk add --no-cache bash

RUN wget https://github.com/tony2001/pinba_extension/archive/master.zip \
    && unzip master.zip \
    && rm master.zip \
    && cd pinba_extension-master \
    && phpize \
    && ./configure --enable-pinba \
    && make \
    && make install \
    && cd .. \
    && cp pinba_extension-master/modules/pinba.so /usr/local/lib/php/extensions/pinba.so \
    && rm -R pinba_extension-master

# fix files permissions
RUN groupmod -o -g 1000 www-data && usermod -o -u 1000 www-data

COPY .docker/prod/fpm-pool.ini /usr/local/etc/php-fpm.d/www.conf
COPY .docker/prod/prod.ini /usr/local/etc/php/conf.d/prod.ini
COPY .docker/prod/zzz.docker.conf /usr/local/etc/php-fpm.d/zzz.docker.conf

COPY / /var/www/servientrega

WORKDIR /var/www/servientrega

RUN mkdir -p var/cache var/log && php bin/console c:w --env=prod -vvv && chmod -R a+wx var/cache var/log

RUN chown -R www-data:www-data /var/www

