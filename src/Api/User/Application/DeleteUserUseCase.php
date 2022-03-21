<?php

namespace Src\Api\User\Application;

use Src\Api\User\Domain\Contracts\UserRepositoryContract;
use Src\Api\User\Domain\ValueObjects\UserId;

final class DeleteUserUseCase
{
    private UserRepositoryContract $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $userId): void
    {
        $this->repository->delete(new UserId($userId));
    }
}
