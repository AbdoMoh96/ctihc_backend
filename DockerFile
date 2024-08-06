# Use the official PHP 8.1 Apache base image
FROM php:8.1-apache

# Install development packages and clean up apt cache.
RUN apt-get update && apt-get install -y \
    curl \
    g++ \
    git \
    libonig-dev \
    libzip-dev \
    libbz2-dev \
    libfreetype6-dev \
    libicu-dev \
    libjpeg-dev \
    libmcrypt-dev \
    libpng-dev \
    libreadline-dev \
    sudo \
    unzip \
    zip \
    nano \
    vim \
 && rm -rf /var/lib/apt/lists/*

# Apache configs + document root.
RUN echo "ServerName laravel-app.local" >> /etc/apache2/apache2.conf
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Enable mod_rewrite for URL rewrite and mod_headers for .htaccess extra headers
RUN a2enmod rewrite headers

# Start with base PHP config, then add extensions.
RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"
RUN docker-php-ext-install \
    pdo_mysql \
    gettext\
    gd \
    zip

# Create a non-root user with the same UID/GID as the host user
# ARG uid=1000
# RUN useradd -G www-data,root -u $uid -d /home/production production

# Create the application directory and set permissions
WORKDIR /var/www/html
COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
RUN HASH=`curl -sS https://composer.github.io/installer.sig`
RUN php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
#RUN echo "127.0.0.1 redis" >> /etc/hosts

# Add Composer to the PATH
ENV PATH="/home/www-data/.composer/vendor/bin:${PATH}"

# Switch to the non-root user
USER www-data

# create bootstrap/cache directory
RUN mkdir /var/www/html/bootstrap/cache

# Run composer install
RUN composer install --no-interaction
RUN php artisan cache:clear
RUN php artisan optimize:clear
RUN php artisan storage:link

# Expose port 80
EXPOSE 80

CMD ["sh", "-c", "apache2-foreground"]
