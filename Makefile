# Makefile

include .env

help:
	@echo ""
	@echo "usage: make COMMAND"
	@echo ""
	@echo "Quick-start Commands:"
	@echo " install                     Set up project"
	@echo " start                       Create and start containers"
	@echo " start-f                     Create and start containers without daemon option"
	@echo " down                        down containers"
	@echo " composer-bash               Run container composer" 
	@echo " composer-up                 Update all dependencies "
	@echo " composer-install            Install all dependencies from composer.json"
	@echo " yarn 						Install all dependecies npm"
	@echo " yarn-bash 					Run bash yarn"

up:
	@docker-compose --env-file .env.local -f docker/docker-compose.yml -f docker/docker-compose.override.yml up -d

up-f:
	@docker-compose --env-file .env.local -f docker/docker-compose.yml -f docker/docker-compose.override.yml up

up-fb:
	@docker-compose --env-file .env -f docker/docker-compose.yml -f docker/docker-compose.override.yml up --build --force-recreate

down:
	@docker-compose --env-file .env.local -f docker/docker-compose.yml -f docker/docker-compose.override.yml down --remove-orphans

composer-bash:
	@docker-compose --env-file .env.local -f docker/docker-compose.yml -f docker/docker-compose.override.yml run --rm composer sh

composer-up:
	@docker-compose --env-file .env -f docker/docker-compose.yml -f docker/docker-compose.override.yml run --rm composer update -vvv

composer-install:
	@docker-compose --env-file .env -f docker/docker-compose.yml -f docker/docker-compose.override.yml run --rm composer install -vvv
