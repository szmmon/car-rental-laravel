<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Session;
use App\UserRole;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    return view('users.index', [
        'users' => User::paginate(2) 
    ]); 
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->fill($request->validated());
        $user->save();
        return redirect(route('users.index'))->with('status', 'User updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user) :JsonResponse
    {

        try {
        $user->delete();
        Session::flash('status', 'User deleted');

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
