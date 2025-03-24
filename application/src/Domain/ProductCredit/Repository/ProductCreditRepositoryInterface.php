<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Domain\ProductCredit\Repository;

use DddCleanArchitecture\Domain\ProductCredit\Entity\ProductCredit;

interface ProductCreditRepositoryInterface
{
    /**
     * @return ProductCredit[]
     */
    public function all(): array;
}
