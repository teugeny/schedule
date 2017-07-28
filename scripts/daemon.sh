#!/bin/bash
while true
do
# Echo current date to stdout
php /home/www/artisan schedule:run
sleep 5
done
