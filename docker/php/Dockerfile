FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip vim \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    libmcrypt-dev \
    gettext \
    postgresql-client \

    # Node.js (for apidoc)
    gnupg ca-certificates \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g apidoc \

    # PHP extensions
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_pgsql pdo_mysql opcache zip bcmath \
    && pecl install redis && docker-php-ext-enable redis \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install gettext

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
