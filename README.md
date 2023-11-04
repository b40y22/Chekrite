### Для розгортання проекта потрібно:

#### Загальні налаштування оточення
- git clone git@github.com:b40y22/Chekrite.git
- cd Chekrite/
- docker-compose up -d
- Відрегувати файл hosts (місцеросташування залежить від ОС). Додати запис для адрес api.chekrite.b40.pp.ua, chekrite.b40.pp.ua
#### mysql
- mysql -u root -p -h 127.0.0.1 (пароль в файлі .env, в корні)
- створити користувача і надати йому права (команди в файлі docker/mysql/conf/create_user.sql)

#### laravel
- sudo chown -R www-data:www-data apps/backend/api.chekrite.b40.pp.ua/storage/logs/ (команда залежить від ОС)
- sudo chown -R www-data:www-data apps/backend/api.chekrite.b40.pp.ua/storage/framework/ (команда залежить від ОС)
- скопіювати файл apps/backend/api.chekrite.b40.pp.ua/.env.example в apps/backend/api.chekrite.b40.pp.ua/.env
- docker-compose exec php composer install
- docker-compose exec php php artisan migrate
- docker-compose exec php php artisan db:seed

#### vue
- docker-compose exec nodejs npm install
- docker-compose exec nodejs npm run watch

