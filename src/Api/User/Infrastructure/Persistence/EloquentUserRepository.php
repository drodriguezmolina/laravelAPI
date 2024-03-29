<?php

namespace Src\Api\User\Infrastructure\Persistence;

use App\Models\User as EloquentUserModel;
use Illuminate\Database\Eloquent\Collection;
use Src\Api\User\Domain\User;
use Src\Api\User\Domain\ValueObjects\UserId;
use Src\Api\User\Domain\Contracts\UserRepositoryContract;
use Src\Api\User\Domain\ValueObjects\UserEmail;
use Src\Api\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\Api\User\Domain\ValueObjects\UserName;
use Src\Api\User\Domain\ValueObjects\UserPassword;
use Src\Api\User\Domain\ValueObjects\UserRememberToken;

final class EloquentUserRepository implements UserRepositoryContract
{
    private EloquentUserModel $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new EloquentUserModel;
    }

    public function all(): Collection
    {
       return $this->eloquentUserModel->all();
    }

    public function find(UserId $id): ?User
    {
        $user = $this->eloquentUserModel->findOrFail($id->value());
        return new User(
            new UserName($user->name),
            new UserEmail($user->email),
            new UserEmailVerifiedDate($user->email_verified_at),
            new UserPassword($user->password),
            new UserRememberToken($user->remember_token)
        );
    }

    public function save(User $user): ?String
    {
        $user = $this->eloquentUserModel->create([
            'name'              => $user->getName()->value(),
            'email'             => $user->getEmail()->value(),
            'email_verified_at'  => $user->getEmailVerifiedDate()->value(),
            'password'          => $user->getPassword()->value(),
            'remember_token'    => $user->getRememberToken()->value(),
        ]);
        return $user->createToken('auth_token')->plainTextToken;
    }

    public function update(UserId $id, User $user): void
    {
        $data = [
            'name'  => $user->getName()->value(),
            'email' => $user->getEmail()->value(),
        ];

        $this->eloquentUserModel
            ->find($id->value())
            ->update($data);
    }

    public function delete(UserId $id): void
    {
        $this->eloquentUserModel
            ->findOrFail($id->value())
            ->delete();
    }
}
