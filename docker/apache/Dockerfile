# Usar la imagen base oficial de PHP 8.0 con Apache
FROM php:8.2-apache

# Actualizar el índice de paquetes e instalar dependencias
RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends \
    software-properties-common \
    && apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y \
    libfreetype6-dev \
    libicu-dev \
    libssl-dev \
    libjpeg62-turbo-dev \
    libedit-dev \
    libedit2 \
    libpq-dev \
    libxslt1-dev \
    libzip-dev \
    libonig-dev \
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
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Configurar e instalar extensiones de PHP
RUN docker-php-ext-configure \
    gd --with-freetype --with-jpeg; \
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
    zip

# Establecer permisos y propietario para /var/www
RUN chmod 777 -R /var/www \
    && chown -R www-data:www-data /var/www \
    && usermod -u 1000 www-data \
    && chsh -s /bin/bash www-data

# Habilitar módulos de Apache
RUN a2enmod rewrite \
    && a2enmod headers

# Redirigir logs de Apache a stdout y stderr
RUN ln -sf /dev/stdout /var/log/apache2/access.log \
    && ln -sf /dev/stderr /var/log/apache2/error.log
