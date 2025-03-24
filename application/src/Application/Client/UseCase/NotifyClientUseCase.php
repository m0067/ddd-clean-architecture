<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\Client\UseCase;

use DddCleanArchitecture\Application\Client\Dto\NotificationDto;
use DddCleanArchitecture\Application\Client\Service\NotificationServiceInterface;
use DddCleanArchitecture\Application\Common\Dto\OkDto;

class NotifyClientUseCase
{
    public function __construct(private NotificationServiceInterface $notificationService)
    {
    }

    public function execute(NotificationDto $notificationDto): OkDto
    {
        $this->notificationService->notify($notificationDto);

        return new OkDto();
    }
}
