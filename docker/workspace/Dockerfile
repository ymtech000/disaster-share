FROM php:7.2.15-fpm

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y \
      git \
      curl \
      vim \
      zip \
      unzip \
    && apt-get clean
RUN docker-php-ext-install pdo_mysql

RUN curl -s http://getcomposer.org/installer | php && \
    echo "export PATH=${PATH}:/var/www/vendor/bin" >> ~/.bashrc && \
    mv composer.phar /usr/local/bin/composer

RUN . ~/.bashrc
WORKDIR /var/www/
