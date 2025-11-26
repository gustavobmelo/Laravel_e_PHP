FROM php:8.2-apache

# Instalar extensões necessárias ao Laravel
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql

# Ativar mod_rewrite
RUN a2enmod rewrite

# Configurar DocumentRoot
WORKDIR /var/www/html

# Copiar conf do Apache
COPY apache.conf /etc/apache2/sites-available/000-default.conf
