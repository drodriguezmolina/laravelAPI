<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_user()
    {
        $this->withoutExceptionHandling();
        $this->postJson('/api/user', $this->data())
            ->assertStatus(201);

        $this->assertCount(1, User::all());
        $user = User::first();

        $this->json('GET', "/api/user/$user->id")
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => 'Firstname Lastname',
                    'email' => "firstname.lastname@gmail.com",
                    'emailVerifiedDate' => null
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
