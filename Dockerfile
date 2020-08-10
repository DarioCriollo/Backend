FROM php:7.3-apache

RUN apt-get update 

RUN apt-get install -y \
    curl\
    git\
    supervisor\
    zip\
    vim\
    unzip

RUN apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN curl -sL https://deb.nodesource.com/setup_8.x | bash - \
    && apt-get install -y nodejs \
    && apt-get install -y npm \
    && apt-get autoremove -y

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN a2enmod rewrite

ENV APP_HOME /var/www/html

RUN mkdir -p /opt/data/public && \
    rm -r /var/www/html && \
    ln -s /opt/data/public $APP_HOME

WORKDIR $APP_HOME