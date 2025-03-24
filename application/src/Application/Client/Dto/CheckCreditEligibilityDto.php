<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\Client\Dto;

use DddCleanArchitecture\Application\Common\Dto\BaseDto;

class CheckCreditEligibilityDto extends BaseDto
{
    public function __construct(
        public string $ssn,
        public float $monthlyIncome,
        public int $age,
        public string $state
    ) {
    }
}
