# ku-newsletter-admin
## Админка для работы с рассылками для пользователей telegram

### Как поднять проект:
1. Склонировать репозиторий
```
git clone https://github.com/tungatarovKl/ku1-newsletter-admin
```
2. Создать базу данных SQLite
```
cd database
sqlite3 news.db
```
3. Создать файл .env в корне проекта и заполнить его данными из файла env.example
```
cp .env.example .env
```
4. Сгенерировать APP-KEY в файле .env
5. Прописать абсолютный путь до базы данных
```
nano .env
DB_DATABASE=/YOUR/ABSOLUTE/PATH/TO/PROJECT/database/news.db
```
6. Запустить встроенный PHP- сервер из папки public
```
cd public
php -S localhost:8000
```
