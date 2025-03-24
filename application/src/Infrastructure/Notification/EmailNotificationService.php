<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Infrastructure\Notification;

use DddCleanArchitecture\Application\Client\Dto\NotificationDto;
use DddCleanArchitecture\Application\Client\Service\NotificationServiceInterface;

class EmailNotificationService implements NotificationServiceInterface
{
    /**
     * TODO $mailer should have an interface like MailerInterface with a send method. Here for informational purposes only
     * @param MailerInterface $mailer
     */
    public function __construct(private $mailer)
    {
    }

    public function notify(NotificationDto $notificationDto): void
    {
        // TODO
//        $this->mailer->send($notificationDto->toArray());
    }
}
