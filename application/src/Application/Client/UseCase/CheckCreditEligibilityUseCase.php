<?php

declare(strict_types=1);

namespace DddCleanArchitecture\Application\Client\UseCase;

use DddCleanArchitecture\Application\Client\Dto\CheckCreditEligibilityDto;
use DddCleanArchitecture\Application\Client\Dto\EligibilityCheckResponseDto;
use DddCleanArchitecture\Application\Client\Enum\CurrencyEnum;
use DddCleanArchitecture\Application\Client\Service\FicoCreditScoreServiceInterface;
use DddCleanArchitecture\Domain\Client\Service\CreditEligibilityService;
use DddCleanArchitecture\Domain\Client\ValueObject\Age;
use DddCleanArchitecture\Domain\Client\ValueObject\FicoCreditScore;
use DddCleanArchitecture\Domain\Common\ValueObject\AddressState;
use DddCleanArchitecture\Domain\Common\ValueObject\Money;

class CheckCreditEligibilityUseCase
{
    public function __construct(
        private CreditEligibilityService $creditEligibilityService,
        private FicoCreditScoreServiceInterface $ficoCreditScoreService
    ) {
    }

    public function execute(CheckCreditEligibilityDto $dto): EligibilityCheckResponseDto
    {
        //TODO should be some mapper here
        $creditScore = $this->ficoCreditScoreService->getCreditScore($dto->ssn);
        $result = $this->creditEligibilityService->checkEligibility(
            new FicoCreditScore($creditScore),
            new Money($dto->monthlyIncome, CurrencyEnum::USD->value),
            new Age($dto->age),
            new AddressState($dto->state),
        );

        return new EligibilityCheckResponseDto(
            $result->creditStatus,
            $result->message
        );
    }
}
