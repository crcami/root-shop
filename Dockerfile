# Use an official PHP 8.2 image
FROM php:8.2-fpm

# Create and set working directory
RUN useradd -m -u 1000 appuser
WORKDIR /var/www

# Copy composer.lock and composer.json
COPY --chown=appuser:appuser composer.lock composer.json ./

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

# Copy the rest of the application code
COPY --chown=appuser:appuser . .

# Set appropriate permissions
RUN chown -R appuser:appuser /var/www

# Switch to non-root user
USER appuser

# Expose port 9000
EXPOSE 9000

# Add and execute the entrypoint script
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]
CMD ["php-fpm"]
