<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\Client\Dto;

use DddCleanArchitecture\Application\Common\Dto\BaseDto;
use DddCleanArchitecture\Common\Enum\CreditStatusEnum;

class EligibilityCheckResponseDto extends BaseDto
{
    public function __construct(public CreditStatusEnum $creditStatus, public string $message)
    {
    }
}
