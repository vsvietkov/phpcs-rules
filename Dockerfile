FROM php:8.2

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apt update && apt upgrade

WORKDIR /phpcs-rules
