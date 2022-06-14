# syntax=docker/dockerfile:1

FROM php:8-apache

RUN apt-get update
RUN apt-get install -y git zlib1g-dev
RUN docker-php-ext-install mysqli 
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql 
RUN docker-php-ext-enable pdo pdo_mysql