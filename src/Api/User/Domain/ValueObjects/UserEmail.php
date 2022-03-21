<?php

namespace Src\Api\User\Domain\ValueObjects;

use InvalidArgumentException;

final class UserEmail
{
    private string $email;

    public function __construct(string $email)
    {
        $this->validate($email);
        $this->email = $email;
    }

    private function validate(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf('<%s> does not allow the invalid email: <%s>.', static::class, $email)
            );
        }
    }

    public function value(): string
    {
        return $this->email;
    }
}
