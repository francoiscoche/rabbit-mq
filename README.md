# Symfony/Docker/RabbitMq

The objective of this project is to set up the sending of mail asynchronously (in the background) with the use of RabbitMq

&nbsp;

Tuto and inspiration : 
- Symfony doc https://symfony.com/doc/current/messenger.html#installation
- YoanDev https://www.youtube.com/watch?v=nXOitUa2WIA

&nbsp;

&nbsp;


## Definition

Symfony Messenger : The Symfony documentation defines Messenger as a component that "helps applications send and receive messages to/from other applications or via message queues.". 

These messages can be transmitted synchronously without getting out the application or asynchronously via queue systems. Messenger, by default, processes messages as soon as they are sent. Messages are then consumed synchronously and never leave the application. 

Messenger centers around two different classes :

- A message class that holds and defines data
- A handler class that will be called when that message is dispatched. The handler class will read the message class and perform one or more tasks.

But the main interest of Messenger, it's the ability to process messages asynchronously. With the configuration of what is called a "transport" you will be able to postpone the moment when the tasks must be executed and then perform them in the background of your application.

The transport is a queuing system. It exisit different transport types that allowing you to process messages asynchronously : 

- AMQP services (like RabbitMQ)
- Doctrine (storing messages in an SQL table)
- Cache systems (like Redis)


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

```bash
app\controller\HomeController.php
app\config\packages\messenger.yaml  #nessenger configuration, where we "call" RabbitMQ.
app\MessageHandler\MailNotificationHandler.php  #handler class.
app\Message\MailNotification.php  #message class.
```



