<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Infrastructure\NonPersistence\InMemory\Repository;

use DddCleanArchitecture\Domain\Client\Entity\Client;
use DddCleanArchitecture\Domain\Client\Repository\ClientRepositoryInterface;
use DddCleanArchitecture\Domain\Common\ValueObject\Ssn;

class ClientInMemoryRepository implements ClientRepositoryInterface
{
    private array $storage = [];

    public function save(Client $client): void
    {
        $this->storage[$client->ssn->ssn] = json_encode($client);
    }

    public function findBySsn(Ssn $ssn): ?Client
    {
        if (isset($this->storage[$ssn->ssn])) {
            //TODO $client needs some denormalize
            $client = json_decode($this->storage[$ssn->ssn], true);

            return $client;
        }

        return null;
    }
}
