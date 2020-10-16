FROM php:7.2.15-fpm

RUN { \
  echo 'max_execution_time=-1'; \
  echo 'memory_limit=-1'; \
  echo 'post_max_size=-1'; \
  echo 'upload_max_filesize=100M'; \
} > /usr/local/etc/php/conf.d/wp-recommended.ini

RUN docker-php-ext-install pdo_mysql

COPY ./ /var/www/

RUN chown -R www-data:www-data /var/www