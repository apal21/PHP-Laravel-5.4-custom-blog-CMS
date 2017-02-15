# PHP-Laravel-5.4-custom-blog-CMS
PHP/Laravel 5.4 custom blogging CMS. CRUD operations with UI.

##Prerequisites : Composer https://getcomposer.org/

To install this, 
  1. Create a folder named "blog".

  2. Copy all the files in this folder.

  3. Open .env file and enter your database credentials. Create a database named "laravel" which is default in this .env file

  4. Open terminal/cmd and go to this folder.

  5. Run following Commands
  
      5.1 composer install

      5.2 php artisan key:generate

      5.3 php artisan cache:clear

      5.4 php artisan migrate

      5.5 php artisan serve

  6. Go to localhost:8000/register to create a new user, localhost:8000/login to go to the admin panel.