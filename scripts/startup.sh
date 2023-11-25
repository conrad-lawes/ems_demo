echo "Starting now" > /home/start_$(date +%Y%m%d_%H%M%S).log
cp /home/site/wwwroot/config/database.php.bak /home/site/wwwroot/config/database.php 
cp /home/site/wwwroot/default /etc/nginx/sites-available/default && service nginx reload. ; php-fpm;
cd /home/site/wwwroot
php artisan db:wipe --force
php artisan migrate --seed --force
