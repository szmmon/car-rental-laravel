<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\BookRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Car;


class BookRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bookRequest.index', ['cars' => Car::paginate(2)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        $bookRequest = new BookRequest($request->validated());
        $bookRequest->save();
        return redirect(route('bookRequest.index'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(BookRequest $bookRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookRequest $bookRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BookRequest $bookRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookRequest $bookRequest)
    {
        //
    }
}
