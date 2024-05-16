FROM amazonlinux:2018.03

RUN yum -y update && yum -y install \
    php70-phar \
    php70-mbstring \
    php70-intl \
    php70-zip \
    php70-pdo \
    php70-curl \
    php70-bz2 \
    php70-calendar \
    php70-ctype \
    php70-dom \
    php70-exif \
    php70-fileinfo \
    php70-ftp \
    php70-gettext \
    php70-iconv \
    php70-json \
    php70-phar \
    php70-posix \
    php70-shmop \
    php70-simplexml \
    php70-sockets \
    php70-sysvmsg \
    php70-sysvsem \
    php70-sysvshm \
    php70-tokenizer \
    php70-xml \
    php70-xmlwriter \
    php70-xsl \
    php70-wddx \
    php70-xmlreader \
    git \
    openssh \
    unzip

ENV APP_ENV=prod
ENV SYMFONY_ENV=prod

RUN curl https://getcomposer.org/composer.phar > /usr/bin/composer \
    && chmod +x /usr/bin/composer \
    && composer global require hirak/prestissimo \
    && composer clear-cache

ARG USERNAME_LOCAL
ARG UID_LOCAL
ARG GID_LOCAL
RUN groupadd -g $GID_LOCAL $USERNAME_LOCAL
RUN useradd -u $UID_LOCAL -g $GID_LOCAL $USERNAME_LOCAL

WORKDIR /app/