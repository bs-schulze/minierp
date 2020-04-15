
FROM php:7.3-apache
#Install git
RUN apt-get update \
#    && apt-get install -y git
    && apt-get install -y nano 
#RUN apt-get install -y --no-install-recommends apt-utils zlib1g-dev \
#	&&docker-php-ext-install zip
RUN apt-get install -y libzip-dev
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN a2enmod rewrite
#Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
EXPOSE 80
