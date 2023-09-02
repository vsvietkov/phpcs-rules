WORKDIR=/phpcs-rules
APP=vsvietkov-phpcs-rules

DOCKER-RUN=docker run --rm -t -v ${PWD}:$(WORKDIR) -w $(WORKDIR) $(APP)

build:
	@docker build --tag $(APP) .

install:
	@$(DOCKER-RUN) sh -c "composer install && composer dump-autoload"

phpcs:
	@$(DOCKER-RUN) composer phpcs

phpcs-fix:
	@$(DOCKER-RUN) composer phpcs-fix

phpunit:
	@$(DOCKER-RUN) composer phpunit

autoload:
	@$(DOCKER-RUN) composer dump-autoload
