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

Setup Environment
=========
`Create .env file and set data from .env.dist`


Migrate database
=========
1. Prepare Database and migrate
    - `docker-compose exec web bash`
    - `bin/console doctrine:migrations:migrate`

Run consumer command
=========
1. Command:
   - `docker-compose exec web bash`
   - `bin/console rabbitmq:consumer sum_values`
   