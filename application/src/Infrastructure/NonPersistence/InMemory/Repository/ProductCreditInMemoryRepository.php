<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Infrastructure\NonPersistence\InMemory\Repository;

use DddCleanArchitecture\Application\Client\Enum\CurrencyEnum;
use DddCleanArchitecture\Domain\Common\ValueObject\Money;
use DddCleanArchitecture\Domain\Common\ValueObject\Name;
use DddCleanArchitecture\Domain\Common\ValueObject\Ssn;
use DddCleanArchitecture\Domain\ProductCredit\Entity\ProductCredit;
use DddCleanArchitecture\Domain\ProductCredit\Repository\ProductCreditRepositoryInterface;
use DddCleanArchitecture\Domain\ProductCredit\ValueObject\CreditTerm;
use DddCleanArchitecture\Domain\ProductCredit\ValueObject\InterestRate;

class ProductCreditInMemoryRepository implements ProductCreditRepositoryInterface
{
    private array $storage = [];

    /**
     * @return array|ProductCredit[]
     */
    public function all(): array
    {
        //TODO should be some mapper here
        return [
            new ProductCredit(
                new Ssn('123-12-1234'),
                new Name('ProductCredit'),
                new CreditTerm(12),
                new InterestRate(12),
                new Money(120000, CurrencyEnum::USD->value),
            )
        ];

//        return $this->storage;
    }
}
