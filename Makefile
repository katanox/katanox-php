gen:
	# brew install openapi-generator
	openapi-generator generate -i ../api/docs/swagger.yaml -o . -g php -p invokerPackage=Katanox