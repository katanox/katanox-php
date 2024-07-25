gen:
	docker run --rm \
  		-v ${PWD}:/local  \
  		-v $(API_PATH):/api  \
		openapitools/openapi-generator-cli generate \
  		-i api/docs/swagger-sdk.yaml  \
  		-g php \
  		-o local \
		-p invokerPackage=Katanox 


cs-fixer:
	PHP_CS_FIXER_IGNORE_ENV=1  vendor/bin/php-cs-fixer --config=.php-cs-fixer.php -vvv fix
