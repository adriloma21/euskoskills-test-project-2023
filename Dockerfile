FROM php:8.2-apache

# Actualiza e instala dependencias necesarias
RUN apt-get update && apt-get install -y \
    $PHPIZE_DEPS \
    libzip-dev \
    zip \
    cron \
    && docker-php-ext-install pdo pdo_mysql zip

# Establece el directorio de trabajo en el contenedor
WORKDIR /var/www/html

# Copia el código de la aplicación al contenedor
COPY . /var/www/html

# Crear la carpeta recursos/images antes de asignar permisos
RUN mkdir -p /var/www/html/recursos/images && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html

# Opcional: configura ServerName para eliminar la advertencia de Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Expone el puerto 80
EXPOSE 80

# Comando para iniciar Apache en primer plano
CMD ["apache2-foreground"]
