.PHONY: db-reset db-migrate db-rollback db-refresh

#start migration
db-migrate:
	php artisan migrate

#rollback for last migration
db-rollback:
	php artisan migrate:rollback

#rollback for all migrations
db-reset:
	php artisan migrate:reset

#rollback for all migrations and start new migration
db-refresh:
	php artisan migrate:refresh

db-create:
	$(MAKE) db-refresh
	php artisan db:seed
