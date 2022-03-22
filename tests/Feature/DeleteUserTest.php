<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteUserTest extends Testcase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_is_deleted()
    {
        $this->postJson('/api/user', $this->data())
            ->assertStatus(201);

        $user = User::first();

        $this->assertCount(1, User::all());

        $this->json('DELETE', "/api/user/$user->id")
            ->assertStatus(204);

        $this->assertCount(0, User::all());
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
