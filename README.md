#ku1-newsletter-admin
### Описание
Админка для работы с рассылками для пользователей telegram
### Запуск проекта
1. Клонировать репозиторий
```
git clone https://github.com/tungatarovKl/ku1-newsletter-admin.git
```
2. Установить composer
```
composer install
```
3. Создать .env файл из .env.example
```
cp .env.example .env
```
4. Сгенерировать токен сервиса
```
php artisan key:generate
```
5. Указать пароль от БД в .env (DB_PASSWORD) и ./build/docker-compose.yml (MYSQL_PASSWORD)
6. Указать токен для сервиса ku1-newsletter-messenger в .env (API_MESSENGER_TOKEN)
7. Запустить docker-контейнеры
```
cd ./build
docker-compose up -d
```
### Тестирование
1. Запустить docker-контейнеры
2. При необходимости изменить переменные для среды тестирования в ./phpunit.xml
3. Запустить тесты в контейнере
```
docker exec -it ku1-newsletter-admin-web php artisan test
```
