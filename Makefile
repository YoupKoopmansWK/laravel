install: ## Install the application resources
	make build-env build-sail up generate-key build-frontend migrate

build-env: ## Build the environment file
	chmod 777 ./bin/build_env
	./bin/build_env

build-sail: ## Build the sail docker image
	chmod 777 ./bin/build_sail
	./bin/build_sail

up: ## Start sail with daemon
	./vendor/bin/sail up -d

generate-key: ## Generate the application key
	./vendor/bin/sail artisan key:generate

build-frontend: ## Build the frontend
	./vendor/bin/sail artisan youpks:frontend-preset
	./vendor/bin/sail npm install
	./vendor/bin/sail npm run build

migrate: ## Run the migrations
	./vendor/bin/sail artisan migrate
