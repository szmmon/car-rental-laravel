@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Car view</div>

                <div class="card-body">
                    <form method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control name="name" value="{{$car->name}}"  disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>
                            <div class="col-md-6">
                                <textarea id="description"  max="500" class="form-control name="description" disabled>{{$car->description}}</textarea>

                                
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end">Year</label>

                            <div class="col-md-6">
                                <input id="year" type="number" min="0" class="form-control name="year" value="{{$car->year}}"  disabled>
                            </div>
                        </div>
                        

                        <div class="row mb-3">
                            <label for="daily_price" class="col-md-4 col-form-label text-md-end">Daily price</label>

                            <div class="col-md-6">
                                <input id="price" type="number" step="0.01" min="0" class="form-control name="price" value="{{$car->daily_price}}" disabled>  
                            </div>
                        </div>
                            <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">Image</label>
                            <div class="col-md-6">
                            <div class="row mb-3">
                            @if(!is_null($car->image_path))
                                <img src="{{asset('storage/' . $car->image_path)}}" alt="No product image" class="img-thumbnail mx-auto d-block">
                            @endif

                            </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
