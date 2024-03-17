@extends('layouts.app')

@section('content')
<div class="container show-edit">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User view</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{$user->email}}">
                            </div>

                                
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>
                            <div class="col-md-6">
                                <select class="form-select" aria-label="Default select example" name="role">
                                    <option selected>{{$user->role}}</option>
                                    <!-- todo jako loop po UserRole  -->
                                    <option value="Admin">admin</option>
                                    <option value="User">user</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row m-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" value="">
                                    Update user data
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
