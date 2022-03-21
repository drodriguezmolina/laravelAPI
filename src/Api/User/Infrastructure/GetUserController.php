<?php

namespace Src\Api\User\Infrastructure;

use Illuminate\Http\Request;
use Src\Api\User\Application\GetUserUseCase;
use Src\Api\User\Infrastructure\Persistence\EloquentUserRepository;

final class GetUserController
{
    private EloquentUserRepository $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $getUserUseCase = new GetUserUseCase($this->repository);
        return $getUserUseCase->__invoke((int)$request->id);
    }
}
