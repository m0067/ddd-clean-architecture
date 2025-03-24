<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\Client\Dto;

use DddCleanArchitecture\Application\Common\Dto\BaseDto;

class AddressDto extends BaseDto
{
    public function __construct(
        public string $street,
        public string $city,
        public string $state,
        public string $zip
    ) {
    }
}
