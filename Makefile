build:
	rm .phpunit* -rf
	rm vendor -rf
	composer install -o
	php box.phar compile

test:
	vendor/bin/phpunit

cs:
	vendor/bin/psalm
