<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\Client\Dto;

use DddCleanArchitecture\Application\Common\Dto\BaseDto;

class NotificationDto extends BaseDto
{
    public function __construct(public string $to, public string $subject, public string $body)
    {
    }
}
