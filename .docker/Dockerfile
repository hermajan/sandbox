FROM php:7.4-apache

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
    memcached libmemcached-dev libmemcached-tools \
    nodejs \
    sudo \
    vim \
    wget \
    zip libzip-dev

# Memcached
RUN curl -L -o /tmp/memcached.tar.gz "https://api.github.com/repos/php-memcached-dev/php-memcached/tarball" \
    && mkdir -p /usr/src/php/ext/memcached \
    && tar -C /usr/src/php/ext/memcached -zxvf /tmp/memcached.tar.gz --strip 1 \
    && docker-php-ext-configure memcached \
    && docker-php-ext-install memcached \
    && rm /tmp/memcached.tar.gz

# PHP extensions
RUN a2enmod rewrite ssl headers

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp
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
RUN rm -rf /var/lib/apt/lists/ && \
    curl -sL https://deb.nodesource.com/setup_14.x | sudo -E bash -&& \
    apt-get clean && apt-get update && apt-get install -y nodejs && \
    npm install npm@latest -g && \
    npm install gulp-cli -g
