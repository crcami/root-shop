# Use an official PHP 8.2 image as a parent image
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy existing application directory contents
COPY . .

# Add the entrypoint script
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh

# Add a non-root user
RUN groupadd -g 1000 appuser && useradd -u 1000 -ms /bin/bash -g appuser appuser

# Set permissions for the application directory
RUN chown -R appuser:appuser /var/www/html

# Switch to the non-root user
USER appuser

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
