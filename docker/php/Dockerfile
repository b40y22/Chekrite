FROM php:8.2-fpm
ENV TZ=Europe/Kiev
COPY wait-for-it.sh /usr/sbin/wait-for-it.sh
COPY ./php.ini /usr/local/etc/php/
RUN chmod +x /usr/sbin/wait-for-it.sh

RUN apt-get update && apt-get install -y \
    acl \
    default-mysql-client \
    cron \
    curl \
    g++ \
    git \
    gnupg \
    iputils-ping \
    libfreetype6-dev \
    libgmp-dev \
    libicu-dev  \
    libjpeg-dev \
    libmagickwand-dev \
    libpng-dev \
    libonig-dev \
    libpq-dev \
    librabbitmq-dev \
    libssh-dev \
    libssl-dev \
    libxml2-dev \
    libxslt1-dev \
    libzip-dev \
    mc \
    nmap \
    nodejs \
    npm \
    openssl \
    procps \
    supervisor \
    unzip \
    vim \
    zlib1g-dev

RUN apt-get clean
RUN docker-php-ext-configure gd --with-jpeg --with-freetype

RUN docker-php-ext-install \
    bcmath \
    exif \
    gd \
    gmp \
    intl \
    mbstring \
    opcache \
    pdo \
    pdo_mysql \
    soap \
    sockets \
    xsl \
    zip \
    && pecl install redis imagick \
    && docker-php-ext-enable redis imagick

# Set TZ
# Встановлюємо часовий пояс та необхідні залежності
RUN apt-get update \
    && apt-get install -y tzdata \
    && ln -snf /usr/share/zoneinfo/${TZ} /etc/localtime \
    && echo ${TZ} > /etc/timezone \
    && rm -rf /var/lib/apt/lists/* \
    && apt-get clean

# Встановлюємо значення часового поясу для PHP
RUN printf '[PHP]\ndate.timezone = "%s"\n', ${TZ} > /usr/local/etc/php/conf.d/tzone.ini

# Перевіряємо правильність встановлення часового поясу
RUN date > /tmp/date.txt

RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g pm2


# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD composer i -o ; /bin/bash /usr/sbin/wait-for-it.sh db:3306

WORKDIR /var/www
EXPOSE 9000