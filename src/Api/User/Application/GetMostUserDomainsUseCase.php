<?php

namespace Src\Api\User\Application;

use Illuminate\Support\Collection;
use Src\Api\User\Domain\Contracts\UserRepositoryContract;

final class GetMostUserDomainsUseCase
{
    private UserRepositoryContract $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): Collection
    {
        $users = $this->repository->all();

        $emails = collect($users)->map(function ($user){ return $user["email"]; });
        $emailsFormatted = collect($emails)->map(function ($email){ return explode('@', $email)[1]; });
        return $emailsFormatted->countBy();
    }
}
