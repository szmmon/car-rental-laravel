@extends('layouts.app')

    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->

@section('content')
<div class="container-fluid">
  <div class="row" id="img-row">
    <!-- Obraz -->
    <div class="col-lg-12 p-0 mt-0 table-overlay">
      <img class="image" src="https://mir-s3-cdn-cf.behance.net/project_modules/max_3840/19ac7271194397.5bbd04e32021f.jpg" alt="Full Width Image">
        <div class="container car-container">
        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a vehicle</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                            <div class="col-md-6">
                                <textarea id="description"  max="500" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end">Year</label>

                            <div class="col-md-6">
                                <input id="year" type="number" min="0" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}"  autocomplete="year" autofocus>

                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label for="daily-price" class="col-md-4 col-form-label text-md-end">Daily price</label>

                            <div class="col-md-6">
                                <input id="daily-price" type="number" step="0.01" min="0" class="form-control @error('daily-price') is-invalid @enderror" name="daily-price" value="{{ old('daily-price') }}" required autocomplete="daily-price">

                                @error('daily-price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" step="0.01" min="0" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  autocomplete="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        </div>
                            
                        <div class="row m-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" value="submit">
                                    Add vehicle
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        

    </div>
  </div>
</div>
@endsection
