FROM centos:7

LABEL maintainer="SLT | Development"
LABEL description="Imagem base para minhas aplicações da PHP"
LABEL version="1.0"

# UTILITÁRIO
RUN yum update -y && \
    yum install -y nano \
    curl \
    unzip \ 
    git \
    zip

# DEFININDO EDITOR DE TEXTO PADRÃO
RUN export EDITOR=/usr/bin/nano


# GIT CONFIG
RUN git config --global http.sslVerify false

# APACHE INSTALL
RUN yum install -y httpd && \ 
    mkdir /etc/httpd/sites-available \
    mkdir /etc/httpd/sites-enabled

# CONFIGURANDO VIRTUAL HOST
COPY setup/apache/sites-available/app.conf /etc/httpd/sites-available/app.conf
RUN ln -s /etc/httpd/sites-available/app.conf /etc/httpd/sites-enabled/app.conf

# INSTALANDO PHP E DEPENDENCIAS
RUN yum install -y epel-release yum-utils && \
    yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm && \
    yum-config-manager --enable remi-php74 && \
    yum install -y php \
    php-mysql php-pgsql \
    php-mbstring \
    php-mcrypt \
    php-xml \
    php-pecl-zip \
    php-json \
    php-openssl \
    php-curl \
    php-gd \
    php-xdebug

# INSTALANDO NODEJS
RUN curl -sL https://rpm.nodesource.com/setup_16.x | bash - && \
    yum install nodejs -y

# LIMPEZA DE PACOTES
RUN yum clean headers && yum clean packages

# INSTALANDO E CONFIGURANDO COMPOSER
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

EXPOSE 80

COPY setup/docker-entrypoint.sh .
RUN chmod +x docker-entrypoint.sh

WORKDIR /var/www/html