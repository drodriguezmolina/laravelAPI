<?php

namespace Src\Api\User\Domain\ValueObjects;

final class UserName
{
    private String $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function value(): string
    {
        return $this->name;
    }
}
