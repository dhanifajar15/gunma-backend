FROM php:7.3-fpm-alpine

# lumen packages
RUN set -ex \
    && apk --no-cache add mysql-dev \
    && docker-php-ext-configure mysql -with-mysql=/usr/local/mysql \
    && docker-php-ext-install tokenizer pdo pdo_mysql mysqli

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version