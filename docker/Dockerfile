FROM php:8.1.1-fpm

ARG USER=dev
ARG UID=1000

RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets intl

# Instalando o NodeJS
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get -y install nodejs
RUN npm install --global cross-env
RUN npm install -g npm@latest

# Instalando o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $UID -d /home/$USER $USER

RUN mkdir -p /home/$USER/.composer && \
    chown -R $USER:$USER /home/$USER

COPY ./docker/php.ini /usr/local/etc/php/conf.d/custom-php.ini

WORKDIR /var/www

RUN chown -R $UID:$UID /var/www

USER $USER
