<?php

namespace Src\Api\User\Application;

use Src\Api\User\Domain\Contracts\UserRepositoryContract;
use Src\Api\User\Domain\ValueObjects\UserId;

final class GetMostUserDomainsUseCase
{
    private UserRepositoryContract $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): array
    {
        $users = $this->repository->all();
        dd($users);
    }
}
