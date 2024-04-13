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
<div class="container mt-5">
  <div class="row">


   <div class="col-md-12 mt-5 mb-5">
    <h1 class="text-danger text-center">
      <!-- <i class="fas fa-shoe-prints    "></i> -->
    </h1>
   </div>

  <div class="col-md-12 mt-4 mb-4" style="border:2px solid gray; ">
  <h3 class="text-dark text-center mt-4">Search any Shops</h3>
    <form action="{{route('shops.search')}}" method="get" class="mt-5 mb-5">
        <div class="form-group row">
          <div class="col-md-3">
       
           
          <select name="category_id"  class="form-control" required>
            @foreach($category as $data3)
                <option value="{{$data3->id}}" >
                    {{$data3->category_name}}
                </option>
            @endforeach
        </select>
          </div>


          <div class="col-md-3">
   
    <select name="province_id" id="province_id" class="form-control">
        @foreach($province as $data4)
            <option value="{{$data4->id}}">{{$data4->province_name}}</option>
        @endforeach
    </select>
</div>

<div class="col-md-3">
   
    <select name="city_id" id="city_id" class="form-control">
        <!-- City options will be dynamically filtered using JavaScript -->
        <option value="" class="text-center">------------Select Cities------------</option>
        @foreach($city as $data5)
            <option value="{{$data5->id}}" data-province="{{$data5->province_id}}">{{$data5->city_name}}</option>
        @endforeach
    </select>
</div>

