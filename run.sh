## run in CI/CD
rm -R vendor/*
rm composer.lock
composer install
php bin/console make:migration
php bin/console doctrine:migrations:migrate
php bin/console cache:clear
yarn build
./vendor/bin/php-cs-fixer fix
./vendor/bin/phpstan analyse src tests
