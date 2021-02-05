ROOT_DIR=$(shell dirname $(realpath $(lastword $(MAKEFILE_LIST))))
SRC_DIR=$(ROOT_DIR)/src
BIN_DIR=$(ROOT_DIR)/bin

include .env
-include .env.local

.PHONY: tests

deps:
	@echo "==> Installing dependencies"
	@composer install

migrate: deps
	@echo "==> Run migrations"
	@php $(BIN_DIR)/console --no-ansi --no-interaction doctrine:migrations:migrate --env=$(APP_ENV)

fixtures:
	@php $(BIN_DIR)/console --no-ansi --no-interaction doctrine:fixtures:load --env=$(APP_ENV)

run: migrate js_routing
	php-fpm

js_deps:
	yarn install

watch: js_deps
	yarn watch

js_build: js_deps
	yarn build

js_routing:
	bin/console --env=$(APP_ENV) fos:js-routing:dump --format=json --target=public/js/fos_js_routes.json

up:
	docker-compose -f docker-compose.yml -f docker-compose.dev.yml up --build

stop:
	docker-compose -f docker-compose.yml -f docker-compose.dev.yml stop


tests:
	@php -dpcov.enabled=1 -dpcov.directory=src -dpcov.exclude="~vendor|tests|bin|src/DataFixtures|src/Servientrega~" -d memory_limit=-1 $(BIN_DIR)/phpunit -c $(ROOT_DIR)/phpunit.xml.dist --colors=never

ci_eslint:
	docker-compose -f docker-compose.yml -f docker-compose.test.yml build node
	docker-compose -f docker-compose.yml -f docker-compose.test.yml run --rm --no-deps node make js_deps
	docker-compose -f docker-compose.yml -f docker-compose.test.yml run --rm --no-deps node yarn eslint

ci_tests:
	docker-compose -f docker-compose.yml -f docker-compose.test.yml up -d --build app node postgres_test
	docker-compose -f docker-compose.yml -f docker-compose.test.yml run --rm --no-deps app make migrate
	docker-compose -f docker-compose.yml -f docker-compose.test.yml run --rm --no-deps app make js_routing
	docker-compose -f docker-compose.yml -f docker-compose.test.yml run --rm --no-deps app make fixtures
	docker-compose -f docker-compose.yml -f docker-compose.test.yml run --rm --no-deps node /bin/sh -c 'make js_deps && yarn dev'
	docker-compose -f docker-compose.yml -f docker-compose.test.yml run --rm --no-deps app make tests
	docker-compose -f docker-compose.yml -f docker-compose.test.yml down -v

release:
	docker-compose -f docker-compose.yml build
	docker-compose -f docker-compose.yml run -e APP_ENV=prod -e APP_DEBUG=0 --rm --no-deps app composer --no-interaction install --prefer-dist --no-dev
	docker-compose -f docker-compose.yml run -e APP_ENV=prod -e APP_DEBUG=0 --rm --no-deps app bin/console --env=prod fos:js-routing:dump --format=json --target=public/js/fos_js_routes.json
	docker-compose -f docker-compose.yml run --rm --no-deps node make js_build


lint-code-style:
	@ - vendor/bin/php-cs-fixer fix --config=.php_cs.dist --allow-risky=yes --dry-run --stop-on-violation --diff --using-cache=no src tests

fix-code-style:
	@ - vendor/bin/php-cs-fixer fix --config=.php_cs.dist --allow-risky=yes --verbose --using-cache=no src tests
