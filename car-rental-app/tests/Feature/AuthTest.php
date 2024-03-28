<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_unauthenticated_user_cannot_access_cars_table(): void
    {
        $response = $this->get('/cars');

        $response->assertStatus(302);
        $response->assertRedirect('login');
    }
    public function test_unauthenticated_user_cannot_access_users_table(): void
    {
        $response = $this->get('/users');
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }
}
