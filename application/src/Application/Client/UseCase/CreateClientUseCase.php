<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\Client\UseCase;

use DddCleanArchitecture\Application\Client\Dto\CreateClientDto;
use DddCleanArchitecture\Application\Client\Enum\CurrencyEnum;
use DddCleanArchitecture\Application\Common\Dto\OkDto;
use DddCleanArchitecture\Domain\Client\Entity\Client;
use DddCleanArchitecture\Domain\Client\Repository\ClientRepositoryInterface;
use DddCleanArchitecture\Domain\Client\ValueObject\Address;
use DddCleanArchitecture\Domain\Client\ValueObject\Age;
use DddCleanArchitecture\Domain\Client\ValueObject\Email;
use DddCleanArchitecture\Domain\Client\ValueObject\PhoneNumber;
use DddCleanArchitecture\Domain\Common\ValueObject\AddressState;
use DddCleanArchitecture\Domain\Common\ValueObject\Money;
use DddCleanArchitecture\Domain\Common\ValueObject\Name;
use DddCleanArchitecture\Domain\Common\ValueObject\Ssn;

class CreateClientUseCase
{
    public function __construct(private ClientRepositoryInterface $clientRepository)
    {
    }

    public function execute(CreateClientDto $createClientDto): OkDto
    {
        //TODO should be some mapper here
        $client = new Client(
            new Ssn($createClientDto->ssn),
            new Name($createClientDto->lastName),
            new Name($createClientDto->firstName),
            new Age($createClientDto->age),
            new Address(
                $createClientDto->address->street,
                $createClientDto->address->city,
                new AddressState($createClientDto->address->state),
                $createClientDto->address->zip,
            ),
            new Email($createClientDto->email),
            new PhoneNumber($createClientDto->phoneNumber),
            new Money($createClientDto->monthlyIncome, CurrencyEnum::USD->value),
        );
        $this->clientRepository->save($client);

        return new OkDto();
    }
}
