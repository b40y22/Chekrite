### Для розгортання проекта потрібно:

- git clone git@github.com:b40y22/Chekrite.git
- cd Chekrite/
- sudo chown -R www-data:www-data apps/backend/api.chekrite.b40.pp.ua/storage/logs/
- sudo chown -R www-data:www-data apps/backend/api.chekrite.b40.pp.ua/storage/framework/cache/
- docker-compose up -d
- Відрегувати файл hosts (місцеросташування залежить від ОС). Додати запис для адрес api.chekrite.b40.pp.ua, chekrite.b40.pp.ua
- docker-compose exec nodejs npm run watch
- mysql -u root -p -h 127.0.0.1 (пароль в файлі .env, в корні)
- створити користувача і надати йому права (команди в файлі docker/mysql/conf/create_user.sql)
- скопіювати файл apps/backend/api.chekrite.b40.pp.ua/.env.example в apps/backend/api.chekrite.b40.pp.ua/.env
- docker-compose exec php composer install
- docker-compose exec php php artisan migrate
- 