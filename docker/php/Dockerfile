FROM php:7.4-fpm

ARG HOST_USER
ARG HOST_USER_ID

# Set working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set directory permissions
RUN mkdir /home/${HOST_USER} \
    && addgroup --gid ${HOST_USER_ID} ${HOST_USER} \
    && adduser --disabled-password --gecos "" --ingroup ${HOST_USER} --no-create-home --uid ${HOST_USER_ID} --home /home/${HOST_USER} ${HOST_USER} \
    && chown -R ${HOST_USER}:${HOST_USER} /home/${HOST_USER}

USER ${HOST_USER}
