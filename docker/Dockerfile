FROM php:latest

# Install dependencies
RUN apt-get update \
    &&  apt-get install -y --no-install-recommends \
        locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev unzip libpq-dev wget \
        apt-transport-https lsb-release ca-certificates \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip 



RUN apt-get update && apt-get install -y librabbitmq-dev libssh-dev \
    && docker-php-ext-install opcache bcmath sockets \
    && pecl install amqp \
    && docker-php-ext-enable amqp


# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    &&  mv composer.phar /usr/local/bin/composer

# Install Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash \
&&  mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Install NodeJs
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash \
    && apt-get install nodejs

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql
RUN npm install --global yarn

# print the last lines of dev/null
CMD tail -f /dev/null

# Git
RUN git config --global user.email "you@example.com" \
    &&  git config --global user.name "Your Name"


# Set working directory
WORKDIR /var/www/app