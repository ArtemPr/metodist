## Run in CI/CD
composer update
php bin/console doctrine:migrations:migrate --no-interaction
php bin/console cache:clear
./vendor/bin/php-cs-fixer fix
yarn install
yarn run build
