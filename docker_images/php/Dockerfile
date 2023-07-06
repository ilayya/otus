FROM php:8.1-fpm

# install image packages
RUN apt-get update && apt-get install -y \
    wget \
    libldap2-dev \
    zlib1g-dev \
    libpng-dev \
    librdkafka-dev \
    libmemcached-dev \
    libpq-dev \
    git \
    zip \
    unzip

# install pecl extensions
RUN pecl install rdkafka-6.0.2 memcached xdebug

# add php extensions
RUN docker-php-ext-install ldap gd pdo pdo_pgsql bcmath \
    && docker-php-ext-enable ldap gd rdkafka memcached pdo xdebug bcmath

# composer install v2
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# add php cfg
ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini
# add phpfpm cfg
ADD zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf

# port для xdebug
EXPOSE 9003

WORKDIR /var/www
