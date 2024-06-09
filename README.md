# Laravel Reverb - веб-сокеты на Laravel

## Установка, настройка и использование

Для запуска приложения используется [Laravel Sail](https://laravel.com/docs/11.x/sail).

### Установка

Установка зависимостей

```bash
composer install
# или 
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

Копирование конфигурационного файла

```bash
cp .env.example .env
```

Если нужно, поменяйте параметр `APP_PORT` если порт 8007 занят. Параметр `FORWARD_DB_PORT` используется для проброса порта базы данных из контейнера.

### Запуск

```bash
./vendor/bin/sail up -d
```

Далее необходимо запустить клиентскую часть приложения.

```bash
./vendor/bin/sail npm run dev
```

Приложение будет доступна на `localhost` на порту, указанном в файле `.env`. По умолчанию это http://localhost:8007.
