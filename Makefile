SAIL := ./vendor/bin/sail
YOUPKS_BIN := ./vendor/bin/youpks

help: ## Display this help
	@printf "\nUsage: make <commands> \n\nthe following commands are available: \n"
	@awk 'BEGIN {FS = ":.*##"; printf "\033[36m\033[0m\n"} /^[0-9a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-40s\033[0m %s\n", $$1, $$2 } /^##@/ { printf "\n\033[1m%s\033[0m\n", substr($$0, 5) } ' $(MAKEFILE_LIST)
	@printf "\n"

install: ## Install the application resources
	make build-env build-sail move-bash-scripts up generate-key frontend-preset ${preset} ${auth} build-frontend migrate

install-tailwind-auth: ## Install the application resources with tailwindcss and auth
	make build-env build-sail move-bash-scripts up generate-key frontend-preset preset=tailwindcss auth=Yes build-frontend migrate

update: ## Update the application resources
	make up composer-install build-frontend migrate

build-env: ## Build the environment file
	chmod +x ./bin/build-env
	./bin/build-env

build-sail: ## Build the sail docker image
	chmod +x ./bin/build-sail
	./bin/build-sail

move-bash-scripts: ## Move bash scripts to ./vendor/bin/youpks
	mkdir -p ${YOUPKS_BIN}
	mv ./bin/* ${YOUPKS_BIN}
	rm -rf ./bin

up: ## Start sail with daemon
	${SAIL} up -d

generate-key: ## Generate the application key
	${SAIL} artisan key:generate

build-frontend: ## Build the frontend
	${SAIL} npm install
	${SAIL} npm run build

watch-frontend: ## Watch the frontend
	${SAIL} npm install
	${SAIL} npm run dev

frontend-preset: ## Frontend preset
	${SAIL} artisan youpks:frontend-preset ${preset} ${auth}
	@if [ ${preset} = tailwindcss ]; then\
		${SAIL} npm install -D tailwindcss postcss autoprefixer;\
	fi

migrate: ## Run the migrations
	${SAIL} artisan migrate

composer-install: ## Run composer install
	${SAIL} composer install

cs-fixer: ## Run php-cs-fixer
	${SAIL} php ./vendor/bin/php-cs-fixer fix --config=.php-cs-fixer.php -v

youpks-bin: ## Run a youpks bin
	chmod +x ${YOUPKS_BIN}/*
	${YOUPKS_BIN}/${script}
