<?php

namespace Src\Api\User\Application;

use DateTime;
use Src\Api\User\Domain\Contracts\UserRepositoryContract;
use Src\Api\User\Domain\User;
use Src\Api\User\Domain\ValueObjects\UserEmail;
use Src\Api\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\Api\User\Domain\ValueObjects\UserId;
use Src\Api\User\Domain\ValueObjects\UserName;
use Src\Api\User\Domain\ValueObjects\UserPassword;
use Src\Api\User\Domain\ValueObjects\UserRememberToken;

final class UpdateUserUseCase
{
    private UserRepositoryContract $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        int $userId,
        string $userName,
        string $userEmail,
        ?DateTime $userEmailVerifiedDate,
        string $userPassword,
        ?string $userRememberToken
    ): void
    {
        $id                = new UserId($userId);
        $name              = new UserName($userName);
        $email             = new UserEmail($userEmail);
        $emailVerifiedDate  = new UserEmailVerifiedDate($userEmailVerifiedDate);
        $password          = new UserPassword($userPassword);
        $rememberToken     = new UserRememberToken($userRememberToken);

        $user = User::create($name, $email, $emailVerifiedDate, $password, $rememberToken);

        $this->repository->update($id, $user);
    }
}
