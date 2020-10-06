FROM php:7.3-fpm

RUN cp /usr/share/zoneinfo/Europe/Moscow /etc/localtime
RUN curl -L https://getcomposer.org/composer-stable.phar -o /usr/bin/composer && chmod a+x /usr/bin/composer
RUN apt-get update && apt-get -y upgrade && apt-get install -y git \
 unzip \
 libtool \
 wget \
 libzip4 \
 libzip-dev \
 libpq5 \
 libpq-dev \
 zlib1g-dev \
 libxml2-dev \
 build-essential \
 libssl-dev

RUN docker-php-ext-install intl soap pcntl sockets pdo_pgsql zip
RUN pecl install pcov && docker-php-ext-enable pcov
RUN apt-get purge --auto-remove -y libzip-dev libpq-dev zlib1g-dev libxml2-dev build-essential libssl-dev && rm -rf /var/lib/apt/lists/*
