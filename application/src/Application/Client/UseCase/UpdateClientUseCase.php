<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\Client\UseCase;

use DddCleanArchitecture\Application\Client\Dto\UpdateClientDto;
use DddCleanArchitecture\Application\Common\Dto\OkDto;
use DddCleanArchitecture\Domain\Client\Repository\ClientRepositoryInterface;
use DddCleanArchitecture\Domain\Client\ValueObject\Email;
use DddCleanArchitecture\Domain\Common\ValueObject\Name;
use DddCleanArchitecture\Domain\Common\ValueObject\Ssn;

class UpdateClientUseCase
{
    public function __construct(private ClientRepositoryInterface $clientRepository)
    {
    }

    public function execute(UpdateClientDto $updateClientDto): OkDto
    {
        //TODO
        $client = $this->clientRepository->findBySsn(new Ssn($updateClientDto->ssn));

        if ($updateClientDto->email) {
            $client->updateEmail(new Email($updateClientDto->email));
        }

        if ($updateClientDto->lastName) {
            $client->updateLastName(new Name($updateClientDto->lastName));
        }

        $this->clientRepository->save($client);

        return new OkDto();
    }
}
