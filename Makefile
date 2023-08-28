.PHONY: db-reset db-migrate db-rollback db-refresh db-create up build composer-install code-fix-all code-fix-changed code-fix-test

up: ## Create and start the services
	docker compose up --detach

build: ## Build or rebuild the services
	docker compose build --pull --no-cache

init-githooks: ## initialize githooks: pre-commit
	git config core.hooksPath .githooks

composer-install: ## Install the dependencies
	docker compose exec php sh -lc 'composer install'

code-fix-all:
	docker compose exec php sh -lc './vendor/bin/pint'

code-fix-changed:
	docker compose exec php sh -lc './vendor/bin/pint --dirty'

code-fix-test:
	docker compose exec php sh -lc './vendor/bin/pint --test'

db-reset: ## database drop and create
	docker compose exec php sh -lc 'php artisan db:drop && php artisan db:create'

db-migrate: ##start the database migration
	docker compose exec php sh -lc 'php artisan migrate'

#rollback for last migration
db-rollback:
	docker compose exec php sh -lc 'php artisan migrate:rollback'

#db-reset and db-migrate
db-refresh: db-reset db-migrate

db-create: db-refresh
	docker compose exec php sh -lc 'php artisan db:seed'
