@extends('frontend.index_master')

@section('frontend_content')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

   <!-- Owl Carousel CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
   
<style>
    body
    {
        background-color: gray;
    }
</style>
<div class="container mt-5 mb-5">
  <div class="row">

  <div class="col-md-10 m-auto">
      <h3 class="text-center mt-5">Choose Category To View</h3>
    <div class="row mt-5 mb-5">
    @foreach($category as $data)
        <div class="col-md-4 mt-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <h class="card-title text-center d-flex justify-content-center">
                        <a href="{{route('gallery.category.detail',$data->id)}}" class="btn btn-primary text-center" style="font-size:1.4rem;">{{$data->category_name}}</a>
                    </h>
                    <!-- Add any other information you want to display inside the card body -->
                </div>
            </div>
        </div>
    @endforeach
    </div>
  </div>
  </div>
  </div>



@endsection