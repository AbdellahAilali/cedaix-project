FROM php:7.2-fpm-stretch

ARG USER

RUN apt-get update && apt-get install -y nano git libpq-dev libicu-dev libxml2-dev zlib1g-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pgsql pdo pdo_pgsql pdo_mysql intl bcmath soap zip

RUN mkdir $HOME/bin && curl -SS https://getcomposer.org/installer | php -- --install-dir=$HOME/bin --filename=composer

ENV PATH /home/$name/bin:$PATH

RUN groupadd -r $USER && useradd --no-log-init -r -g $USER $USER

USER $USER

WORKDIR /code
