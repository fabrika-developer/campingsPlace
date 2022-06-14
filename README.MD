### Establecer permisos
sudo chmod +x /usr/local/bin/docker-compose

### Estructura de Carpetas

```
  |
  -- Carpeta de Docker
  |
    -- Dockerfile
    -- docker-compose.yml (el ejecutavel de docker principal)
    -- /php/
    |    |
    |    -- /src/
    -- /mysql/
    |    |
    |    -- -- docker-compose.yml
    |    -- /mysql/src/
    -- /phpmyadmin/
    |    |
    |    -- /phpmyadmin/src/
```

#### Las direcciones IP 
- En general se podra acceder a las seguintes direcciones: (comprobar con docker ps)
  - 172.23.0.4:3306 (mysql)
  - 172.23.0.2 (apache)
  - 172.23.0.3 (phpmyadmin)


- PS: Las carpetas tienen sus proprios 'docker-compose.yml' si por acaso si necesita subir contenedores solo para debug.

## El archivo Dockerfile

-- Localizado dentro de la carpeta de php para instalar las dependencias del pdo y mysql

```
# syntax=docker/dockerfile:1

FROM php:8-apache

RUN apt-get update
RUN apt-get install -y git zlib1g-dev
RUN docker-php-ext-install mysqli 
RUN docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql 
RUN docker-php-ext-enable pdo pdo_mysql
```

### El Header del docker-compose.yml

```
version: '3.8'
services:
```

#### El mysql-server 

```
    mysql-server:
        image: mysql:5.7
        container_name: mysql-server
        environment:
            MYSQL_ROOT_PASSWORD: 'root'
            MYSQL_DATABASE: 'campingsPlaceMysql'
            MYSQL_PASSWORD: 'root'
        volumes:
            - ./mysql/src:/var/lib/mysql/
        ports:
            - 3307:3306
        restart: always
```

#### El php-myAdmin 

```
    php-myadmin:
        image: phpmyadmin/phpmyadmin
        container_name: php-myadmin
        volumes:
            - ./phpmyadmin/src:/var/www/html/phpmyadmin
        environment:
            PMA_HOST: sql_CPN
            PMA_PORT: 3306
            PMA_ARBITRARY: 1
        ports:
            - 8081:80
```

#### El php 

```
    php-apache-environment:
        container_name: php-apache
        build:
            context: ./
            dockerfile: Dockerfile
        volumes:
            - ./php/src:/var/www/html/
        ports:
            - 8000:80
```

### Verificar  el estado del servicio
```
doccker ps
```
o 
```
docker-compose ps
```

## Run docker app Dev mode

- En la carpeta del proyecto se ejecuta el comando:

-- Ejecucuón en modo oculto (sube los contenedores pero no queda el terminal)

```
docker-compose up -d
```
-- Ejecucuón en modo visible (sube los contenedores y queda el terminal abierto)

```
docker-compose up
```
-- Ejecución para un recreate si se necessita (recrea los contenedores)
```
docker-compose up -d --force-recreate
```

## PHP Documentor 

- Para instalar 

```
composer require --dev phpdocumentor/shim
```

- Para Ejecutar una actualización en la documentación

```
php vendor/bin/phpdoc run -d php -t documentation --title CampingsPlace --template="clean" --cache-folder [folder-cache]
```

- Para leer la documentacion basta con que se ejecute el index.html que esta dentro de la carpeta 'documentation' en su browser.