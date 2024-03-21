@extends('layouts.app')

    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->

@section('content')
<div class="container-fluid">
  <div class="row" id="img-row">
    <!-- Obraz -->
    <div class="col-lg-12 p-0 mt-0 table-overlay">
      <img class="image" src="https://mir-s3-cdn-cf.behance.net/project_modules/max_3840/19ac7271194397.5bbd04e32021f.jpg" alt="Full Width Image">
      <form action="{{ route('bookingConfirmed.store') }}" method="POST">
        <div class="container car-container">
            <div class="row">
                @foreach($cars as $car)
                <div class="col-md-6 mb-2">
                    <div class="card">
                    @if(!is_null($car->image_path))
                    
                        <img src="{{asset('storage/' . $car->image_path)}}" class="card-img-top" alt="{{$car->name}}">

                    @endif
                        <div class="card-body">
                        <h5 class="card-title">{{$car->name}}</h5>
                        <p class="card-text">{{$car->description}}</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" >Production year: {{$car->year}}</li>
                            <li class="list-group-item">Price for a day: {{$car->daily_price}} USD</li>
                            <li class="list-group-item">Pick up location: {{$request->getLocation()}}</li>
                            <li class="list-group-item">Dates selected: {{$request->datesDisplay()}}</li>
                            <li class="list-group-item">Total price: {{
                              $request->calculateTotalValue($car)}} USD</li>
                            <input type="hidden" name="car_id" value="{{$car->id}}">
                            <input type="hidden" name="total_price" value="{{$request->calculateTotalValue($car)}}">
                            <input type="hidden" name="location" value="{{$request->getLocation()}}">
                            <input type="hidden" name="pick_up_date" value="{{$request->getPick_up_date()}}">
                            <input type="hidden" name="return_date" value="{{$request->getReturn_date()}}">
                        </ul>
                        
                        @guest
                        You need to <a href="{{ route('login') }}">{{ __('Login') }}</a> to continue</br>
                        @endguest

                        <button type="submit" class="btn btn-primary" @guest disabled @endguest> Book now!</button>
                        </div>
                    </div>
                </div>
                @endforeach
               {{$cars->links()}}
            </div>
        </div>
      </form>
  </div>
</div>
    </div>
    </div>
  </div>
</div>

@endsection
