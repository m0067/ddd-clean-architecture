<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Domain\Client\ValueObject;

use DddCleanArchitecture\Domain\Common\ValueObject\AbstractValueObject;
use DddCleanArchitecture\Domain\Common\ValueObject\AddressState;
use InvalidArgumentException;

final readonly class Address extends AbstractValueObject
{
    public function __construct(
        public string $street,
        public string $city,
        public AddressState $state,
        public string $zipCode
    ) {
        if (empty($street) || empty($city) || empty($state) || empty($zipCode)) {
            throw new InvalidArgumentException('All address fields must be provided.');
        }
    }

    public function __toString(): string
    {
        return sprintf('%s, %s, %s %s', $this->street, $this->city, $this->state, $this->zipCode);
    }
}
