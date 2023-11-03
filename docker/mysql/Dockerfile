FROM mysql:8.0
#RUN apt-get update && apt-get install -y \
#    vim \
#    nmap \
#    mc

WORKDIR /var/lib/mysql
EXPOSE 3306
CMD ["mysqld", "--innodb_use_native_aio=0"]
