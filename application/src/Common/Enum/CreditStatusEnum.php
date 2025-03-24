<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Common\Enum;

enum CreditStatusEnum: string
{
    case PENDING = 'Pending';
    case APPROVED = 'Approved';
    case REJECTED = 'Rejected';
}
