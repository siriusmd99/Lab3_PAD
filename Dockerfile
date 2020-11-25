FROM php:7.3-apache
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-install exif 
RUN docker-php-ext-enable exif
RUN a2enmod rewrite
