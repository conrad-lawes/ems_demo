## Overview
This is a mock-up of a front-end employee onboarding system that I developed. The backend db is MySQL.
In production, a Powershell script is used to query the starters table for records with status "Pending".
When found, an AD account is created using the details of the record. When completed, the record status is changed to 
"Completed" and a related record is created in the Employees table.
## Pre-requisites
Docker must be installed and configured on the Linux system/vm. 
The git program is also required
## Clone Repo
```
git clone git@github.com:conrad-lawes/ems_demo.git
cd ems_demo/
```
# Create .env file
```
cp -v .env.example  .env
```
# Install composer using Docker image
```
docker run --rm  -u "$(id -u):$(id -g)"  -v $(pwd):/var/www/html -w /var/www/html \
laravelsail/php82-composer:latest composer install --ignore-platform-reqs
```
# Install Laravel Sail
```
docker run --rm -u "$(id -u):$(id -g)"  -v $(pwd):/var/www/html  -w /var/www/html  \
laravelsail/php82-composer:latest composer require laravel/sail  --ignore-platform-reqs
```
# Spin up Docker containers
```
./vendor/bin/sail  up -d
```
# Generate App key
```
./vendor/bin/sail  artisan key:gen 
```

# Install npm  and compile assets
```
./vendor/bin/sail  npm install
./vendor/bin/sail  npm run build
```
  
# Perform migrate with seeding
```
./vendor/bin/sail  artisan migrate:reset
./vendor/bin/sail  artisan migrate --seed
```
# To see running containers
```
./vendor/bin/sail ps
# Alternatively,  docker ps  
```
# Point your browser to laravel web server
```
url: http://<server IP>:8000/admin
username: admin@example.biz
password: password
```
You may change the password by modifying the database/seeder/DatabaseSeeder.php file then perform the migrate seed again
# To terminate containers
```
# run, ./vendor/bin/sail down  
```
