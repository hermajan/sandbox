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
    libonig-dev \
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

RUN docker-php-ext-configure gd --with-freetype --with-webp --with-jpeg
RUN docker-php-ext-configure intl
RUN docker-php-ext-configure zip
RUN docker-php-ext-install \
	gettext \
	gd \
	intl \
	mbstring \
	mysqli \
	pdo \
	pdo_mysql \
	soap \
	xml \
	xmlwriter \
	zip

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

# Node.js and npm
RUN echo "Package: *\nPin: origin deb.nodesource.com\nPin-Priority: 600" > "/etc/apt/preferences.d/nodesource" && sudo apt-cache policy nodejs
RUN rm -rf /var/lib/apt/lists/ && \
	curl -sL https://deb.nodesource.com/setup_16.x | sudo -E bash -&& \
	apt-get clean && apt-get update && apt-get install -y nodejs && \
	npm install npm@8.* -g && \
	npm install gulp-cli -g
