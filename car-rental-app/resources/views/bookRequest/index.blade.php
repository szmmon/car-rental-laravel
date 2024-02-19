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
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Samochód 1">
                        <div class="card-body">
                        <h5 class="card-title">Samochód 1</h5>
                        <p class="card-text">Opis samochodu. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Marka: Toyota</li>
                            <li class="list-group-item">Model: Corolla</li>
                            <li class="list-group-item">Rok produkcji: 2022</li>
                            <li class="list-group-item">Kolor: Czarny</li>
                            <li class="list-group-item">Cena za dzień: $50</li>
                        </ul>
                        <a href="#" class="btn btn-primary mt-3">Wynajmij teraz</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Samochód 2">
                        <div class="card-body">
                            <h5 class="card-title">Samochód 2</h5>
                            <p class="card-text">Opis samochodu. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Marka: BMW</li>
                                <li class="list-group-item">Model: X5</li>
                                <li class="list-group-item">Rok produkcji: 2023</li>
                                <li class="list-group-item">Kolor: Biały</li>
                                <li class="list-group-item">Cena za dzień: $80</li>
                            </ul>
                            <a href="#" class="btn btn-primary mt-3">Wynajmij teraz</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Dodaj więcej kart tutaj -->
  </div>
</div>
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
