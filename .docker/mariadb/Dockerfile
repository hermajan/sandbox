FROM mariadb:10.1.48

RUN rm -rf /docker-entrypoint-initdb.d/*
#ADD docker-entrypoint-initdb.d /docker-entrypoint-initdb.d

ADD etc/mysql/conf.d/my.cnf /etc/mysql/conf.d/my.cnf
