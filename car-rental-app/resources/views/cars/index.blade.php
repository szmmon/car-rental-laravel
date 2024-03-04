@extends('layouts.app')

    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

@section('content')
<div class="container" id="cars-table">
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Year</th>
                <th scope="col">Price</th>
                <!-- <th scope="col">Actions</th> -->
                </tr>
            </thead>
            @foreach($cars as $car)
            <tbody>
                <tr>
                <th scope="row">{{$car->id}}</th>
                <td>{{$car->name}}</td>
                <td>{{$car->description}}</td>
                <td>{{$car->year}}</td>
                <td>{{$car->daily_price}}</td>
                <td><a href="{{route('cars.show', $car->id)}}"><button class="btn btn-success sm"><i class="fa-solid fa-magnifying-glass"></i></button></a>
                <a href="{{route('cars.edit', $car->id)}}"><button class="btn btn-secondary sm"><i class="fa-solid fa-pen-to-square"></i></button></a>
                <a href="{{route('cars.index', $car->id)}}"><button class="btn btn-danger sm test-btn" data-id="{{$car->id}}"><i class="fa-solid fa-trash"></i></button></a>
                </td>
                @endforeach
                </tr>
            </tbody>
    
        </table>
    </div>
    <div class="row">
        <div class="col-10"></div>
        <div class="col-2 float-right">
            <a href="{{ route('cars.create') }}" class='float-right'>
                <button class="btn btn-primary">+</button>
            </a>

        </div>
    </div>
    </div>

@endsection