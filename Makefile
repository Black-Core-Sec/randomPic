init:
	composer install
	cp ./.env.example ./.env
build:
	./vendor/bin/sail build --no-cache
up:
	./vendor/bin/sail up -d
	./vendor/bin/sail npm install
	./vendor/bin/sail npm run build
down:
	./vendor/bin/sail down
keygen:
	./vendor/bin/sail artisan key:generate
vite-build:
	./vendor/bin/sail npm run build
vite-dev:
	./vendor/bin/sail npm run dev
