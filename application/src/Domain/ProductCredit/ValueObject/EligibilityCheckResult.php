<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Domain\ProductCredit\ValueObject;

use DddCleanArchitecture\Common\Enum\CreditStatusEnum;
use DddCleanArchitecture\Domain\Common\ValueObject\AbstractValueObject;

final readonly class EligibilityCheckResult extends AbstractValueObject
{
    public function __construct(public CreditStatusEnum $creditStatus, public string $message)
    {
    }

    public function __toString(): string
    {
        return $this->creditStatus->value . $this->message;
    }
}
