<?php

final class User
{
    private UserName $name;
    private UserEmail $email;
    private UserEmailVerifiedDate $emailVerifiedDate;
    private UserPassword $password;
    private UserRememberToken $rememberToken;

    public function __construct(
        UserName $name,
        UserEmail $email,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserPassword $password,
        UserRememberToken $rememberToken
    )
    {
        $this->name              = $name;
        $this->email             = $email;
        $this->emailVerifiedDate  = $emailVerifiedDate;
        $this->password          = $password;
        $this->rememberToken     = $rememberToken;
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
        UserName $name,
        UserEmail $email,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserPassword $password,
        UserRememberToken $rememberToken
    ): User
    {
        return new self($name, $email, $emailVerifiedDate, $password, $rememberToken);
    }
}
