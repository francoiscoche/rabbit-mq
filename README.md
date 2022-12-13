# Symfony/Docker/RabbitMq

The objective of this project is to set up the sending of mail asynchronously (in the background) with the use of RabbitMq
&nbsp;

Tuto and inspiration : 
- Symfony doc https://symfony.com/doc/current/messenger.html#installation
- YoanDev https://www.youtube.com/watch?v=nXOitUa2WIA

&nbsp;

## Requirements


- Docker
- Docker-compose

&nbsp;

## Run localy the project

&nbsp;

Clone the project

```bash
git clone git@github.com:francoiscoche/rabbit-mq.git
```
Run the docker-compose

```bash
docker-compose build
docker-compose up -d
```

Log into the PHP container

```bash
docker exec -it rabbitmq-php bash
```

Start the server

```bash
symfony serve -d
```
*The application is available at http://127.0.0.1:8001*

&nbsp;

## Try the project

&nbsp;

- Send the mail http://127.0.0.1:8001/home
- Check the RabbitMq UI http://localhost:15672/

Process the bus
```bash
symfony console messenger:consume async -vv
```

&nbsp;

Interesting files

    - app\controller\HomeController.php
    - app\config\packages\messenger.yaml
    - app\MessageHandler\MailNotificationHandler.php
    - app\Message\MailNotification.php




