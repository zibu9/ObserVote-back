# Utilisez l'image officielle PHP avec Apache
FROM php:8.2.4-apache

# Définissez le répertoire de travail dans le conteneur
WORKDIR /var/www/html

# Installez les dépendances nécessaires (par exemple, le support MySQL)
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip

# Installez les extensions PHP nécessaires
RUN docker-php-ext-install zip pdo_mysql

# Copiez les fichiers de votre application dans le conteneur
COPY . /var/www/html/

# Ajustez les autorisations
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap

# Activez le module Apache mod_rewrite
RUN a2enmod rewrite
