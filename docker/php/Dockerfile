FROM php:7.2.15-fpm

RUN docker-php-ext-install pdo_mysql

COPY ./ /var/www/

RUN chown -R www-data:www-data /var/www