<script>
    document.getElementById('province_id').addEventListener('change', function () {
        var selectedProvinceId = this.value;

        // Get all city options
        var cityOptions = document.getElementById('city_id').options;

        // Loop through all city options
        for (var i = 0; i < cityOptions.length; i++) {
            var option = cityOptions[i];

            // If the city's data-province matches the selected province, show it; otherwise, hide it
            if (option.getAttribute('data-province') == selectedProvinceId || option.getAttribute('data-province') == '') {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        }
    });
</script>


    

    <div class="col-md-3">
        <input type="submit" value="Search" class="Search" class="form-control" style="background-color: #7ACE17;color:white;font-weight:bold;padding:5px;">
    </div>


        </div>
    </form>
  </div>


    @if(session('data'))

    @if(session()->has('data') && count(session('data')) > 0)
    @foreach(session('data') as $item)
        <div class="col-md-4">
            <div class="card" style="width: 300px;">
                <img src="{{asset('storage/'.$item->cover_image)}}" style="width:300px;height:200px;" alt="img">
                <h3 class="text-center text-danger">{{$item->shop_name}}</h3>
                <p>{!! substr(strip_tags($item->description), 0, 200) !!}{{ strlen(strip_tags($item->description)) > 200 ? '...' : '' }}</p>
                <a href="{{route('shops.detail',$item->id)}}">See Details</a>
            </div>
        </div>
    @endforeach
@else
    <p>Data not found.</p>
@endif


    @else 

   <!-- ==============================================civil engineering category====================================== -->
   <div class="col-md-12">
   <!-- Your HTML structure with Owl Carousel -->
   <h5 class="text-danger">Civil Engineering</h5>
<div class="owl-carousel">
@php
    $civil = $data->filter(function ($item) {
        return $item->category_id == 1;
    });
@endphp
@foreach($civil as $civil)
    <div class="col-md-4">
        <div class="card" style="width: 300px;">
            <img src="{{asset('storage/'.$civil->cover_image)}}" style="width:300px;height:200px;" alt="img">
            <h3 class="text-center text-danger">{{$civil->shop_name}}</h3>
            <p>{!! substr(strip_tags($civil->description), 0, 200) !!}{{ strlen(strip_tags($civil->description)) > 200 ? '...' : '' }}</p>

            <a href="{{route('shops.detail',$civil->id)}}">See Details</a>
        </div>
    </div>
@endforeach
    <!-- Add more items as needed -->

</div>
</div>
   <!-- ============================================== end of civil engineering category====================================== -->


   <!-- ==============================================Painting category====================================== -->

<div class="col-md-12 mt-5">
   <!-- Your HTML structure with Owl Carousel -->
   <h5 class="text-danger">Painting</h5>
   @php
    $paint = $data->filter(function ($item) {
        return $item->category_id == 3;
    });
@endphp
<div class="owl-carousel">
    @foreach($paint as $paint)
    <div class="col-md-4">
        <div class="card" style="width: 300px;">
            <img src="{{asset('storage/'. $paint->cover_image)}}" style="width:300px;height:200px;" alt="img">
            <h3 class="text-center text-danger">{{$paint->shop_name}}</h3>
            <p>{!! substr(strip_tags($paint->description), 0, 200) !!}{{ strlen(strip_tags($paint->description)) > 200 ? '...' : '' }}</p>
            <!-- <a href="">See Details</a> -->
            <a href="{{route('shops.detail.paint',$paint->id)}}">See Details</a>


        </div>
    </div>
@endforeach
    <!-- Add more items as needed -->

</div>
</div>

   <!-- ==============================================End of Paint category====================================== -->


   <!-- ==============================================Pumbering category====================================== -->
   <div class="col-md-12 mt-5">
   <!-- Your HTML structure with Owl Carousel -->
   <h5 class="text-danger">PLUMBERING</h5>
   @php
    $plumbering = $data->filter(function ($item) {
        return $item->category_id == 5;
    });
@endphp
<div class="owl-carousel">
@if($plumbering->count() > 0)
    @foreach($plumbering as $plumbering)
    <div class="col-md-4">
        <div class="card" style="width: 300px;">
            <img src="{{asset('storage/'. $plumbering->cover_image)}}" style="width:300px;height:200px;" alt="img">
            <h3 class="text-center text-danger">{{$plumbering->shop_name}}</h3>
            <p>{!! substr(strip_tags($plumbering->description), 0, 200) !!}{{ strlen(strip_tags($plumbering->description)) > 200 ? '...' : '' }}</p>
            <!-- <a href="">See Details</a> -->
            <a href="{{route('shops.detail.plumber',$plumbering->id)}}">See Details</a>


        </div>
    </div>
@endforeach
@else
    <div class="col-md-12">
        <p>No data available</p>
    </div>
@endif
    <!-- Add more items as needed -->

</div>
</div>

   <!-- ==============================================END OF PLUMBERING category====================================== -->


      <!-- ==============================================Architect category====================================== -->

      <div class="col-md-12 mt-5">
   <!-- Your HTML structure with Owl Carousel -->
   <h5 class="text-danger">Architect</h5>
   @php
    $architect = $data->filter(function ($item) {
        return $item->category_id == 2;
    });
@endphp
<div class="owl-carousel">
@if($architect->count() > 0)
    @foreach($architect as $architect)
    <div class="col-md-4">
        <div class="card" style="width: 300px;">
            <img src="{{asset('storage/'. $architect->cover_image)}}" style="width:300px;height:200px;" alt="img">
            <h3 class="text-center text-danger">{{$architect->shop_name}}</h3>
            <p>{!! substr(strip_tags($architect->description), 0, 200) !!}{{ strlen(strip_tags($architect->description)) > 200 ? '...' : '' }}</p>
            <!-- <a href="">See Details</a> -->
            <a href="{{route('shops.detail.architect',$architect->id)}}">See Details</a>


        </div>
    </div>
@endforeach
@else
    <div class="col-md-12">
        <p>No data available</p>
    </div>
@endif
    <!-- Add more items as needed -->

</div>
</div>

   <!-- ==============================================END OF Architect category====================================== -->


         <!-- ==============================================Electrician category====================================== -->

         <div class="col-md-12 mt-5">
   <!-- Your HTML structure with Owl Carousel -->
   <h5 class="text-danger">Electrician</h5>
   @php
    $electrician = $data->filter(function ($item) {
        return $item->category_id == 4;
    });
@endphp
<div class="owl-carousel">
@if($electrician->count() > 0)
    @foreach($electrician as $electrician)
    <div class="col-md-4">
        <div class="card" style="width: 300px;">
            <img src="{{asset('storage/'. $electrician->cover_image)}}" style="width:300px;height:200px;" alt="img">
            <h3 class="text-center text-danger">{{$electrician->shop_name}}</h3>
            <p>{!! substr(strip_tags($electrician->description), 0, 200) !!}{{ strlen(strip_tags($electrician->description)) > 200 ? '...' : '' }}</p>
            <!-- <a href="">See Details</a> -->
            <a href="{{route('shops.detail.electrician',$electrician->id)}}">See Details</a>


        </div>
    </div>
@endforeach
@else
    <div class="col-md-12">
        <p>No data available</p>
    </div>
@endif
    <!-- Add more items as needed -->

</div>
</div>

   <!-- ==============================================END OF Electrician category====================================== -->


         <!-- ==============================================Shuttering category====================================== -->

         <div class="col-md-12 mt-5">
   <!-- Your HTML structure with Owl Carousel -->
   <h5 class="text-danger">Shuttering</h5>
   @php
    $shuttering = $data->filter(function ($item) {
        return $item->category_id == 6;
    });
@endphp
<div class="owl-carousel">
@if($shuttering->count() > 0)
    @foreach($shuttering as $shuttering)
    <div class="col-md-4">
        <div class="card" style="width: 300px;">
            <img src="{{asset('storage/'. $shuttering->cover_image)}}" style="width:300px;height:200px;" alt="img">
            <h3 class="text-center text-danger">{{$shuttering->shop_name}}</h3>
            <p>{!! substr(strip_tags($shuttering->description), 0, 200) !!}{{ strlen(strip_tags($shuttering->description)) > 200 ? '...' : '' }}</p>
            <!-- <a href="">See Details</a> -->
            <a href="{{route('shops.detail.shuttering',$shuttering->id)}}">See Details</a>


        </div>
    </div>
@endforeach
@else
    <div class="col-md-12">
        <p>No data available</p>
    </div>
@endif
    <!-- Add more items as needed -->

</div>
</div>

   <!-- ==============================================END OF Shuttering category====================================== -->


   @endif
  </div>
  </div>

<!-- Owl Carousel Initialization -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 10,
            // nav: true,
            responsive:{
                0:{
                    items: 1
                },
                600:{
                    items: 2
                },
                1000:{
                    items: 3
                }
            },
            autoplay: true, // Enable autoplay
            autoplayTimeout: 9000, // Set autoplay timeout in milliseconds (e.g., 5000ms = 5 seconds)
           
        });
    });
</script>



@endsection