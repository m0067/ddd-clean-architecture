<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Domain\ProductCredit\Entity;

use DddCleanArchitecture\Domain\Common\Entity\BaseEntity;
use DddCleanArchitecture\Domain\Common\ValueObject\Money;
use DddCleanArchitecture\Domain\Common\ValueObject\Name;
use DddCleanArchitecture\Domain\Common\ValueObject\Ssn;
use DddCleanArchitecture\Domain\ProductCredit\ValueObject\CreditTerm;
use DddCleanArchitecture\Domain\ProductCredit\ValueObject\InterestRate;

class ProductCredit extends BaseEntity
{
    public function __construct(
        public Ssn $ssn,
        public Name $name,
        public CreditTerm $term,
        public InterestRate $interestRate,
        public Money $amount
    ) {
    }
}
