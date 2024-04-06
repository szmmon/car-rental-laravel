@extends('layouts.app')

    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->

@section('content')
<div class="container-fluid">
  <div class="row" id="img-row">
    <div class="col-lg-12 p-0 mt-0 table-overlay">
      <img class="image" src="https://mir-s3-cdn-cf.behance.net/project_modules/max_3840/19ac7271194397.5bbd04e32021f.jpg" alt="Full Width Image">
      <div class="container car-container" id="orders-table">
      <div class="col-12">@include('helpers.flashmessages')
      <h2>Hi, {{ Auth::user()->name }}, your bookings:</h2>
      </div>
                   
            <table class="table table-hover mt-5 table-transparent" >
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Car</th>
                    <th scope="col">Description</th>
                    <th scope="col">Year</th>
                    <th scope="col">Location</th>
                    <th scope="col">Pick up date</th>
                    <th scope="col">Return date</th>
                    <th scope="col">Total</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                @foreach($booking as $record)
                <tbody>
                  @if ($user_id == $record->user_id)
                      <tr>
                      <th>{{$record->id}}</th>
                      @foreach ($cars as $car)
                          @if ($car->id == $record->car_id)

                          <td>{{$car->name}}</td>
                          <td>{{$car->description}}</td>
                          <td>{{$car->year}}</td>
                          <td>{{$record->location}}</td>
                          <td>{{$record->pick_up_date}}</td>
                          <td>{{$record->return_date}}</td>
                          <td>{{$record->total_price}} USD</td>
                        @endif
                        @endforeach
                        <td>
                        <a href="{{route('bookingConfirmed.edit', $record->id)}}"><button class="btn btn-info sm"><i class="fa-regular fa-pen-to-square"></i></button></a>
                        <button class="btn btn-danger sm record-delete" data-id="{{$record->id}}"><i class="fa-regular fa-trash-can"></i></button>
                        </td>
                    @endif
                      </tr>
                  </tbody>
                @endforeach
        
            </table>
      </div>
  </div>
</div>
    </div>
    </div>
  </div>
</div>

@endsection
