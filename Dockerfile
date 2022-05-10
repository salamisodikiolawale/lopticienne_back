FROM php:7.4-fpm

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update
RUN apt-get -y install nano

EXPOSE 9001