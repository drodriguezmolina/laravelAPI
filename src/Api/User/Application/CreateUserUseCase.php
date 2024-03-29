<?php

namespace Src\Api\User\Application;

use DateTime;
use Src\Api\User\Domain\Contracts\UserRepositoryContract;
use Src\Api\User\Domain\User;
use Src\Api\User\Domain\ValueObjects\UserEmail;
use Src\Api\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\Api\User\Domain\ValueObjects\UserName;
use Src\Api\User\Domain\ValueObjects\UserPassword;
use Src\Api\User\Domain\ValueObjects\UserRememberToken;

final class CreateUserUseCase
{
    private UserRepositoryContract $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(
        string $userName,
        string $userEmail,
        ?DateTime $userEmailVerifiedDate,
        string $userPassword,
        ?string $userRememberToken
    ): ?String
    {
        $name              = new UserName($userName);
        $email             = new UserEmail($userEmail);
        $emailVerifiedDate  = new UserEmailVerifiedDate($userEmailVerifiedDate);
        $password          = new UserPassword($userPassword);
        $rememberToken     = new UserRememberToken($userRememberToken);

        $user = User::create($name, $email, $emailVerifiedDate, $password, $rememberToken);

        return $this->repository->save($user);
    }
}
