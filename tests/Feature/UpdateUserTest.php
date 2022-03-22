<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateUserTest extends Testcase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_is_updated()
    {
        $response = $this->postJson('/api/user', $this->data())
            ->assertStatus(201);

        $user = User::first();

        $this->withHeader('Authorization', 'Bearer ' . $response['access_token'])
            ->putJson("/api/user/$user->id", [
                'name' => "Firstname LastnameNew",
            ])->assertStatus(200);

        $this->withHeader('Authorization', 'Bearer ' . $response['access_token'])
            ->json('GET', "/api/user/$user->id")
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => "Firstname LastnameNew",
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
