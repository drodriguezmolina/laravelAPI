<?php

namespace Src\Api\User\Domain\Contracts;

use Ramsey\Uuid\Uuid;
use Src\Api\User\Domain\ValueObjects\UserEmail;
use Src\Api\User\Domain\ValueObjects\UserName;
use User;

interface UserRepositoryContract
{
    public function find(Uuid $Uuid): ?User;

    public function findByCriteria(UserName $userName, UserEmail $userEmail): ?User;

    public function save(User $user): void;

    public function update(Uuid $Uuid, User $user): void;

    public function delete(Uuid $id): void;

}
