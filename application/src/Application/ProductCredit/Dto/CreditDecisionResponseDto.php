<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\ProductCredit\Dto;

use DddCleanArchitecture\Application\Common\Dto\BaseDto;

class CreditDecisionResponseDto extends BaseDto
{
    public function __construct(
        public bool $isApproved,
        public string $message,
        public float $interestRate,
        public string $productName,
        public int $termInMonths,
        public float $amount
    ) {
    }
}
