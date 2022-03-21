<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'data' => [
                'name' => $this->getName()->value(),
                'email' => $this->getEmail()->value(),
                'emailVerifiedDate' => $this->getEmailVerifiedDate()->value(),
            ]
        ];
    }
}
