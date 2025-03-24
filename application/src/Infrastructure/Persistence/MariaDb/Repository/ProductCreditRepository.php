<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Infrastructure\Persistence\MariaDb\Repository;

use DddCleanArchitecture\Domain\ProductCredit\Entity\ProductCredit;
use DddCleanArchitecture\Domain\ProductCredit\Repository\ProductCreditRepositoryInterface;

class ProductCreditRepository implements ProductCreditRepositoryInterface
{
    /**
     * TODO $db should have an interface like DbInterface with a send method. Here for informational purposes only
     * @param DbInterface $db
     */
    public function __construct(private $db)
    {
    }

    /**
     * TODO
     * @return array|ProductCredit[]
     */
    public function all(): array
    {
        return [];
    }
}
