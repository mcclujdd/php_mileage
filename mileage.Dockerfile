FROM php:8.1-apache

## Install xdebug ##
RUN pecl install xdebug-3.2.0 \
	&& docker-php-ext-enable xdebug

## Setup variables for composer ##
ENV COMPOSER_ALLOW_SUPERSUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

## Install composer and dependencies ##
COPY --from=composer/composer:latest /usr/bin/composer /usr/bin/composer
RUN apt-get update \
	&& apt-get install -y zip git vim #composer dependencies

RUN docker-php-ext-install mysqli pdo pdo_mysql\
    && docker-php-ext-enable mysqli 
