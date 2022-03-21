<?php

use Ramsey\Uuid\Uuid;
use Src\Api\User\Domain\ValueObjects\UserEmail;
use Src\Api\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\Api\User\Domain\ValueObjects\UserName;
use Src\Api\User\Domain\ValueObjects\UserPassword;
use Src\Api\User\Domain\ValueObjects\UserRememberToken;

final class User
{
    private Uuid $Uuid;
    private UserName $name;
    private UserEmail $email;
    private UserEmailVerifiedDate $emailVerifiedDate;
    private UserPassword $password;
    private UserRememberToken $rememberToken;

    public function __construct(
        Uuid $Uuid,
        UserName $name,
        UserEmail $email,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserPassword $password,
        UserRememberToken $rememberToken
    )
    {
        $this->Uuid              = $Uuid;
        $this->name              = $name;
        $this->email             = $email;
        $this->emailVerifiedDate  = $emailVerifiedDate;
        $this->password          = $password;
        $this->rememberToken     = $rememberToken;
    }

    public function getUuid(): Uuid
    {
        return $this->Uuid;
    }

    public function getName(): UserName
    {
        return $this->name;
    }

    public function getEmail(): UserEmail
    {
        return $this->email;
    }

    public function getEmailVerifiedDate(): UserEmailVerifiedDate
    {
        return $this->emailVerifiedDate;
    }

    public function getPassword(): UserPassword
    {
        return $this->password;
    }

    public function getRememberToken(): UserRememberToken
    {
        return $this->rememberToken;
    }

    public static function create(
        Uuid $Uuid,
        UserName $name,
        UserEmail $email,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserPassword $password,
        UserRememberToken $rememberToken
    ): User
    {
        return new self($Uuid, $name, $email, $emailVerifiedDate, $password, $rememberToken);
    }
}
