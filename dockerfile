FROM php:8.0-apache
WORKDIR /var/www/html/poke_api
COPY . .
EXPOSE 80