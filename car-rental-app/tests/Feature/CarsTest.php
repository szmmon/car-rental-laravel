<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarsTest extends TestCase
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

    public function test_admin_can_access_cars_table(): void
    {
        
        $response = $this->actingAs($this->admin)->get("/cars");

        $response->assertStatus(200);
        $response->assertSee("Cars list");
    }
    public function test_user_cant_access_cars_table(): void
    {
        $response = $this->actingAs($this->user)->get("/cars");

        $response->assertStatus(403);
    }
    public function test_cars_table_have_records(): void
    {
        $car = Car::factory()->create();
        
        $response = $this->actingAs($this->admin)->get("/cars");

        $response->assertStatus(200);
        $response->assertSee($car->name);
    }
    public function test_cars_table_dont_have_records(): void
    {
        
        $response = $this->actingAs($this->admin)->get("/cars");

        $response->assertStatus(200);
        $response->assertSee("No cars added");
    }
     public function test_user_cant_see_cars_menu_dropdown(): void
    {
        $response = $this->actingAs($this->user)->get("/home");
        $response->assertStatus(200);
        $response->assertViewMissing('Cars menu');
    }
     public function test_admin_can_see_cars_menu_dropdown(): void
    {
        
        $response = $this->actingAs($this->admin)->get("/home");
        $response->assertStatus(200);
        $response->assertViewMissing('Cars menu');
    }
    public function test_create_car_successful(){
        $car = Car::factory()->create();
        $response = $this->actingAs($this->admin)->post("/cars/create", $car->toArray());

        $response->assertStatus(302);

        $this->assertDatabaseHas('cars', $car->toArray());

    }


    private function createUser(){
        return User::factory()->create(["role" => 'user']);
    }
    private function createAdmin(){
        return User::factory()->create(["role" => 'admin']);
    }
}
