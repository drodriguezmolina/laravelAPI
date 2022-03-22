<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetMostUserDomainsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function top_3_most_user_domains_retrieved()
    {
        $response = $this->postJson('/api/user', [
                'name' => "Firstname Lastname",
                'email' => "firstname.lastname@gmail.com",
                'password' => "password_pwd"
            ])
            ->assertStatus(201);

        $this->postJson('/api/user', [
                'name' => "Firstname Lastname",
                'email' => "firstname.lastname@clicko.com",
                'password' => "password_pwd"
            ])
            ->assertStatus(201);

        $this->postJson('/api/user', [
                'name' => "Firstname Lastname",
                'email' => "firstname.lastname2@gmail.com",
                'password' => "password_pwd"
            ])
            ->assertStatus(201);

        $this->withHeader('Authorization', 'Bearer ' . $response['access_token'])
            ->json('GET', "api/user/most-used-domains")
            ->assertStatus(200)
            ->assertJson([
                'gmail.com' => 2,
                'clicko.com' => 1,
            ]);
    }
}
