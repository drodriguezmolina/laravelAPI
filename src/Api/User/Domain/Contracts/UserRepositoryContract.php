<?php

namespace Src\Api\User\Domain\Contracts;

use Src\Api\User\Domain\User;
use Src\Api\User\Domain\ValueObjects\UserId;

interface UserRepositoryContract
{
    public function all(): array;

    public function find(UserId $id): ?User;

    public function save(User $user): void;

    public function update(UserId $id, User $user): void;

    public function delete(UserId $id): void;

}
