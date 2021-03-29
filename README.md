Pull
======
`git@github.com:rNikolaevNoveo/testAmqpApp.git`

Docker
=========
`docker-compose up -d --build`
Once you run it - it will be available on `localhost:80`

Build PHP
=========
`docker-compose exec web composer install` - to download php packages

Migrate database
=========
1. Prepare Database and migrate
    - `docker-compose exec web bash`
    - `bin/console doctrine:migrations:migrate`
