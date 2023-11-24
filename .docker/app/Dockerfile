# Base image
FROM php:8.2-cli as base

# Update dependencies
RUN apt-get update \
    # Install Zip
    && apt-get install -y libzip-dev zip \
    && docker-php-ext-install zip \
    #
    # Install Git
    && apt-get install -y git \
    #
    # Install Curl
    && apt-get install -y libcurl3-dev curl \
    && docker-php-ext-install curl \
    #
    # Install procps (required by Octane)
    && apt-get install -y procps \
    #
    # Install EXIF
    && docker-php-ext-install exif \
    #
    # Install GD
    && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/ \
    && docker-php-ext-install gd \
    #
    # Install MySQL
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_mysql \
    #
    # Install BC Math
    && docker-php-ext-install bcmath \
    #
    # Install internationalization functions
    && apt-get install -y zlib1g-dev libicu-dev g++ \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    #
    # Install Process Control extension
    && docker-php-ext-install pcntl \
    && docker-php-ext-enable pcntl \
    #
    # Install OPcache extension
    && docker-php-ext-install opcache \
    #
    # Clean up the apt cache
    && rm -rf /var/lib/apt/lists/*

# Copy PHP configuration
COPY ./.docker/app/php/php.ini "/${PHP_INI_DIR}/php.ini"
COPY ./.docker/app/php/conf.d "/${PHP_INI_DIR}/conf.d"

# App image
FROM base as app

# Update dependencies
RUN apt-get update \
    #
    # Install Swoole (required by Octane)
    && pecl install swoole \
    && docker-php-ext-enable swoole \
    #
    # Install Node (v20 LTS) (required by Octane)
    && curl -sL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    #
    # Install NPM (required by Octane)
    && npm install -g npm \
    #
    # Install Chokidar (required by Octane)
    && npm install --g chokidar \
    #
    # Clean up the apt cache
    && rm -rf /var/lib/apt/lists/*

# Specify the node path (allow including Chokidar lib globally)
ENV NODE_PATH /usr/lib/node_modules

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Set up the working directory
WORKDIR /var/www/html

# Export Octane port
EXPOSE 8000

# Run the Octane service
CMD ["php", "artisan", "octane:start", "--server=swoole", "--host=0.0.0.0", "--port=8000", "--max-requests=1000", "--watch"]

# The health check configuration
HEALTHCHECK --start-period=5s --interval=5s --timeout=5s --retries=3 \
    CMD php artisan octane:status || exit 1

# Composer image
FROM base as composer

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Set up the working directory
WORKDIR /var/www/html

CMD ["composer", "install"]