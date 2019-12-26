# ./docker/php/Dockerfile
FROM php:7.4.0-fpm

ARG USER_ID
ARG GROUP_ID

# install required extensions
RUN apt-get update && apt-get install -y apt-utils libzip-dev unzip
RUN docker-php-ext-install pdo_mysql zip

# install apcu and xdebug
RUN pecl install apcu && docker-php-ext-enable apcu && \
    pecl install xdebug && docker-php-ext-enable xdebug

# use the default development config
RUN cp "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

# install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'baf1608c33254d00611ac1705c1d9958c817a1a33bce370c0595974b342601bd80b92a3f46067da89e3b06bff421f182') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php --filename=composer \
    && php -r "unlink('composer-setup.php');" \
    && mv composer /usr/local/bin/composer \
    && composer global require hirak/prestissimo

# install nodejs
RUN curl -sL https://deb.nodesource.com/setup_13.x | bash - && \
    apt-get install -y nodejs

# recreate www-data user & group with local user ID
RUN usermod -u ${USER_ID} www-data && groupmod -g ${GROUP_ID} www-data && \
    chown ${USER_ID}:${GROUP_ID} /var/www -R

# copy app src into container
COPY app /usr/src/app
RUN chown www-data:www-data /usr/src/app -R && \
    PATH=$PATH:/usr/src/app/vendor/bin:bin

# switch current user & workdir
USER www-data

# switch workdir
WORKDIR /usr/src/app
