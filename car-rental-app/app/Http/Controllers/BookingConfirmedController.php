<?php

namespace App\Http\Controllers;

use App\Models\BookingConfirmed;
use App\Models\Car;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingConfirmedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View(
            'bookingConfirmed.index', [
            'booking' => BookingConfirmed::all(),
            'user_id' => Auth::id(),
            'cars' => Car::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Car $car)
    {   
        $bookingConfirmed = new BookingConfirmed();
        $bookingConfirmed->location = $request->location;
        $bookingConfirmed->pick_up_date = $request->pick_up_date;
        $bookingConfirmed->return_date = $request->return_date;
        $bookingConfirmed->total_price = $request->total_price;
        $bookingConfirmed->user_id = Auth::id();
        $bookingConfirmed->car_id = $request->car_id;
        $bookingConfirmed->save();
       
        $car = new Car();
        $car->name = $request->car_name;
        $car->description = $request->car_description;
        $car->year = $request->car_year;
       
        return redirect(route('bookingConfirmed.index'))->with('status', 'Booking stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(BookingConfirmed $bookingConfirmed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookingConfirmed $bookingConfirmed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookingConfirmed $bookingConfirmed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookingConfirmed $bookingConfirmed)
    {
        //
    }
}
