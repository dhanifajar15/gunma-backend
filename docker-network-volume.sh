#!/bin/bash

#defineNetwork
networkName=gunma-net
driver=bridge
subnet=172.25.0.0/16
gateway=172.25.0.1

#defineVolumes
volumeName=mysql_data

#createNetwork
docker network create \
--driver=$driver \
--subnet=$subnet \
--gateway=$gateway \
$networkName

echo -e "Creating network \e[31m$networkName\e[0m success"

#createVolumes
docker volume create $volumeName 

echo -e "Creating volume \e[31m$volumeName\e[0m success"