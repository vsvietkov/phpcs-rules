FROM php:7.4.33

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt update -y && apt upgrade -y && apt install -y libzip-dev unzip

RUN docker-php-ext-install zip

RUN pecl install xdebug-3.1.6 && docker-php-ext-enable xdebug

WORKDIR /phpcs-rules
