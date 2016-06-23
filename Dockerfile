FROM ubuntu:16.04

MAINTAINER vincent@cloutier.co

RUN apt update && apt install -y apache2 libapache2-mod-php7.0 php7.0

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

# forward request and error logs to docker log collector
RUN ln -sf /dev/stdout /var/log/apache2/access.log
RUN ln -sf /dev/stderr /var/log/apache2/error.log

# ADD docker/000-default.conf /etc/apache2/sites-enabled/000-default.conf

ENTRYPOINT ["apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80

RUN rm /var/www/html/index.html
ADD . /var/www/html/
RUN chmod 777 /var/www/html/commandes.txt
