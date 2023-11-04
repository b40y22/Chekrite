### Для розгортання проекта потрібно:

- git clone git@github.com:b40y22/Chekrite.git
- cd Chekrite/
- docker-compose up -d
- Відрегувати файл hosts (місцеросташування залежить від ОС). Додати запис для адрес api.chekrite.b40.pp.ua, chekrite.b40.pp.ua
- docker-compose exec nodejs npm run watch
- docker-compose exec php composer install
- docker-compose exec php php artisan migrate
- 