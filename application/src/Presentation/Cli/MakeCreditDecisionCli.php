<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Presentation\Cli;

use DddCleanArchitecture\Application\Client\UseCase\CheckCreditEligibilityUseCase;
use DddCleanArchitecture\Application\Client\UseCase\NotifyClientUseCase;
use DddCleanArchitecture\Application\ProductCredit\Dto\MakeCreditDecisionDto;
use DddCleanArchitecture\Application\ProductCredit\UseCase\MakeCreditDecisionUseCase;
use DddCleanArchitecture\Domain\Client\Service\CreditEligibilityService;
use DddCleanArchitecture\Domain\ProductCredit\Service\InterestRateService;
use DddCleanArchitecture\Infrastructure\Api\FicoCreditScoreService;
use DddCleanArchitecture\Infrastructure\NonPersistence\InMemory\Repository\ProductCreditInMemoryRepository;
use DddCleanArchitecture\Infrastructure\Notification\EmailNotificationService;

class MakeCreditDecisionCli implements CliInterface
{
    public function run(string $jsonData): bool
    {
        $productData = json_decode($jsonData, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "Invalid JSON data.\n";
            return false;
        }

        //TODO it is necessary to have DI container, in Infrastructure layer?
        $makeCreditDecisionUseCase = new MakeCreditDecisionUseCase(
            new CheckCreditEligibilityUseCase(
                new CreditEligibilityService(),
                new FicoCreditScoreService(null),
            ),
            new NotifyClientUseCase(new EmailNotificationService(null)),
            new InterestRateService(),
            new ProductCreditInMemoryRepository()
        );
        $makeCreditDecisionDto = MakeCreditDecisionDto::fromArray($productData);
        $response = $makeCreditDecisionUseCase->execute($makeCreditDecisionDto);

        echo json_encode($response);
        return true;
    }
}
