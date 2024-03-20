<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\ValueObjects\BookRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Car;
use App\ValueObjects\Cart;
use Illuminate\Support\Facades\Session;


class BookRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bookRequest.index', [
        'request' => Session::get('request'),
        'cars' => Car::paginate(2)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bookRequest = new BookRequest($request->location, $request->pick_up_date, $request->return_date);
        Session::put('request', $bookRequest);
        return redirect(route('bookRequest.index'));       
    }

}
