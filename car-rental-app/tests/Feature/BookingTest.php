<?php

namespace Tests\Feature;

use App\Models\BookingConfirmed;
use App\Models\Car;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class BookingTest extends TestCase
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
    public function test_user_can_access_bookings_table(): void
    {
        
        $response = $this->actingAs($this->user)->get("/bookingConfirmed");

        $response->assertStatus(200);
        $response->assertSee("your bookings");
    }
    
    public function test_bookings_table_have_records(): void
    {
        $booking = BookingConfirmed::factory()->create();

        $response = $this->actingAs($this->user)->get("/bookingConfirmed");

        $response->assertStatus(200);
        $response->assertSee($booking->car_id);
        $this->assertDatabaseCount('booking_confirmeds', 1);
    }

    public function test_user_can_see_bookings_menu_dropdown(): void
    {
        $response = $this->actingAs($this->user)->get("/home");
        $response->assertStatus(200);
        $response->assertSee('Bookings');
    }
    
    public function test_bookings_edit_contains_correct_values()
    {
        $booking = BookingConfirmed::factory()->create();
        
        $response = $this->actingAs($this->user)->get('bookingConfirmed/' . $booking->id);
        
        $response->assertStatus(200);

        $response->assertSee('value="' . $booking->location .'"', false);

    }
    

    public function test_bookings_delete_successfully()
    {
        $booking = BookingConfirmed::factory()->create();
        
        $response = $this->actingAs($this->admin)->delete('bookingConfirmed/' . $booking->id);
        
        $response->assertStatus(200);
        $response->assertDontSee('booking', $booking);
        $this->assertDatabaseMissing('booking_confirmeds', $booking->toArray());     
    }
    

    private function createUser(){
        return User::factory()->create(["role" => 'user']);
    }
    private function createAdmin(){
        return User::factory()->create(["role" => 'admin']);
    }

}