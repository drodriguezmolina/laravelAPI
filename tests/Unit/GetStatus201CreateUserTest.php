<?php

namespace Tests\Unit;

use Tests\TestCase;

class GetStatus201CreateUserTest extends TestCase
{
    public function test_that_create_User_returns_status_201()
    {
        $this->postJson('/api/user', $this->data())
            ->assertStatus(201);
    }

    private function data()
    {
        return [
            'name' => "Firstname Lastname",
            'email' => "firstname.lastname@gmail.com",
            'password' => "password_pwd"
        ];
    }
}
