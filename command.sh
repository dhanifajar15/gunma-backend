#!/bin/sh
#docker exec -ti gunma-backend_db_1 sh -c "mysql -u root -pgunma -e "ALTER USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'gunma'""
#docker exec -ti gunma-backend_php_1 sh -c "php artisan migrate:fresh"
#docker exec -ti gunma-backend_php_1 sh -c "chmod 777 -R storage"