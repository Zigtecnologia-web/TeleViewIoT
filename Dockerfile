FROM php:8.4-fpm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev zlib1g-dev libzip-dev libpng-dev libonig-dev \
    && rm -rf /var/lib/apt/lists/*

# Extensões PHP necessárias (pdo_pgsql, pgsql, redis, zip, gd)
RUN docker-php-ext-install pdo pdo_pgsql pgsql zip bcmath
# Instalar ext-redis via pecl
RUN pecl install redis \
    && docker-php-ext-enable redis

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Cria diretório app
WORKDIR /var/www/html

# Permissões (opcional)
RUN usermod -u 1000 www-data

# Expor socket/porta (php-fpm usa socket por padrão)
EXPOSE 9000

CMD ["php-fpm"]
