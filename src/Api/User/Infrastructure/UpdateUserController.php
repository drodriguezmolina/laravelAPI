<?php

namespace Src\Api\User\Infrastructure;

use Illuminate\Http\Request;
use Src\Api\User\Application\GetUserUseCase;
use Src\Api\User\Application\UpdateUserUseCase;
use Src\Api\User\Infrastructure\Persistence\EloquentUserRepository;

final class UpdateUserController
{
    private EloquentUserRepository $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $userId = (int)$request->id;

        $getUserUseCase         = new GetUserUseCase($this->repository);
        $user                   = $getUserUseCase->__invoke($userId);
        $userName               = $request->input('name') ?? $user->getName()->value();
        $userEmail              = $request->input('email') ?? $user->getEmail()->value();
        $userEmailVerifiedDate   = $user->getEmailVerifiedDate()->value();
        $userPassword           = $user->getPassword()->value();
        $userRememberToken      = $user->getRememberToken()->value();

        $updateUserUseCase = new UpdateUserUseCase($this->repository);
        $updateUserUseCase->__invoke(
            $userId,
            $userName,
            $userEmail,
            $userEmailVerifiedDate,
            $userPassword,
            $userRememberToken
        );

        return $getUserUseCase->__invoke($userId);
    }
}
