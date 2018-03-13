test:
	vendor/bin/phpstan analyse src tests --level max
	vendor/bin/phpunit