WORKDIR=/phpcs-rules
APP=vsvietkov-phpcs-rules

DOCKER-RUN=docker run --rm -t -v ${PWD}:$(WORKDIR) -w $(WORKDIR)

build:
	@docker build --tag $(APP) .

install:
	@$(DOCKER-RUN) composer install

phpcs:
	@$(DOCKER-RUN) composer phpcs

phpcs-fix:
	@$(DOCKER-RUN) composer phpcs-fix
