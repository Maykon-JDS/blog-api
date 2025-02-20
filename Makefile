# Load .env file if it exists
include ./api/.env

build:
	@docker compose -f ./api/docker-compose.yml build -d --no-cache

up:
	@docker compose -f ./api/docker-compose.yml up -d

stop:
	@docker compose -f ./api/docker-compose.yml stop

down:
	@docker compose -f ./api/docker-compose.yml down

status:
	@docker compose -f ./api/docker-compose.yml ps

logs:
	@docker compose logs -f

# php:
# 	@docker-compose exec php-fpm bash

mysql:
	@docker exec -ti docker-database mysql -u root --password=$(DB_PASSWORD) --database=$(DB_DATABASE)

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

phpmd.ansi:
	@php ./api/vendor/bin/phpmd ./api/Core ansi --color  ./api/rulesets.xml

phpmd.text:
	@php ./api/vendor/bin/phpmd ./api/Core text --color  ./api/rulesets.xml

phpmd.json:
	@php ./api/vendor/bin/phpmd ./api/Core json --color  ./api/rulesets.xml

orm.drop:
	@php api/bin/doctrine orm:schema-tool:drop --force

orm.create:
	@php api/bin/doctrine orm:schema-tool:create

orm.update:
	@php api/bin/doctrine orm:schema-tool:update --force

orm.c.products:
	@php api/bin/create_products

orm.l.products:
	@php api/bin/list_products

orm.s.products:
	@php api/bin/show_products

orm.u.products:
	@php api/bin/update_products



# docker ps -a

# Lista todos os contêineres. O sinalizador -a mostra contêineres em execução e não em execução. Para exibir somente contêineres em execução, esse sinalizador pode ser omitido.

# docker rename [contêiner] [novo_nome]

# Renomeia o contêiner fornecido como novo_nome.

# docker start [contêiner]

# Executa o contêiner fornecido.

# docker stop [contêiner]

# Interrompe o contêiner fornecido.

# docker wait [contêiner]

# Faz com que o contêiner especificado espere até que outros contêineres em execução sejam interrompidos.


# Docker build -t image_name .

# Cria uma imagem do Docker com a tag image_name a partir dos arquivos no diretório atual.

# docker create [imagem]

# Cria um contêiner não executado a partir da imagem fornecida.

# docker run [imagem]

# Cria e executa um contêiner com base na imagem fornecida.