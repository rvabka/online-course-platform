# 🎓 Online Courses Platform

Platforma kursów online zbudowana na Laravel 11 + Inertia.js + Vue 3 + Docker.

## 📋 Wymagania

- Docker 20.10+
- Docker Compose 2.0+
- Git

## 🚀 Instalacja projektu (dla nowych członków zespołu)

### 1. Sklonuj repozytorium

```bash
git clone https://github.com/twoja-organizacja/online-courses-platform.git
cd online-courses-platform
```

### 2. Skopiuj plik konfiguracyjny

```bash
cp src/.env.example src/.env
```

### 3. Dostosuj plik .env (opcjonalnie)

Jeśli potrzebujesz innych portów lub danych dostępowych, edytuj `src/.env`.

### 4. Zbuduj i uruchom kontenery Docker

```bash
docker-compose up -d --build
```

Sprawdź, czy wszystkie kontenery działają:

```bash
docker-compose ps
```

### 5. Zainstaluj zależności PHP (Composer)

```bash
docker exec -it courses_php composer install
```

### 6. Wygeneruj klucz aplikacji Laravel

```bash
docker exec -it courses_php php artisan key:generate
```

### 7. Uruchom migracje bazy danych

```bash
docker exec -it courses_php php artisan migrate
```

### 8. (Opcjonalnie) Załaduj dane testowe

```bash
docker exec -it courses_php php artisan db:seed --class=TestUserSeeder
docker exec -it courses_php php artisan db:seed --class=CourseSeeder
```

### 9. Zainstaluj zależności Node.js

Kontener Node automatycznie uruchamia `npm install` i `npm run dev`.
Sprawdź logi:

```bash
docker-compose logs -f node
```

### 10. Otwórz aplikację w przeglądarce

```
http://localhost:8080
```

**Dane logowania testowego użytkownika:**

- Email: `test@example.com`
- Hasło: `password`

**Dane admina:**

- Email: `admin@example.com`
- Hasło: `admin123`

## 🛠️ Praca z projektem

### Uruchomienie kontenerów

```bash
docker-compose up -d
```

### Zatrzymanie kontenerów

```bash
docker-compose down
```

### Przeglądanie logów

```bash
# Wszystkie kontenery
docker-compose logs -f

# Konkretny kontener
docker-compose logs -f nginx
docker-compose logs -f php
docker-compose logs -f mysql
docker-compose logs -f node
```

### Dostęp do kontenerów

```bash
# PHP (Laravel)
docker exec -it courses_php bash

# MySQL
docker exec -it courses_mysql mysql -u courses_user -p
# Hasło: secret123

# Node (Vite)
docker exec -it courses_node sh
```

### Uruchamianie komend Artisan

```bash
# Z poziomu hosta
docker exec -it courses_php php artisan [komenda]

# Przykłady:
docker exec -it courses_php php artisan migrate
docker exec -it courses_php php artisan make:controller TestController
docker exec -it courses_php php artisan route:list
```

### Instalacja nowych pakietów

```bash
# Composer (PHP)
docker exec -it courses_php composer require nazwa/pakietu

# NPM (JavaScript)
docker exec -it courses_node npm install nazwa-pakietu
```

## 📁 Struktura projektu

```
online-courses-platform/
├── docker/              # Konfiguracje Docker (Nginx, PHP, Node)
├── src/                 # Kod Laravel (backend + frontend Vue)
│   ├── app/            # Modele, kontrolery, middleware
│   ├── resources/      # Widoki Vue, CSS, JS
│   ├── routes/         # Definicje tras
│   └── database/       # Migracje, seedery
├── docker-compose.yml  # Definicja usług Docker
└── README.md           # Ten plik
```

## 🐛 Rozwiązywanie problemów

### Problem: Kontenery nie startują

```bash
docker-compose down -v
docker-compose up -d --build
```

### Problem: "Permission denied" w katalogach storage/bootstrap

```bash
docker exec -it -u root courses_php bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
exit
```

### Problem: Vite nie kompiluje assets

```bash
docker-compose restart node
docker-compose logs -f node
```

### Problem: Błąd połączenia z bazą danych

Sprawdź, czy MySQL działa:

```bash
docker-compose ps mysql
docker-compose logs mysql
```

Sprawdź konfigurację w `.env` (DB_HOST powinien być `mysql`, nie `localhost`).

## 👥 Współpraca w zespole

### Workflow Git

1. **Zawsze pobieraj najnowsze zmiany przed pracą:**

```bash
git pull origin main
```

2. **Utwórz nową gałąź dla swojej funkcjonalności:**

```bash
git checkout -b feature/nazwa-funkcji
```

3. **Commituj zmiany z opisowymi komunikatami:**

```bash
git add .
git commit -m "feat: dodano moduł zarządzania lekcjami"
```

4. **Wypchnij zmiany do repozytorium:**

```bash
git push origin feature/nazwa-funkcji
```

5. **Utwórz Pull Request na GitHubie/GitLabie**

### Konwencje commitów

- `feat:` - nowa funkcjonalność
- `fix:` - naprawa błędu
- `docs:` - aktualizacja dokumentacji
- `style:` - formatowanie kodu
- `refactor:` - refaktoryzacja
- `test:` - testy
- `chore:` - konfiguracja, dependency updates

### Synchronizacja z zespołem

Po sklonowaniu lub pull'u z repozytorium:

```bash
# Zaktualizuj zależności
docker exec -it courses_php composer install
docker exec -it courses_node npm install

# Uruchom nowe migracje
docker exec -it courses_php php artisan migrate

# Wyczyść cache
docker exec -it courses_php php artisan config:clear
docker exec -it courses_php php artisan cache:clear
```

## 🔒 Bezpieczeństwo

- **NIGDY** nie commituj pliku `.env` do repozytorium
- Nie udostępniaj haseł do bazy danych publicznie
- Zmień domyślne hasła w produkcji

## 📞 Kontakt

W razie problemów skontaktuj się z liderem projektu lub utwórz Issue w repozytorium.

## 📝 Licencja

[MIT License](LICENSE)
