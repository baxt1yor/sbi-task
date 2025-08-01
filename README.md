## 1. Требования
Для запуска проекта локально вам понадобятся:

PHP (подходящая версия, например ^8.4)

Composer (менеджер пакетов для PHP)

MySQL/PostgreSQL (в зависимости от используемой базы данных)

Laravel CLI (php artisan)

(Опционально) Docker, если вы хотите использовать контейнеры


## 2. Клонируйте репозиторий
```
git clone https://github.com/baxt1yor/sbi-task
cd sbi-task
```
## 3. Установите зависимости
```
composer install
```

##  4. Выполните миграции и заполните базу данных
```
php artisan migrate --seed
```

## 5. Запустите тесты

```
php artisan test
```

## 🐳 Если у вас установлен Docker
Вы можете просто выполнить:
```
composer install && docker compose up -d
```
или запустить проект вручную:

```
php artisan serve
```
