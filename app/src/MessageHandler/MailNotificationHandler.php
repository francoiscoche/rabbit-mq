<?php

namespace App\MessageHandler;

use App\Message\MailNotification;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class MailNotificationHandler
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function __invoke(MailNotification $message)
    {
        $email = (new Email())
        ->from($message->getFrom())
        ->to('admin@my-incident.io')
        ->subject('New Incident #' . $message->getId() . ' - ' . $message->getFrom())
        ->html('<p>' . $message->getDescription() . '</p>');

        // sleep(10);

        $this->mailer->send($email);
    }
}
