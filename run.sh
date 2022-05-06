## run in CI/CD

composer update

php bin/console make:migration
php bin/console doctrine:migrations:migrate

php bin/console cache:clear
yarn run build

##./vendor/bin/php-cs-fixer fix
##./vendor/bin/phpstan analyse src tests
