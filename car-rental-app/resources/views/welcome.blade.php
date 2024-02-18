@extends('layouts.app')

    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->

@section('content')
<div class="container-fluid">
  <div class="row" id="img-row">
    <!-- Obraz -->
    <div class="col-lg-12 p-0 mt-0 table-overlay">
      <img class="image" src="https://mir-s3-cdn-cf.behance.net/project_modules/max_3840/19ac7271194397.5bbd04e32021f.jpg" alt="Full Width Image">
        <table class="table picker" id="picker-mobile">
            <form action="" method="POST">
                
                <thead>
                    <tr>
                    <th colspan="3">
                        <div class="row mx-3">
                                <label for="location" class="col-sm-12 col-form-label text-sm-end">
                                    <div class="d-flex justify-content-center">
                                    Location</div>
                                </label>

                                <div class="col-sm-12">
                                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value=""  autocomplete="location" autofocus>
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>                
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                        <div class="row">
                                <label for="pick-up-date" class="col-sm-12 col-form-label text-sm-end"><div class="d-flex justify-content-center">
                                    Pick up date</div></label>

                                <div class="col-sm-12">
                                    <input id="pick-up-date" type="text" class="form-control @error('pick-up-date') is-invalid @enderror" name="pick-up-date" value=""  autocomplete="pick-up-date" autofocus>
                                    @error('pick-up-date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>     
                        </td>
                        <td>
                        <div class="row ">
                                <label for="pick-up-time" class="col-sm-12 col-form-label text-sm-end"><div class="d-flex justify-content-center">
                                    Pick up time</div></label>

                                <div class="col-sm-12">
                                    <input id="pick-up-time" type="text" class="form-control @error('pick-up-time') is-invalid @enderror" name="pick-up-time" value=""  autocomplete="pick-up-time" autofocus>
                                    @error('pick-up-time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>     
                        </td>
                    </tr>            
                        <td>
                        <div class="row">
                                <label for="return-date" class="col-sm-12 col-form-label text-sm-end"><div class="d-flex justify-content-center">
                                    Return date</div></label>

                                <div class="col-sm-12">
                                    <input id="return-date" type="text" class="form-control @error('return-date') is-invalid @enderror" name="return-date" value=""  autocomplete="return-date" autofocus>
                                    @error('return-date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>     
                        </td>
                        <td>
                        <div class="row mb-3">
                                <label for="return-time" class="col-sm-12 col-form-label text-sm-end"><div class="d-flex justify-content-center">
                                    Return time</div></label>

                                <div class="col-sm-12">
                                    <input id="return-time" type="text" class="form-control @error('return-time') is-invalid @enderror" name="return-time" value=""  autocomplete="return-time" autofocus>
                                    @error('return-time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>     
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary search-btn">Search</button>
                        </div>
                            
                        </td>
                    </tr>
                </tbody>
            </form>
            </table>
    </div>
    </div>
  </div>
</div>

<!-- Page Content -->

<section class="py-5">
  <div class="container">
    <h1 class="font-weight-light">Image Slider Two</h1>
    <p class="lead">Here you can write anything about the website. These are the sample pictures ,replace them and use your own. These pictures are taken from unsplash.</p>
    <p class = "lead">Bacon ipsum dolor amet drumstick short loin ribeye sirloin ham spare ribs landjaeger, pig turducken meatball sausage. Salami cow shoulder pork loin. Meatloaf turducken andouille chuck beef ribs picanha. Filet mignon pastrami fatback ribeye leberkas shank boudin sirloin beef short ribs tail pig pork loin shoulder buffalo. Short ribs andouille swine chicken leberkas. Fatback sirloin pork belly turkey landjaeger corned beef biltong, buffalo bresaola strip steak brisket short loin salami.</p>
  </div>
</section>



@endsection
