<?php

namespace Src\Api\User\Domain\Contracts;

use Ramsey\Uuid\Uuid;
use Src\Api\User\Domain\User;
use Src\Api\User\Domain\ValueObjects\UserEmail;
use Src\Api\User\Domain\ValueObjects\UserId;
use Src\Api\User\Domain\ValueObjects\UserName;

interface UserRepositoryContract
{
    public function find(UserId $id): ?User;

    public function save(User $user): void;

    public function update(UserId $id, User $user): void;

    public function delete(UserId $id): void;

}
