@extends('frontend.index_master')

@section('frontend_content')
<!-- ==================================== carouse ===================================== -->
@include('frontend.body.carousel')
<!-- =======================================end of the carousel =================================== -->


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>
  body 
  {
    background-color: #FAFAFA;
  }
</style>
<div class="container mt-5 mb-5">
  <div class="row mb-4">
    <div class="col-md-6 ">
      <h3 class="text-danger">Connect Yourself With Expert Technician</h3>
      <p>
      Welcome to [Customer-Technician ], your one-stop solution for home repair and maintenance. We've created a user-friendly web application to connect you with qualified technicians for all your needs. Say goodbye to phone calls and emails – with us, booking appointments is easy and efficient. Our platform prioritizes transparent communication and efficient job management for both customers and technicians. Plus, we're constantly optimizing our platform to ensure smooth performance, even during peak times. Experience hassle-free home services with [Platform Name] today!
      </p>
      <a href="{{url('about-us')}}" class="btn btn-primary">Read More</a>
    </div>

    <div class="col-md-6">
      <img src="{{asset('assets/images/slider/sn1.jpg')}}" width="400" height="300" alt="">
    </div>
  </div>


<div class="row">
<div class="col-md-12">
   <!-- Your HTML structure with Owl Carousel -->
   <h5 class="text-danger">Featured Products</h5>
<!-- <div class="owl-carousel"> -->
</div>
@php
    $feature = App\Models\Services::where('featured',1)->latest()->get();
@endphp
@foreach($feature as $item)
    <div class="col-md-4">
        <div class="card" style="width: 300px;">
            <img src="{{asset('storage/'.$item->cover_image)}}" style="width:300px;height:200px;" alt="img">
            <h3 class="text-center text-danger">{{$item->service_name}}</h3>
            <p>{!! substr(strip_tags($item->description), 0, 200) !!}{{ strlen(strip_tags($item->description)) > 200 ? '...' : '' }}</p>

            <a href="{{route('services.detail',$item->id)}}">See Details</a>
        </div>
    </div>
@endforeach
    <!-- Add more items as needed -->
<!-- Owl Carousel CSS -->
</div>
<!-- </div> -->
   <div class="row mt-5">

   <div class="col-md-12 mt-5">
    <h1 class="text-danger text-center mt-5" style="font-family:sans-serif;font-weight:bold;">
        Our Services
    </h1>

    <h3 class="text-center mt-3 mb-5" style="font-weight:bold; font-size:3rem;font-family:sans-serif;">
      We Provide a Wide range of <br> creative Services
    </h3>
   </div>

<!-- Add this section for the card -->
<div class="col-md-4 mb-2">
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-2">
          <!-- Font Awesome wrench icon -->
       <i style="color: red;" class="fas fa-wrench fa-3x"></i>
      </div>
      <div class="col-9">
        <h5 class="card-title">Civil Engineer</h5>
        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum nemo iure dicta adipisci quas, nostrum tenetur ad laboriosam quasi alias accusantium necessitatibusm .</p>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End of the card section -->

  <!-- Add this section for the card -->
  <div class="col-md-4 mb-2">
<div class="card">
  <div class="card-body">
    <div class="row ">
      <div class="col-2">
         <!-- Font Awesome architect's compass icon -->
<i style="color:red;" class="fas fa-compass fa-3x"></i>
      </div>
      <div class="col-9">
        <h5 class="card-title">Architect</h5>
        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum nemo iure dicta adipisci quas, nostrum tenetur ad laboriosam quasi alias accusantium necessitatibusm .</p>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End of the card section -->


  <!-- Add this section for the card -->
  <div class="col-md-4 mb-2">
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-2">
           <!-- Font Awesome bolt icon -->
        <i style="color:red;" class="fas fa-bolt fa-3x"></i>
      </div>
      <div class="col-9">
        <h5 class="card-title">Electrician</h5>
        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum nemo iure dicta adipisci quas, nostrum tenetur ad laboriosam quasi alias accusantium necessitatibusm .</p>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End of the card section -->



    <!-- Add this section for the card -->
    <div class="col-md-4 mb-2">
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-2">
          <!-- Font Awesome wrench icon -->
       <i style="color: red;" class="fas fa-faucet fa-3x"></i>
      </div>
      <div class="col-9">
        <h5 class="card-title">Plumbers</h5>
        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum nemo iure dicta adipisci quas, nostrum tenetur ad laboriosam quasi alias accusantium necessitatibusm .</p>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End of the card section -->

  <!-- Add this section for the card -->
  <div class="col-md-4 mb-2">
