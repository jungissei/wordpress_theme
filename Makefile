open:
	open -a Google\ Chrome http://localhost:8080
up:
	docker compose up
	@make open
dev:
	docker compose up -d
	@make open
buildup:
	docker compose build
	@make up
builddev:
	docker compose build
	@make dev
down:
	docker compose down --remove-orphans
restartup:
	@make down
	@make up
restartdev:
	@make down
	@make dev
app:
	docker exec -it webaiuacjp_wordpress_1 bin/bash
