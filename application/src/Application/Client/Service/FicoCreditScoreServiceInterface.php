<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\Client\Service;

interface FicoCreditScoreServiceInterface
{
    public function getCreditScore(string $ssn): int;
}
