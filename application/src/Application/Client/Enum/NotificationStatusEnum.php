<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\Client\Enum;

enum NotificationStatusEnum: string
{
    case APPROVED = 'Approved';
    case REJECTED = 'Rejected';
}
