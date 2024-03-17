@extends('layouts.app')

@section('content')
<div class="container show-edit">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Car view</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cars.update', $car->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{$car->name}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
                            <div class="col-md-6">
                                <textarea id="description"  max="500" class="form-control" name="description" >{{$car->description}}</textarea>

                                
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end">Year</label>

                            <div class="col-md-6">
                                <input id="year" type="number" min="0" class="form-control" name="year" value="{{$car->year}}"  >
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label for="daily_price" class="col-md-4 col-form-label text-md-end">Daily price</label>

                            <div class="col-md-6">
                                <input id="daily_price" type="number" step="0.01" min="0" class="form-control @error('daily_price') is-invalid @enderror" name="daily_price" value="{{$car->daily_price}}" required autocomplete="daily_price">

                                @error('daily_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" step="0.01" min="0" class="form-control" @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row m-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" value="">
                                    Update vehicle data
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
