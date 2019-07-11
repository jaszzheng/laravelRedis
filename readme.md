<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Laravel + Redis

This is a laravel + redis blog application

It simply had implemented a favorite function which user can mark on a article that he/she is keen on and all the favorite articles can be view in the my favorite page.

I also use redis to implemented some real time function, such as the most view articles, show the last article which user had read. 


## How to run this project ?

After download the project, 

1.run composer install 

2.copy env.example file to a new env file and config your DB setting

3.run php artisan migrate

4.run php artisan db:seed 

5.run php artisan key:generate 

6.visit http://127.0.0.1:8000
