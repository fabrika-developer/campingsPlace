# Slim Framework 4 Skeleton Application

[![Coverage Status](https://coveralls.io/repos/github/slimphp/Slim-Skeleton/badge.svg?branch=master)](https://coveralls.io/github/slimphp/Slim-Skeleton?branch=master)

Use this skeleton application to quickly setup and start working on a new Slim Framework 4 application. This application uses the latest Slim 4 with Slim PSR-7 implementation and PHP-DI container implementation. It also uses the Monolog logger.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.

## Install the Application

Run this command from the directory in which you want to install your new Slim Framework application. You will require PHP 7.4 or newer.

```bash
composer create-project slim/slim-skeleton [my-app-name]
```

Replace `[my-app-name]` with the desired directory name for your new application. You'll want to:

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writable.

To run the application in development, you can run these commands 

```bash
cd [my-app-name]
composer start
```

Or you can use `docker-compose` to run the app with `docker`, so you can run these commands:
```bash
cd [my-app-name]
docker-compose up -d
```
After that, open `http://localhost:8080` in your browser.

Run this command in the application directory to run the test suite

```bash
composer test
```

That's it! Now go build something cool.



````
version: '3.7'

volumes:
    logs:
        driver: local

services:
    slim:
        image: php:8-alpine
        working_dir: /var/www
        command: php -S 0.0.0.0:8080 -t public
        environment:
            docker: "true"
        ports:
            - 8080:8080
        volumes:
            - .:/var/www
            - logs:/var/www/logs
    mysql:
        image: mysql:5.7
        container_name: mysql
        links:
            - slim
        environment:
            MYSQL_ROOT_PASSWORD: 'root'
            MYSQL_DATABASE: 'slimmysql'
            MYSQL_PASSWORD: 'root'
        ports:
        - "6033:3306"
        volumes: 
        - ./mysql_data:/var/lib/mysql


    phpmyadmin:
        image: phpmyadmin/phpmyadmin
        container_name: pma_user
        links:
            - mysql
        environment:
            PMA_HOST: mysql
            PMA_PORT: 3306
            PMA_ARBITRARY: 1
        restart: always
        ports:
            - 8081:80
        volumes:
            - ./phpmyadmin_data:/var/www/html/phpmyadmin
````