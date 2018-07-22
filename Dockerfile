FROM php:7.1.2-apache

LABEL maintainer="Quentin, Théo, Arnaud, Julien <theosen95@gmail.com>"

RUN docker-php-ext-install mysqli