FROM php:7.4-apache

# PHP extensions
RUN \
    docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure mysqli --with-mysqli=mysqlnd \
    && docker-php-ext-install pdo_mysql \
    && apt update  \
    && apt install -y unzip

COPY --from=composer:2.1.8 /usr/bin/composer /usr/bin/composer
