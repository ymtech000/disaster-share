FROM php:7.2.15-fpm

RUN docker-php-ext-install pdo_mysql

COPY ./ /var/www/

RUN chown -R www-data:www-data /var/www

RUN mkdir -p /var/www/storage/logs

RUN touch /var/www/storage/logs/laravel.log

RUN chmod -R 777 /var/www/storage/logs