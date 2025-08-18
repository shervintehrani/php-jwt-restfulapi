# Use the official PHP 8.2 image with Apache
FROM php:8.2-apache

# Install MySQL extension for PHP
RUN docker-php-ext-install mysqli pdo_mysql

# Copy local code to the container image.
COPY . /var/www/html

# Use the default production configuration
#RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Modify the PHP configuration to enable error reporting
RUN echo 'error_reporting = E_ALL' >> "$PHP_INI_DIR/php.ini"
