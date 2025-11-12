FROM node:20-alpine

# Instalacja podstawowych narzędzi
RUN apk add --no-cache git

# Ustawienie katalogu roboczego
WORKDIR /var/www/html

# Instalacja globalnych pakietów (opcjonalnie)
RUN npm install -g npm@latest

# Użytkownik node
USER node