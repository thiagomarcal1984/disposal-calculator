FROM php:8.1-apache
EXPOSE 80

ENV APACHE_DOCUMENT_ROOT /var/www/html

COPY ./ /var/www/html

RUN docker-php-ext-install mysqli
