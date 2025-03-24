<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\Client\Service;

use DddCleanArchitecture\Application\Client\Dto\NotificationDto;

interface NotificationServiceInterface
{
    public function notify(NotificationDto $notificationDto): void;
}
