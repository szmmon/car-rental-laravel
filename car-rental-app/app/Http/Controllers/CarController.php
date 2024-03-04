<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return redirect()->action([CarController::class, 'index']);
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
        // $oldImagePath = $car->image_path;
        // $car->fill($request->validated());
        // if ($request->hasFile(key:'image')){
        //         if (Storage::exists($oldImagePath)){
        //             Storage::delete($oldImagePath);
        //         }
        //         $car->image_path = $request->file(key:'image')->store(path:'cars');
        // }
        // $car->save();
        return redirect(route('cars.index'));
        // return view('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
