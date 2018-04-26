version: '2'
services:
    web:
        build:
            context: ./
            dockerfile: deploy/web.docker
        volumes:
            - ./:/var/www
        ports:
            - "3456:80"
        links:
            - app
    app:
        build:
            context: ./
            dockerfile: deploy/app.docker
        volumes:
            - ./:/var/www
        links:
            - database
        environment:
            - "DB_PORT=3300"
            - "DB_HOST=database"
    database:
        image: mysql
        environment:
            - "MYSQL_USERNAME=root"
            - "MYSQL_ROOT_PASSWORD=secret"
        ports:
            - "3300:3300"
    phpmyadmin:
        image: phpmyadmin/phpmyadmin
        environment:
            - "MYSQL_USERNAME=root"
            - "MYSQL_ROOT_PASSWORD=secret"
            - "PMA_HOST=database"
        links:
            - database
        ports:
            - "8080:80"