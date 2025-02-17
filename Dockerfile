# Utilizar una imagen base de PHP con Apache
FROM php:7.4-apache

# Instalar extensiones necesarias de PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar el contenido del proyecto al directorio raíz de Apache
COPY . /var/www/html/

# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80
EXPOSE 80