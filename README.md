# Project configuration

## Step 1:

Clone your project


## Step 2: 

Go to the folder application using `cd` command on your cmd or terminal


## Step 3:


Install dependencies via composer command `Composer install`


## Step 4:

Copy .env.example file to .env on the root folder. You can type `copy .env.example .env` if using command prompt Windows or `cp .env.example .env` if using terminal, Ubuntu 


## Step 5:

Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

***NOTE:*** For laravel sail or docker users, update your ***DB_HOST*** value to ***mysql***


## Step 6: (only for laravel sail users)

Run command `./vendor/bin/sail up -d` to start the environment up and running


## Step 7:

Run `php artisan key:generate` 

**OR**

For laravel sail users run `./vendor/bin/sail artisan key:generate` on your terminal


## Step 8:

Run `php artisan migrate --seed` 

**OR**

For laravel sail users run `./vendor/bin/sail artisan migrate --seed` on your terminal


## Step 9:

Run command `php artisan serve` on your terminal to start the program

**OR**

For laravel sail users only run command `./vendor/bin/sail artisan serve` on your terminal to start the program