#!/usr/bin/env bash

docker-compose up -d
docker-compose exec ddd_clean_architecture_php composer install
