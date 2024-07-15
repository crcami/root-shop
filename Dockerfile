# Use the official PHP image as a parent image
FROM php:8.1-cli

# Set the working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install bcmath

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Add user for the application
RUN groupadd -g 1000 appuser && \
    useradd -u 1000 -ms /bin/bash -g appuser appuser

# Change current user to appuser
USER appuser

# Copy existing application directory contents
COPY --chown=appuser:appuser . .

# Change ownership of the application directory
RUN chown -R appuser:appuser /var/www

# Switch back to root to set permissions
USER root
# Add and execute the entrypoint script
COPY entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh
# Switch back to appuser
USER appuser

# Set the entrypoint script
ENTRYPOINT ["entrypoint.sh"]

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
