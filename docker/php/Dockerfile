FROM php:8.2-fpm

# Instalacja zależności systemowych
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libzip-dev

# Wyczyszczenie cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalacja rozszerzeń PHP wymaganych przez Laravel
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalacja Composer (menedżer pakietów PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ustawienie katalogu roboczego
WORKDIR /var/www/html

# Zmiana użytkownika na www-data (bezpieczeństwo)
USER www-data