gen:
	# brew install openapi-generator
	openapi-generator generate -i ../api/docs/swagger.yaml -o . -g php -p invokerPackage=Katanox 

cs-fixer:
	PHP_CS_FIXER_IGNORE_ENV=1  vendor/bin/php-cs-fixer --config=.php-cs-fixer.php -vvv fix
