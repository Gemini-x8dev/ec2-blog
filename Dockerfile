FROM composer:latest AS vendor

WORKDIR /app

COPY composer.json ./
COPY composer.lock ./

RUN composer install --no-scripts --no-autoloader --ignore-platform-reqs

COPY . ./

RUN composer dump-autoload --optimize

FROM php:7.3-fpm AS app

RUN apt-get update && apt-get install -y \
    cron \
    libzip-dev \
    gconf-service \
    libasound2 \
    libatk1.0-0 \
    libatk-bridge2.0-0 \
    libc6 \
    libcairo2 \
    libcups2 \
    libdbus-1-3 \
    libexpat1 \
    libfontconfig1 \
    libgcc1 \
    libgconf-2-4 \
    libgdk-pixbuf2.0-0 \
    libglib2.0-0 \
    libgtk-3-0 \
    libnspr4 \
    libpango-1.0-0 \
    libpangocairo-1.0-0 \
    libstdc++6 \
    libx11-6 \
    libx11-xcb1 \
    libxcb1 \
    libxcomposite1 \
    libxcursor1 \
    libxdamage1 \
    libxext6 \
    libxfixes3 \
    libxi6 \
    libxrandr2 \
    libxrender1 \
    libxss1 \
    libxtst6 \
    ca-certificates \
    fonts-liberation \
    libappindicator1 \
    libnss3 \
    lsb-release \
    xdg-utils \
    wget \
    gnupg && \
    rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd && \
    docker-php-ext-install pdo_mysql zip

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

COPY ./php.ini $PHP_INI_DIR/conf.d/local.ini

WORKDIR /usr/share/nginx/html

COPY --chown=www-data:www-data . ./
COPY --chown=www-data:www-data --from=vendor /app/vendor ./vendor

RUN find * -type d -exec chmod 755 {} \; && \
    find * -type d -exec chmod ug+s {} \; && \
    find * -type f -exec chmod 644 {} \; && \
    chmod -R ug+rwx storage bootstrap/cache

FROM nginx:latest AS web

COPY ./site.conf /etc/nginx/conf.d/default.conf

WORKDIR /usr/share/nginx/html/public

COPY ./public ./
