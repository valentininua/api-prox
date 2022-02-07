SHELL := /bin/bash

dev: export APP_ENV=test
dev:
	php -S 127.0.0.1:8888 -t public
.PHONY: dev