FROM php:7.3-apache

# System packages
RUN apt-get clean && apt-get update && apt-cache search php-mysql && apt-get install --fix-missing -y \
    curl libcurl4-openssl-dev \
    default-mysql-client \
    g++ \
    git \
    gnupg \
    imagemagick \
    libfreetype6-dev \
    libicu-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libssl-dev \
    libwebp-dev \
    libxml2-dev \
    linux-libc-dev \
    sudo \
    vim \
    wget \
    zip libzip-dev

# PHP extensions
RUN a2enmod rewrite ssl headers

RUN docker-php-ext-configure gd --with-gd --with-freetype-dir --with-webp-dir --with-jpeg-dir --with-png-dir
RUN docker-php-ext-configure intl
RUN docker-php-ext-configure zip
RUN docker-php-ext-install \
    curl \
    gd \
    intl \
    mysqli \
    pdo \
    pdo_mysql \
    xml \
    zip

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Node.js and npm
RUN echo "Package: *\nPin: origin deb.nodesource.com\nPin-Priority: 600" > "/etc/apt/preferences.d/nodesource" && sudo apt-cache policy nodejs
RUN rm -rf /var/lib/apt/lists/ && \
    curl -sL https://deb.nodesource.com/setup_14.x | sudo -E bash -&& \
    apt-get clean && apt-get update && apt-get install -y nodejs && \
    npm install npm@latest -g && \
    npm install gulp-cli -g
