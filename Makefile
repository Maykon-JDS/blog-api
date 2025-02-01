# Load .env file if it exists
include .env

up:
	@docker compose -f ./docker-compose.yml up -d

stop:
	@docker compose -f ./docker-compose.yml stop

down:
	@docker compose down

status:
	@docker compose ps

logs:
	@docker compose logs -f

# php:
# 	@docker-compose exec php-fpm bash

mysql:
	@docker exec -ti docker-database mysql --password=$(DB_PASSWORD) --database=$(DB_DATABASE)

# composer:
# 	docker run -it \
# 		--entrypoint /bin/sh \
# 		--volume ${PWD}:/application \
# 		--workdir /application \
# 		composer

info:
	@docker info

networks:
	@docker network ls