FROM ubuntu:18.04
RUN export DEBIAN_FRONTEND=noninteractive && \
    apt-get update && \
    apt-get -y install apache2 php php-mysql
COPY web/index.php /var/www/html/
RUN rm /var/www/html/index.html
RUN chmod 775 /var/www/html/index.php
CMD apachectl -D FOREGROUND
EXPOSE 80