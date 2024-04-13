@extends('frontend.index_master')

@section('frontend_content')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

   <!-- Owl Carousel CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
   

    <div class="container mt-5">
        <div class="row">
           

            <div class="col-md-8">
            <img src="{{asset('storage/'.$data1->cover_image)}}" width="700" height="400px" alt="">
            <h5 class="text-danger">{{$data1['category']['category_name']}}</h5>
            <p>{!!$data1->description!!}</p>
            </div>



            <div class="col-md-4">
                <div class="card">
                    <h3 class="text-center">
                        All Categories
                    </h3>


                    <ul>
                        @foreach($cat_data as $data)
                        <li><a href="">{{$data->category_name}}</a></li>
                        @endforeach
                    </ul>


                    <h3 class="text-center">
                        Details
                    </h3>

                    <ul>
                        <li>Province: <span>{{$data1['province']['province_name']}}</span></li>
                        <li>City: <span>{{$data1['city']['city_name']}}</span></li>
                        <li>phone: <span>{{$data1->shop_provider_phone}}</span></li>
                    </ul>

                  
                    
                </div>
            </div>
        </div>
    </div>


    @endsection