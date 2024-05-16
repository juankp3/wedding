FROM php:7.3-apache
#FROM php:5.6-apache


RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
    software-properties-common \
    && apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y \
    libfreetype6-dev \
    libicu-dev \
    libssl-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libedit-dev \
    libedit2 \
    libpq-dev \
    libxslt1-dev \
    libzip-dev \
    apt-utils \
    gnupg \
    git \
    vim \
    wget \
    curl \
    lynx \
    psmisc \
    unzip \
    tar \
    cron \
    bash-completion \
    && apt-get clean

# /etc/init.d/apache2 restart
#Install Dependencies
RUN docker-php-ext-configure \
    gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/; \
    docker-php-ext-install \
    pdo \
    pdo_mysql \
    mysqli \
    opcache \
    gd \
    bcmath \
    intl \
    mbstring \
    soap \
    xsl \
    xmlrpc \
    zip

RUN chmod 777 -R /var/www \
    && chown -R www-data:www-data /var/www \
    && usermod -u 1000 www-data \
    && chsh -s /bin/bash www-data

RUN a2enmod rewrite
RUN a2enmod headers

RUN ln -sf /dev/stdout /var/log/apache2/access.log \
    && ln -sf /dev/stderr /var/log/apache2/error.log
