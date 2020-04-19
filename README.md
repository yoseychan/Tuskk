![Tuskk](https://gyazo.com/b390e9ee7e91d03c80be6bdf04ec7b0e)

## About Tuskk
Tuskk is a small gaming news website.The team of Tuskk publish informative articles for all game enthusiasts to read, 
like and comment.

## Built with:
- [Laravel](https://laravel.com/) - PhP framework for Back-End
- [Vue.js](https://vuejs.org/) - Front-End framework 
- [Bootstrap 4](https://getbootstrap.com/) - CSS library
- [Element.ui](https://element.eleme.io/#/en-US) - CSS library for vue 
- [Moment.js](https://momentjs.com/) - JavaScript date and time converter. 

## Setup


- Create a new database through the MySQL in the Terminal 
```
mysql -u root -p
```
and then
```
create database Tuskk;
```

- Create a new `.env` file in the root of the project. Copy the contents of the `.env.example` file in the .env file. 

- In the `.env` file, rename the database name to **Tuskk** and set up other fields if necessary.

- In the Terminal navigate to the root folder of the project and generate the application key
```
php artisan key:generate 
```
- Migrate and seed the database:
```
php artisan migrate:fresh --seed
```
- Installing dependencies:
```
composer install

npm install
```
- Install middleware:
```
pasport:install
```
- Run  `npm run watch` for development or `npm run prod` for production phases.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
