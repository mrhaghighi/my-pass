FROM php:7.4-fpm

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libfreetype6-dev \
    libonig-dev \
    libzip-dev \
    libicu-dev \
    locales \
    zip \
    nano \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql zip exif pcntl intl

# Install some dependencies by pecl
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory contents
COPY . /var/www

# Handle permissions
RUN chown -R www-data:www-data /var/www
RUN chmod -R 775 /var/www/storage/
RUN chmod -R 775 /var/www/bootstrap/cache/

# Change current user to www-data
USER www-data

# Expose port
EXPOSE 9000

# CMD php-fpm
CMD ["php-fpm"]
