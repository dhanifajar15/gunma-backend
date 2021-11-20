#!/bin/bash

#defineContainer
PhpContainerName=gunma_php
MysqlContainerName=gunma_mysql
WebServerContainerName=gunma_webserver

#migrate
docker exec $PhpContainerName \
  php artisan migrate \
