# syntax=docker/dockerfile:1

FROM php:8-apache

RUN apt-get update \
 && apt-get install -y git zlib1g-dev \
 && docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo pdo_mysql
