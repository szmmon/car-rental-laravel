<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBookingConfirmedRequest;
use App\Models\BookingConfirmed;
use App\Models\Car;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
     * Show the form for editing the specified resource.
     */
    public function edit(BookingConfirmed $bookingConfirmed)
    {
        return View('bookingConfirmed.edit', [
            'record' => $bookingConfirmed,
            'cars' => Car::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookingConfirmed $bookingConfirmed)
    {
        // $bookingConfirmed->fill($request->validated());
        $bookingConfirmed->car_id = $request->car_id;
        $bookingConfirmed->location = $request->location;
        $bookingConfirmed->pick_up_date = $request->pick_up_date;
        $bookingConfirmed->return_date = $request->return_date;
        $bookingConfirmed->total_price = $request->total_price;
        $bookingConfirmed->save();
        return redirect(route('bookingConfirmed.index'))->with('status', 'Booking updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookingConfirmed $bookingConfirmed)
    {
        try {
        $bookingConfirmed->delete();
        Session::flash('status', 'Booking deleted');
        return response()->json(
            ['status'=> 'success']
        );
            
        } catch (\Exception $e) {
        return response()->json(
            ['status'=> 'error',
            'message'=>'Serverside error occured']
        )->setStatusCode(500);
            
        }
    }
}
