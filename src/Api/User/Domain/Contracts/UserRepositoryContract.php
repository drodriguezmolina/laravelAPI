<?php

namespace Src\Api\User\Domain\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Src\Api\User\Domain\User;
use Src\Api\User\Domain\ValueObjects\UserId;

interface UserRepositoryContract
{
    public function all(): Collection;

    public function find(UserId $id): ?User;

    public function save(User $user): void;

    public function update(UserId $id, User $user): void;

    public function delete(UserId $id): void;

}
