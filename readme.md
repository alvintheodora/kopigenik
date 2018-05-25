# Kopigenik #
Kopigenik is a coffee subscription website built with Laravel 5.5 (back-end) and Bootstrap 3(front-end).

### System Requirements ###

* PHP >= 7.0.0
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* cURL PHP Extension
* MariaDB / MySQL Database
* Composer (https://getcomposer.org/)
* Javascript Turned On in your browser

### Prerequisite ###

Install Composer (https://getcomposer.org/)

-------------------------------------------

### How do I get set up? ###
###### Please Follow Steps Below in order to install the application
1. Open Terminal
2. Git clone :
	```$ git clone https://github.com/alvintheodora/kopigenik.git```
3. Change Working Path to ```kopigenik```
4. Dependencies Installation :
	```$ composer install```
5. Create a Database with name ```kopigenik_laravel```
6. ```cp .env.example .env```
7. ```php artisan key:generate```
8. In .env, change ```CACHE_DRIVER=array``` and setup your database data
9. Database Migration: ```$ php artisan migrate --seed```

* Now All Set Up!

### How to run it ? ###
1. Open Terminal in the directory path
2. Type Command : ```$ php artisan serve```
3. Open the site through following url: ```{localhost}:8000```
	* **Note: {localhost} is your localhost url. Normally *localhost* or *127.0.0.1* **