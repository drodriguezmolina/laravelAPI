<?php

namespace Src\Api\User\Infrastructure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\Api\User\Application\CreateUserUseCase;
use Src\Api\User\Domain\User;
use Src\Api\User\Infrastructure\Persistence\EloquentUserRepository;

final class CreateUserController
{
    private EloquentUserRepository $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request): ?String
    {
        $userName               = $request->input('name');
        $userEmail              = $request->input('email');
        $userEmailVerifiedDate   = null;
        $userPassword           = Hash::make($request->input('password'));
        $userRememberToken      = null;

        $createUserUseCase      = new CreateUserUseCase($this->repository);
        return $createUserUseCase->__invoke(
            $userName,
            $userEmail,
            $userEmailVerifiedDate,
            $userPassword,
            $userRememberToken
        );
    }
}
