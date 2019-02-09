FROM php:7.2.2-apache

COPY ./.docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# PHP, Mysql and Apache deps
RUN apt-get update
RUN apt-get upgrade -y
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN apt-get install -y zlib1g-dev && docker-php-ext-install zip

RUN a2enmod rewrite

# Composer install
RUN curl -sSL https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN chmod +x /usr/local/bin/composer
