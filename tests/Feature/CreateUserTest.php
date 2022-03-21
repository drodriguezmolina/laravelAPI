<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateUserTest extends Testcase
{
    use RefreshDatabase;

    /** @test */
    public function a_new_user_is_created()
    {
        $this->postJson('/api/user', $this->data())
            ->assertStatus(201);

        $this->assertCount(1, User::all());

        $user = User::first();

        $this->json('GET', "/api/user/$user->id")
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => "Firstname Lastname",
                    'email' => "firstname.lastname@gmail.com",
                ]
            ]);
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
