## Run in CI/CD

composer update

php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear

##yarn run build

## ./vendor/bin/php-cs-fixer fix
