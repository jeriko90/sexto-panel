FROM php:8.0-apache

# Copiar archivos de configuración de Apache
COPY ./conf/hstienda.tk.conf /etc/apache2/sites-available/000-default.conf

# Copiar el código fuente de la aplicación
COPY ./public_html /var/www/html
