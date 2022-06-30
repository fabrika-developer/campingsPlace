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

  - 172.23.0.3 (apache)
  - 172.23.0.4 (phpmyadmin)
  - 172.23.0.2:3306 (mysql)

#### Configurar los Hosts en /etc/hosts

- Acceder al terminal y editar el archivo hosts

```
# sudo nano /etc/hosts
```

- Dentro del archivo hosts poner la info abajo

```
172.23.0.4 www.phpmyadmin.it phpmyadmin.it http://phpmyadmin.it 
172.23.0.2 mysqlhost mysqlhost.it
172.23.0.3 www.campingsplace.it campingsplace.it http://campingsplace.it
```

- Ahora se puede acceder a las direcciones

- - http://phpmyadmin.it (usar para acceder a phpmyadmin)
- - http://campingsplace.it (usar para acceder a pagina web)
- - mysqlhost (usar como host en el login de phpmyadmin), (mysqlhost, root, root)


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
        depends_on: 
            - mysql-server
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
        depends_on: 
            - mysql-server
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

## Actualización de las Tablas 

- Toda vez que se actualiza un schema de tablas o columnas o lo que sea se debe poner los cambios dentro del README.MD que esta dentro de la carpeta 'phpmyadmin' para que este pueda servir de mapa de la BBDD cuando se necesite consultar algo.

## GIT actualizar con los cambios de la BBDD 

- Siempre que tengamos cambios en la BBDD y necesitamos subir los cambios a GIT para no perder información debemos seguir los procedimientos.

* Para crear Tags de versiones

```
git tag v0.0.1
git push origin v0.0.3
```

### Como organizar las versiones:

- Versiones de TAG para BACKEND deben ser terminar en numeros IMPAR (1, 3, 5, 7, 9, etc...)

Ej; v0.0.1, v0.0.3, v0.0.5, v0.0.7  

- Versiones de TAG para FRONTEND deben ser terminar en numeros PARES (2, 4, 6, 8, 10, etc...)

Ej; v0.0.2, v0.0.4, v0.0.6, v0.0.8

- - Realeases Finales de Funcionalidades creadas.

- Para este tipo de realease lo que cambiamos es el primero numero de la version.

Backend:  v1.0.0, v3.0.0, v5.0.0
Frontend: v2.0.0, v4.0.0, v6.0.0

* De esta forma vamos incrementando features al final y realeases al principio.


* En lo terminal hacer git status
```
# git status

Changes not staged for commit:
  (use "git add <file>..." to update what will be committed)
  (use "git restore <file>..." to discard changes in working directory)
        modified:   mysql/src/ca-key.pem
        modified:   mysql/src/client-key.pem
        modified:   mysql/src/ib_buffer_pool
        modified:   mysql/src/ib_logfile0
        modified:   mysql/src/ibdata1
        modified:   mysql/src/private_key.pem
        modified:   mysql/src/server-key.pem

Untracked files:
  (use "git add <file>..." to include in what will be committed)
        mysql/src/ibtmp1

```
* Podemos ver que cosas en la carpeta mysql no estan add
* No podemos hacer el git add hasta que cambiemos los permisos 
* Tenemos que parar el docker.
```
# docker-compose down
```
* Cambiar los permisos de la carpeta mysql para el usuario de nuestro ordenador
```
# sudo chown -R laptoplenovo:laptoplenovo mysql
```
* Hacer los procedimientos default de git
```
# git add *
# git commit -m "mi mensage"
# git push
```
* Volver a subir el contenedor de docker
```
# docker-compose up
```
* De esta forma hacemos el backup de las BBDDs en github
