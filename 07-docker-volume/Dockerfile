FROM ubuntu:18.04
VOLUME /datakedua
RUN apt-get update && apt-get -y install apache2
CMD apachectl -D FOREGROUND
EXPOSE 80