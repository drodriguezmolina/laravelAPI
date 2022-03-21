<?php

namespace Src\Api\User\Application;

use Src\Api\User\Domain\Contracts\UserRepositoryContract;
use Src\Api\User\Domain\User;
use Src\Api\User\Domain\ValueObjects\UserId;

final class GetUserUseCase
{
    private UserRepositoryContract $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $userId): ?User
    {
        return $this->repository->find(new UserId($userId));
    }
}
