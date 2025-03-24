<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Presentation\Cli;

use DddCleanArchitecture\Application\Client\Dto\AddressDto;
use DddCleanArchitecture\Application\Client\Dto\CreateClientDto;
use DddCleanArchitecture\Application\Client\UseCase\CreateClientUseCase;
use DddCleanArchitecture\Infrastructure\NonPersistence\InMemory\Repository\ClientInMemoryRepository;

class CreateClientCli implements CliInterface
{
    public function run(string $jsonData): bool
    {
        $clientData = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "Invalid JSON data.\n";
            return false;
        }

        //TODO it is necessary to have DI container, in Infrastructure layer?
        $clientRepository = new ClientInMemoryRepository();
        $createClientUseCase = new CreateClientUseCase($clientRepository);
        $clientData['address'] = AddressDto::fromArray($clientData['address']);
        $createClientDto = CreateClientDto::fromArray($clientData);
        $createClientUseCase->execute($createClientDto);

        echo "Client has been created!\n";
        return true;
    }
}
