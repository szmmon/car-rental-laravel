@extends('layouts.app')

    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->

@section('content')
<div class="container-fluid">
  <div class="row" id="img-row">
    <div class="col-lg-12 p-0 mt-0 table-overlay">
      <img class="image" src="https://mir-s3-cdn-cf.behance.net/project_modules/max_3840/19ac7271194397.5bbd04e32021f.jpg" alt="Full Width Image">

<div class="container" id="cars-table">
    <div class="row" id="cars-add-row">   
    @include('helpers.flashmessages')
        <div class="col-10"><h2>Cars list</h2></div>
        <div class="col-2 float-right">
            <a href="{{route('cars.create')}}" class='float-right'>
                <button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
            </a>
        </div>
    </div>  
    <div class="row">
        <table class="table table-hover table-transparent">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Year</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            @forelse($cars as $car)
            <tbody>
                <tr>
                <th scope="row">{{$car->id}}</th>
                <td>{{$car->name}}</td>
                <td>{{$car->description}}</td>
                <td>{{$car->year}}</td>
                <td>{{$car->daily_price}}</td>
                <td><a href="{{route('cars.show', $car->id)}}"><button class="btn btn-success sm"><i class="fa-solid fa-magnifying-glass"></i></button></a>
                <a href="{{route('cars.edit', $car->id)}}"><button class="btn btn-info sm"><i class="fa-regular fa-pen-to-square"></i></button></a>
                <button class="btn btn-danger sm record-delete" data-id="{{$car->id}}"><i class="fa-regular fa-trash-can"></i></button></td>
                @csrf
                @empty
                <th scope="row">No cars added</th>
                @endforelse

                </tr>
            </tbody>
    
        </table>
    </div>
    </div>
    </div>
  </div>
</div>

@endsection