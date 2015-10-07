# Makefile for prepare project
#

# You can set these variables from the command line
COMPOSER      = /bin/composer.phar
BUILDDIR      = vendor

.PHONY: help clean test install

help:
	@echo "Please use \`make <target>' where <target> is one of"
	@echo "  install    to make app with database"
	@echo "  test       to make tests"
	@echo "  clean      to make clean app"

clean:
	rm -rf $(BUILDDIR)/*
	rm -rf ./composer.lock

test:
	./vendor/phpunit/phpunit/phpunit  --bootstrap vendor/autoload.php tests
	@echo "Tests finished."

install:
	$(COMPOSER) install --prefer-dist
	$(COMPOSER) dump-autoload -o
	@mkdir -p -m 777 cache
	@echo
	@mysql -h localhost -u root -p < schema.sql
	@echo "Build finished."
