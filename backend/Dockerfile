#PHP backend image
FROM php:8.1.2-fpm

RUN mkdir -p /opt/app

WORKDIR /opt/app

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN adduser --disabled-password app
COPY . .
COPY .env.docker .env
RUN chown -R app:app /opt/app
USER app

#TODO add installation of needed packages

#run migration
RUN ping database-container
RUN php artisan migrate

#run backend
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]