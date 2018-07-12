FROM php:7.0-apache

LABEL maintainer="Quentin, Théo, Arnaud, Julien <theosen95@gmail.com>"

RUN apt-get update \
 && docker-php-ext-install pdo pdo_mysql
RUN rm -rf /tmp/* /var/cache/apt/* 
