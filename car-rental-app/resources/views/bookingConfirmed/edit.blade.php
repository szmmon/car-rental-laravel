@extends('layouts.app')

    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->

@section('content')
<div class="container-fluid">
  <div class="row" id="img-row">
    <!-- Obraz -->
    <div class="col-lg-12 p-0 mt-0 table-overlay">
      <img class="image" src="https://mir-s3-cdn-cf.behance.net/project_modules/max_3840/19ac7271194397.5bbd04e32021f.jpg" alt="Full Width Image">


    <div class="container" id="orders-table">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card table-transparent mt-5">
                <div class="card-header">Order view</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bookingConfirmed.update', $record->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="car_id" class="col-sm-12 col-form-label text-sm-end">
                                <div class="d-flex justify-content-center">
                                            Car with daily price [USD]
                                    </div>
                                </label>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <select class="form-select input-styling" id="daily_price" aria-label="Default select example" name="car_id">
                                        @foreach ($cars as $car)                                            
                                            <option name="car_id" value="{{$car->id}}">{{$car->name}} - {{$car->daily_price}}
                                            </option>     
                                        @endforeach 
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                            
                                <label for="location" class="col-sm-12 col-form-label text-sm-end">
                                <div class="d-flex justify-content-center">
                                            Location
                                    </div>
                                </label>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                <div class="col-sm-3"></div>    
                                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror input-styling" name="location" 
                                    value="{{$record->location}}">
                                    @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pick_up_date" class="col-sm-12 col-form-label text-sm-end">
                                    <div class="d-flex justify-content-center">
                                            Pick up date
                                    </div>
                                </label>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                <div class="col-sm-3"></div>
                                <input id="pick_up_date" type="datetime-local" class="datetimepicker form-control @error('pick_up_date') is-invalid @enderror input-styling" name="pick_up_date"  value="{{$record->pick_up_date}}">
                                    @error('pick_up_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="return_date" class="col-sm-12 col-form-label text-sm-end">
                                    <div class="d-flex justify-content-center">
                                            Return date
                                    </div>
                                </label>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                <div class="col-sm-3"></div>
                                <input id="return_date" type="datetime-local" class="datetimepicker form-control @error('return_date') is-invalid @enderror input-styling" name="return_date" value="{{$record->return_date}}">
                                    @error('return_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="d-flex justify-content-center">
                                Total: 
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <input type="number" id="total_price" class="form-control input-styling total_price" disabled>
                                    <input  hidden type="number" name="total_price" id="total_price" class="form-control input-styling total_price">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary" value="">
                                        Update booking
                                    </button>
                                </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>


@endsection