<div class="card">
  <div class="card-body">
    <div class="row ">
      <div class="col-2">
         <!-- Font Awesome architect's compass icon -->
<i style="color:red;" class="fas fa-paint-roller fa-3x"></i>
      </div>
      <div class="col-9">
        <h5 class="card-title">Painters</h5>
        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum nemo iure dicta adipisci quas, nostrum tenetur ad laboriosam quasi alias accusantium necessitatibusm .</p>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End of the card section -->


  <!-- Add this section for the card -->
  <div class="col-md-4 mb-2">
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-2">
           <!-- Font Awesome bolt icon -->
        <i style="color:red;" class="fas fa-bolt fa-3x"></i>
      </div>
      <div class="col-9">
        <h5 class="card-title">Shuttering</h5>
        <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cum nemo iure dicta adipisci quas, nostrum tenetur ad laboriosam quasi alias accusantium necessitatibusm .</p>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End of the card section -->

</div>







<div class="row mt-4">
<div class="col-md-12">
  <h5 class="text-danger">We are creative & expert people</h5>
  <h2>We work with Passion & provide <br>solutions to client with their problems</h2>
</div>

<div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h2 class="counter" data-target="80">0<span>+</span></h2>
                <p class="card-text"><strong>Project Done</strong></p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h2 class="counter" data-target="80">0</h2>
                <p class="card-text"><strong>Services</strong></p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h2 class="counter" data-target="80">0</h2>
                <p class="card-text"><strong>Available County</strong></p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-center">
            <div class="card-body">
                <h2 class="counter" data-target="80">0</h2>
                <p class="card-text"><strong>Locations</strong></p>
            </div>
        </div>
    </div>

    <script>
      function startCounter() {
        $('.counter').each(function() {
            var $this = $(this);
            var target = parseInt($this.attr('data-target'));

            $({ count: 0 }).animate(
                {
                    count: target
                },
                {
                    duration: 3000, // Adjust the duration as needed
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.count));
                    },
                    complete: function() {
                        $this.text(target);
                    }
                }
            );
        });
    }

    // Start the counter when the document is ready
    $(document).ready(function() {
        startCounter();
    });

    </script>

    <div class="col-md-12">
      <h3 class="text-center text-danger mt-5">Happy Clients</h3>

      </div>

      <div class="col-md-4 mb-4 mt-5">
      <div class="card">
       
        <div class="card-body">
          <p class="card-title"><strong>Sublime Service</strong></p>
          <div class="row">
            <div class="col-md-6">
              <img src="{{asset('common/avator.jpg')}}" width="100px" height="100px" style="border-radius: 50%;" alt="img">
            </div>
            <div class="col-md-6">
              Sana Anjum
            </div>
          </div>
        </div>

        
      </div>

      
    </div>


    <div class="col-md-4 mb-4 mt-5">
      <div class="card">
       
        <div class="card-body">
          <p class="card-title"><strong>Direct Appointment, Quick Service</strong></p>
          <div class="row">
            <div class="col-md-6">
              <img src="{{asset('common/female_avator.jpg')}}" width="100px" height="100px" style="border-radius: 50%;" alt="img">
            </div>
            <div class="col-md-6">
              Angeela Bab
            </div>
          </div>
        </div>

        
      </div>

      
    </div>

    <div class="col-md-4 mb-4 mt-5">
      <div class="card">
       
        <div class="card-body">
          <p class="card-title"><strong>Say Good Bye to Phone Calls</strong></p>
          <div class="row">
            <div class="col-md-6">
              <img src="{{asset('common/male_avator.jpg')}}" width="100px" height="100" style="border-radius: 50%;" alt="img">
            </div>
            <div class="col-md-6">
              Hassan Rajput
            </div>
          </div>
        </div>

        
      </div>

      
    </div>






    






</div>
</div>
@endsection