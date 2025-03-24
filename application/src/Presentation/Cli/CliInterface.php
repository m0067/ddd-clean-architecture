<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Presentation\Cli;

interface CliInterface
{
    public function run(string $jsonData): bool;
}
