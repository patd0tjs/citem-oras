FROM php:8.2-apache

# Install dependencies and extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    unzip \
    zip \
    git \
    && docker-php-ext-install intl pdo pdo_mysql mysqli \
    && apt-get clean

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy custom php.ini
COPY .docker/php.ini /usr/local/etc/php/

# Set the working directory
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html/writable

EXPOSE 80
