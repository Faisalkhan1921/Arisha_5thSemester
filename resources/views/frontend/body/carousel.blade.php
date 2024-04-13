<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<div class="wrapper col3" > 
  <div id="featured_slide"> 
    <div class="owl-carousel owl-theme">
      <div class="item"><img src="{{ asset('assets/images/slider/hp1.jpg') }}" width="9500" height="500" alt=""></div>
      <div class="item"><img src="{{ asset('assets/images/slider/hp3.jpg') }}" width="9500" height="500" alt=""></div>
      <div class="item"><img src="{{ asset('assets/images/slider/sr1.jpg') }}" width="9500" height="500" alt=""></div>
      <div class="item"><img src="{{ asset('assets/images/slider/s2.jpg') }}" width="9500" height="500" alt=""></div>
      <div class="item"><img src="{{ asset('assets/images/slider/sho2.jpg') }}" width="9500" height="500" alt=""></div>
      <div class="item"><img src="{{ asset('assets/images/slider/sn1.jpg') }}" width="9500" height="500" alt=""></div>
      <div class="item"><img src="{{ asset('assets/images/slider/sn2.jpg') }}" width="9500" height="500" alt=""></div>
      <!-- Add more slides as needed -->
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
  $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
      items: 1, // Number of items to display in the carousel
      loop: true, // Infinite loop
      autoplay: true, // Autoplay the carousel
      autoplayTimeout: 3000, // Autoplay interval in milliseconds (adjust as needed)
      autoplayHoverPause: true // Pause autoplay on hover
    });
  });
</script>
