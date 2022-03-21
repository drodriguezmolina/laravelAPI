<?php

namespace Src\Api\User\Domain\ValueObjects;

final class UserPassword
{
    private string $password;

    public function __construct(string $password)
    {
        $this->password = $password;
    }

    public function value(): string
    {
        return $this->password;
    }
}
