<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cars.index', [
            'cars' => Car::paginate(10)
        ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $car = new Car($request->validated());
        if ($request->hasFile(key:'image')){
            $car->image_path = $request->file(key:'image')->store(path:'cars');
                }        
        $car->save();
        return redirect(route('cars.index'))->with('status', 'Vehicle stored');
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
         return view('cars.show', [
            'car' => $car,
        ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('cars.edit', [
            'car' => $car,
        ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCarRequest $request, Car $car)
    {
        $car->fill($request->validated());

        if ($request->hasFile(key:'image')){
            if($car->image_path != NULL){
                $oldImagePath = $car->image_path;
                if (Storage::exists($oldImagePath)){
                        Storage::delete($oldImagePath);
                    }
            }
            $car->image_path = $request->file(key:'image')->store(path:'cars');
                }        
        $car->save();
        return redirect(route('cars.index'))->with('status', 'Vehicle updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        try {
        $car->delete();
        Session::flash('status', 'Vehicle deleted');
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
