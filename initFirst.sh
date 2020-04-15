#!/bin/bash
sudo docker exec minierp_php_1 composer update
cp src/.env.laravelcms src/.env
sh artisan.sh key:generate
sh artisan.sh migrate:refresh --force

sh artisan.sh up

#sudo chmod -R 777 


