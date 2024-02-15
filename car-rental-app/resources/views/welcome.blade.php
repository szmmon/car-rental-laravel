@extends('layouts.app')

    <!-- <link href="{{asset('css/welcome.css')}}" rel="stylesheet"> -->
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->

@section('content')
<div class="container-fluid">
  <div class="row" id="img-row">
    <!-- Obraz -->
    <div class="col-lg-12 p-0 mt-0">
      <img class="image" src="https://mir-s3-cdn-cf.behance.net/project_modules/max_3840/19ac7271194397.5bbd04e32021f.jpg" alt="Full Width Image">
    </div>
  </div>
</div>

<!-- Page Content -->
<div class="container py-5" id="picker">
    <div class="row">
        <div class="col-12">col-12</div>
    </div>
    <div class="row">
        <div class="col-6 right">col-8</div>
        <div class="col-6">col-4</div>
    </div>
    <div class="row">
        <div class="col-6 right">col-8</div>
        <div class="col-6">col-4</div>
    </div>
</div>
<section class="py-5">
  <div class="container">
    <h1 class="font-weight-light">Image Slider Two</h1>
    <p class="lead">Here you can write anything about the website. These are the sample pictures ,replace them and use your own. These pictures are taken from unsplash.</p>
    <p class = "lead">Bacon ipsum dolor amet drumstick short loin ribeye sirloin ham spare ribs landjaeger, pig turducken meatball sausage. Salami cow shoulder pork loin. Meatloaf turducken andouille chuck beef ribs picanha. Filet mignon pastrami fatback ribeye leberkas shank boudin sirloin beef short ribs tail pig pork loin shoulder buffalo. Short ribs andouille swine chicken leberkas. Fatback sirloin pork belly turkey landjaeger corned beef biltong, buffalo bresaola strip steak brisket short loin salami.</p>
  </div>
</section>



@endsection
