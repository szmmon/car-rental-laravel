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
        $response->assertSee('Cars menu');
    }

    public function test_create_car_successful(){
        // $car = Car::factory()->create()->toArray();
        $car = [
            'name' => fake()->name(),
            'description' =>fake()->name(20),
            'year' =>random_int(1900, 2010),
            'daily_price' =>random_int(10,100),
        ];
        $response = $this->actingAs($this->admin)->post("/cars/create", $car);

        $response->assertStatus(302);

        $this->assertDatabaseHas('cars', $car);

    }
    public function test_cars_edit_contains_correct_values()
    {
        $car = Car::factory()->create();
        
        $response = $this->actingAs($this->admin)->get('/cars/edit/' . $car->id);
        
        $response->assertStatus(200);

        $response->assertSee('value="' . $car->name .'"', false);
        $response->assertSee('value="' . $car->year .'"', false);
        $response->assertSee('value="' . $car->daily_price .'"', false);
        $response->assertViewHas('car', $car);

    }
    public function test_cars_update_error_redirects_back_to_form()
    {
        $car = Car::factory()->create();
        $response = $this->actingAs($this->admin)->post('cars/' . $car->id, [
            'name' => '',
            'daily_price' => 'a'
        ]
        );
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'daily_price']);
    }

    public function test_cars_delete_successfully()
    {
        $car = Car::factory()->create();
        
        $response = $this->actingAs($this->admin)->delete('cars/' . $car->id);
        
        $response->assertStatus(200);
        $response->assertDontSee('car', $car);
        $this->assertDatabaseMissing('cars', $car->toArray()); 
        $this->assertDatabaseCount('cars', 0);

    
    }

    private function createUser(){
        return User::factory()->create(["role" => 'user']);
    }
    private function createAdmin(){
        return User::factory()->create(["role" => 'admin']);
    }
}
