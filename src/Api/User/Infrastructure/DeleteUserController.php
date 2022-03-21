<?php

namespace Src\Api\User\Infrastructure;

use Illuminate\Http\Request;
use Src\Api\User\Application\DeleteUserUseCase;
use Src\Api\User\Infrastructure\Persistence\EloquentUserRepository;

final class DeleteUserController
{
    private EloquentUserRepository $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $userId = (int)$request->id;
        $deleteUserUseCase = new DeleteUserUseCase($this->repository);
        $deleteUserUseCase->__invoke($userId);
    }
}
