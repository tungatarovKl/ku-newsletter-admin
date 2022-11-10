# ku-newsletter-admin
## Админка для работы с рассылками для пользователей telegram

### Как поднять проект:
1. Склонировать репозиторий
```
git clone https://github.com/tungatarovKl/ku1-newsletter-admin
```
2. Прописать абсолютный путь до базы данных
```
nano .env
DB_DATABASE=/YOUR/ABSOLUTE/PATH/TO/PROJECT/database/news.db
```
3. Запустить встроенный PHP- сервер из папки public
```
cd public
php -S localhost:8000
```
