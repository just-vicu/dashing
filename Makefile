# Include file with .env variables if exists
-include .env

APP_SERVICE ?= app
DB_SERVICE ?= db

#-----------------------------------------------------------
# Management
#-----------------------------------------------------------

# Init variables for development environment
env:
	cp ./.env.example ./.env

# Start containers
up:
	docker compose up -d

# Stop containers
down:
	docker compose down

# Build containers
build:
	docker compose build

# Show list of running containers
ps:
	docker compose ps

# Restart containers
restart:
	docker compose restart

# Reboot containers
reboot: down up

# View output from containers
logs:
	docker compose logs --tail 500

# Follow output from containers (short of 'follow logs')
f.logs:
	docker compose logs --tail 500 -f

# Prune stopped docker containers and dangling images
prune:
	docker system prune

#-----------------------------------------------------------
# Application
#-----------------------------------------------------------

# Enter the app container
app.bash:
	docker compose exec ${APP_SERVICE} bash

# Run the tinker service
app.tinker:
	docker compose exec ${APP_SERVICE} php artisan tinker

# Clear the app cache
app.cache.clear:
	docker compose exec ${APP_SERVICE} php artisan cache:clear

# Enter the db container
db.bash:
	docker compose exec ${DB_SERVICE} bash

# Migrate the database
db.migrate:
	docker compose exec ${APP_SERVICE} artisan migrate

# Rollback the database
db.rollback:
	docker compose exec ${APP_SERVICE} php artisan migrate:rollback

# Seed the database
db.seed:
	docker compose exec ${APP_SERVICE} php artisan db:seed

# Fresh the database state
db.fresh:
	docker compose exec ${APP_SERVICE} php artisan migrate:fresh

# Refresh the database
db.refresh: db.fresh db.seed

# Install composer dependencies
composer.install:
	docker compose exec ${APP_SERVICE} composer install

# Update composer dependencies
composer.update:
	docker compose exec ${APP_SERVICE} composer update

# Show outdated composer dependencies
composer.outdated:
	docker compose exec ${APP_SERVICE} composer outdated

# PHP composer autoload command
composer.autoload:
	docker compose exec ${APP_SERVICE} composer dump-autoload

# Generate a symlink to the storage directory
storage.link:
	docker compose exec ${APP_SERVICE} php artisan storage:link --relative

# Reload the Octane workers
octane.reload:
	docker compose exec ${APP_SERVICE} php artisan octane:reload

#-----------------------------------------------------------
# Testing
#-----------------------------------------------------------

# Run phpunit tests
test:
	docker compose exec ${APP_SERVICE} ./vendor/bin/phpunit --order-by=defects --stop-on-defect

# Run phpunit tests with the coverage mode
test.coverage:
	docker compose exec ${APP_SERVICE} ./vendor/bin/phpunit --coverage-html ./.coverage