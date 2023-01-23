FROM php:8.1.0-apache
ENV COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /var/www

#Mod Rewrite
RUN a2enmod rewrite

RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    unzip \
    zip \
    libpq-dev

# #Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install gettext intl pdo pdo_pgsql pgsql
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

ADD . /var/www
ADD ./public /var/www/html

COPY composer.lock composer.json /var/www/
RUN composer install --ignore-platform-reqs
RUN php artisan nova:check-license
#RUN php artisan migrate:rollback
# RUN php artisan migrate --seed --force

WORKDIR /var/www/html
RUN chown -R www-data:www-data /var/www
#RUN chmod -R 0777 /var/www/html/storage
#RUN chmod -R 0777 /var/www/html/bootstrap/cache
EXPOSE 80
