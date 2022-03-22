<?php

namespace Src\Api\User\Infrastructure;

use Illuminate\Support\Collection;
use Src\Api\User\Application\GetMostUsedDomainsUseCase;
use Src\Api\User\Infrastructure\Persistence\EloquentUserRepository;

final class GetMostUsedDomainsController
{
    private EloquentUserRepository $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): Collection
    {
        $getMostUsedDomainsUseCase = new GetMostUsedDomainsUseCase($this->repository);
        return $getMostUsedDomainsUseCase->__invoke();
    }
}
