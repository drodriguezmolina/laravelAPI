<?php

namespace Src\Api\User\Domain\ValueObjects;

use DateTime;

final class UserEmailVerifiedDate
{
    private ?DateTime $emailVerifiedDate;

    public function __construct(?DateTime $emailVerifiedDate)
    {
        $this->emailVerifiedDate = $emailVerifiedDate;
    }

    public function value(): ?DateTime
    {
        return $this->emailVerifiedDate;
    }
}
