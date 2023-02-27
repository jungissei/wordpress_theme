# @see https://hub.docker.com/_/wordpress

FROM wordpress:6.1.1-php8.2-apache

COPY apache2.conf /etc/apache2/apache2.conf

RUN apt-get update -y \
    && apt-get install vim -y \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* \
    && curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp \
    && wp --info \
    && a2enmod include \
    && a2enmod cgi
