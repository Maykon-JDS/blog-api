################################### COMMANDS ###################################

# Create and run a new container from an image
# docker run -it --name api-php -p 8001:80  api-php:1.0

# Start a build
# docker build -t api-php:1.0 .

# Return low-level information on Docker objects
# docker inspect api-php

# stress-ng --cpu 1 --vm-bytes 50m --vm 1 --vm-bytes 50m

# docker info

# docker container top

# docker networks -ls

# docker exec -it  api-php-project-api-php-1 bash

################################################################################

FROM php:8.2-apache

# RUN apt-get update && apt-get upgrade -y

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod headers

RUN a2enmod rewrite

RUN rm -R /etc/apache2/sites-available/*.conf

RUN rm -R /etc/apache2/sites-enabled/*.conf

RUN mkdir -p /var/lib/api

RUN mkdir -p /var/lib/api/session

RUN mkdir -p /var/lib/api/logs

RUN mkdir -p /var/www/api/cgi-bin/

RUN chmod -R 777 /var/lib/

RUN chmod -R 755 /var/www/

COPY  ["api/","/var/www/api/"]

COPY  ["docker/server/cgi-bin","/var/www/api/cgi-bin/"]

COPY  ["docker/server/ports.conf","/etc/apache2/ports.conf"]

COPY  ["docker/server/vh-api.conf","/etc/apache2/sites-available/vh-api.conf"]

RUN ln -s /etc/apache2/sites-available/vh-api.conf /etc/apache2/sites-enabled/vh-api.conf

WORKDIR /var/www/api-php/

LABEL description = "Apache 2.4"

EXPOSE 8001

ENTRYPOINT apachectl start && tail -f /dev/null