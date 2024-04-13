@extends('frontend.index_master')

@section('frontend_content')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

   <!-- Owl Carousel CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

        <!-- Include Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- Include Lightbox CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
   
<style>
    body
    {
        background-color: gray;
    }
</style>
<div class="container mt-5 mb-5">
  <div class="row">

  <div class="col-md-10 m-auto">
      <h1 class="text-center mt-5"> Gallery</h1>
      <div class="row mt-5 mb-5">
    @if(count($gallery) > 0)

    @foreach($gallery as $data)
        <div class="col-md-4 mt-3 mb-3">
            <div class="card">
                <div class="card-body">
                <a href="{{ asset( 'storage/' . $data->gallery)}}" data-lightbox="image">
                    <img src="{{ asset( 'storage/' . $data->gallery)}}" alt="" width="250" height="250">
                </a>
                 
                </div>
            </div>
        </div>
    @endforeach
    @else
    <div class="col-12 text-center">
        <p>Oops! No Gallery Found.</p>
    </div>
@endif
    </div>
  </div>
  </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

@endsection