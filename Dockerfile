FROM php:5.6-apache

# Ajusta fontes de pacotes do Debian Jessie/Stretch para o repositório de arquivo (archive)
# Isso previne erros de apt-get devido à depreciação da versão do Debian.
RUN sed -i 's/deb.debian.org/archive.debian.org/g' /etc/apt/sources.list \
    && sed -i 's|security.debian.org/debian-security|archive.debian.org/debian-security|g' /etc/apt/sources.list \
    && sed -i 's|security.debian.org|archive.debian.org/debian-security|g' /etc/apt/sources.list \
    && sed -i '/stretch-updates/d' /etc/apt/sources.list || true

# Instala dependências básicas e limpa o cache
RUN apt-get update && apt-get install -y --allow-unauthenticated \
    libpng-dev \
    libjpeg-dev \
    && rm -rf /var/lib/apt/lists/*

# Instala extensões PHP antigas do MySQL, mysqli, pdo_mysql e gd
RUN docker-php-ext-install mysql mysqli pdo_mysql gd

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite

# Ajusta permissões do diretório de trabalho do Apache
RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html
EXPOSE 80
