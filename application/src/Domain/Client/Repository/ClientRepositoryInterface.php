<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Domain\Client\Repository;

use DddCleanArchitecture\Domain\Client\Entity\Client;
use DddCleanArchitecture\Domain\Common\ValueObject\Ssn;

interface ClientRepositoryInterface
{
    public function save(Client $client): void;

    public function findBySsn(Ssn $ssn): ?Client;
}
