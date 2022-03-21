<?php

namespace Src\Api\User\Domain\ValueObjects;

final class UserRememberToken
{
    private ?string $rememberToken;

    public function __construct(?string $rememberToken)
    {
        $this->rememberToken = $rememberToken;
    }

    public function value(): ?string
    {
        return $this->rememberToken;
    }

}
