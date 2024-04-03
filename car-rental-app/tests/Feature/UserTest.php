<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class UserTest extends TestCase
{
    use RefreshDatabase;
    private User $user;
    private User $admin;
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser();
        $this->admin = $this->createAdmin();
    }
    public function test_admin_can_access_users_table(): void
    {
        
        $response = $this->actingAs($this->admin)->get("/users");

        $response->assertStatus(200);
        $response->assertSee("Users list");
    }
    public function test_user_cant_access_users_table(): void
    {
        $response = $this->actingAs($this->user)->get("/users");

        $response->assertStatus(403);
    }
    public function test_cars_table_have_records(): void
    {
        $response = $this->actingAs($this->admin)->get("/users");

        $response->assertStatus(200);
        
        $this->assertDatabaseCount('users', 2);
    }
    public function test_user_cant_see_users_menu_dropdown(): void
    {
        $response = $this->actingAs($this->user)->get("/home");
        $response->assertStatus(200);
        $response->assertViewMissing('Users menu');
    }
     public function test_admin_can_see_users_menu_dropdown(): void
    {
        
        $response = $this->actingAs($this->admin)->get("/home");
        $response->assertStatus(200);
        $response->assertViewMissing('Users menu');
    }
    public function test_cars_edit_contains_correct_values()
    {
        $user = user::factory()->create();
        
        $response = $this->actingAs($this->admin)->get('/users/edit/' . $user->id);
        
        $response->assertStatus(200);

        $response->assertSee('value="' . $user->name .'"', false);
        $response->assertSee('value="' . $user->email .'"', false);
        $response->assertViewHas('user', $user);

    }
    public function test_users_update_error_redirects_back_to_form()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($this->admin)->post('users/' . $user->id, [
            'name' => ''
        ]
        );
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_users_delete_successfully()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($this->admin)->delete('users/' . $user->id);
        
        $response->assertStatus(200);
        $response->assertDontSee('user', $user);
        $this->assertDatabaseMissing('users', $user->toArray());     
    }
    

    private function createUser(){
        return User::factory()->create(["role" => 'user']);
    }
    private function createAdmin(){
        return User::factory()->create(["role" => 'admin']);
    }

}