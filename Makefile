.PHONY: db-reset db-migrate db-rollback db-refresh db-creat

# database drop and create
db-reset:
	php artisan db:drop
	php artisan db:create

#start the database migration
db-migrate:
	php artisan migrate

#rollback for last migration
db-rollback:
	php artisan migrate:rollback

#db-reset and db-migrate
db-refresh: db-reset db-migrate

db-create: db-refresh
	php artisan db:seed
