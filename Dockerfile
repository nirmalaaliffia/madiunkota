FROM php:7.4-fpm

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

RUN apt-get update && apt-get install -y libpq-dev 

RUN apt-get update && apt-get install -y \
    git \
    curl \
    cron \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libfreetype6-dev \
    libicu-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libxslt1-dev \
    libzip-dev \
    libpq-dev \
    zip \
    unzip \
    libmagickwand-dev --no-install-recommends

RUN pecl install imagick \
    && docker-php-ext-enable imagick

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
RUN apt-get update && apt-get install -y iputils-ping

RUN docker-php-ext-install \
    bcmath \
    ctype \
    fileinfo \
    json \
    mbstring \
    pdo_mysql \
    tokenizer \
    xml \
    exif \
    pcntl \
    gd \
    intl \
    xsl \
    zip \
    pdo_pgsql \
    pgsql \
    mysqli \
    soap

RUN docker-php-ext-enable mysqli 

RUN docker-php-ext-enable pgsql 

RUN ln -sf /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini 
RUN sed -i -e 's/;extension=pgsql/extension=pgsql/' /usr/local/etc/php/php.ini 
RUN sed -i -e 's/;extension=pdo_pgsql/extension=pdo_pgsql/' /usr/local/etc/php/php.ini 

WORKDIR /code
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer 


RUN echo "post_max_size=0" >> /usr/local/etc/php/conf.d/docker-php-ext-post_max_size.ini
RUN echo "upload_max_filesize=0" >> /usr/local/etc/php/conf.d/docker-php-ext-upload_max_filesize.ini

# ADD . /code
# RUN chown -R www-data:www-data /code/

# Add user for laravel application
# RUN groupadd -g 1000 www
# RUN useradd -u 1000 -ms /bin/bash -g www www

# # Copy existing application directory contents
# COPY . /code

# # Copy existing application directory permissions
# COPY --chown=www:www . /code/
# RUN chmod -R 777 . /code/storage/

# Change current user to www
# USER www
