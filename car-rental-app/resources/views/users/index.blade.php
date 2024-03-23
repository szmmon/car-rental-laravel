@extends('layouts.app')

    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->

@section('content')

<div class="container" id="cars-table">
    @include('helpers.flashmessages')
    <div class="row">
        <div class="col-12"><h2>Users list</h2></div>
    </div>  
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Role</th>
                <th scope="col">Verificaton</th>
                </tr>
            </thead>
            @foreach($users as $user)
            <tbody>
                <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                @if( !is_null($user->email_verified_at) )
                <td>Yes</td>
                @else
                <td>No</td>
                @endif
                <td>
                <a href="{{route('users.edit', $user->id)}}"><button class="btn btn-info sm"><i class="fa-regular fa-pen-to-square"></i></button></a>
                <button class="btn btn-danger sm record-delete" data-id="{{$user->id}}"><i class="fa-regular fa-trash-can"></i></button></td>
                @endforeach

                </tr>
            </tbody>
    
        </table>
            {{$users->links()}}
    </div>
    </div>

@endsection