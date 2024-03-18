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
            <form action="{{ route('bookRequest.store') }}" method="POST">
                
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
                        <td colspan="2">
                        <div class="row">
                                <label for="pick_up_date" class="col-sm-12 col-form-label text-sm-end"><div class="d-flex justify-content-center">
                                    Pick up date</div></label>
                                <div class="col-sm-12">
                                    <input id="pick_up_date" type="datetime-local" class="form-control @error('pick_up_date') is-invalid @enderror" name="pick_up_date" autofocus>
                                    @error('pick-up-date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>     
                        </td>
                    </tr>            
                        <td colspan="2">
                         <div class="row">
                                <label for="return_date" class="col-sm-12 col-form-label text-sm-end"><div class="d-flex justify-content-center">
                                    Return date</div></label>
                                <div class="col-sm-12">
                                    <input id="return_date" type="datetime-local" class="datetimepicker form-control @error('return_date') is-invalid @enderror" name="return_date" value=""  autocomplete="return_date" autofocus>
                                    @error('return_date')
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


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    config = {
        enableTime: true,
        dateFormat: 'Y-m-d H:i',
    }
    flatpickr("input[type=datetime-local]", config);
</script>
@endpush

@endsection
