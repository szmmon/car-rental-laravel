@extends('layouts.app')

    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10">Cars list </div>
        <div class="col-2 float-right">
            <a href="{{route('cars.create')}}" class='float-right'>
                <button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
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
        <th scope="col">Amount</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
        <!-- <th scope="col">Actions</th> -->
        </tr>
    </thead>
 
    </table>
    </div>
    </div>

@endsection