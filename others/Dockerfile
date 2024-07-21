# Use an official PHP 8.2 image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Copy composer.lock and composer.json
COPY composer.lock composer.json ./

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the rest of the application files
COPY . .

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql

# Add the entrypoint script
COPY /others/entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# Add a non-root user
RUN groupadd -g 1000 appuser && useradd -u 1000 -ms /bin/bash -g appuser appuser

# Set permissions for the application directory
RUN chown -R appuser:appuser /var/www

# Switch to the non-root user
USER appuser

# Use the entrypoint to start the container
ENTRYPOINT ["entrypoint.sh"]

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
