<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\ProductCredit\Dto;

use DddCleanArchitecture\Application\Common\Dto\BaseDto;

class MakeCreditDecisionDto extends BaseDto
{
    public function __construct(
        public string $ssn,
        public string $clientEmail,
        public float $monthlyIncome,
        public int $age,
        public string $state,
    ) {
    }
}
