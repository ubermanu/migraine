install:
	composer install -o

clean:
	rm .phpunit* -rf
	rm vendor -rf

test:
	vendor/bin/phpunit

cs:
	vendor/bin/psalm
