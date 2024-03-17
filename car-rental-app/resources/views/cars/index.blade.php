@extends('layouts.app')

    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->

@section('content')

<div class="container" id="cars-table">
    @include('helpers.flashmessages')
    <div class="row">
        <div class="col-10"><h2>Cars list</h2></div>
        <div class="col-2 float-right">
            <a href="{{route('cars.create')}}" class='float-right'>
                <button class="btn btn-primary">+</button>
            </a>

        </div>
    </div>  
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
                <td><a href="{{route('cars.show', $car->id)}}"><button class="btn btn-success sm">show</button></a>
                <a href="{{route('cars.edit', $car->id)}}"><button class="btn btn-info sm">edit</button></a>
                <button class="btn btn-danger sm record-delete" data-id="{{$car->id}}">delete</button></td>
                @endforeach
                </tr>
            </tbody>
    
        </table>
    </div>
    </div>

@endsection