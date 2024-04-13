<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    @include('frontend.body.headercss')
    
  </head>
  <body style="background-color: white;">
      @include('frontend.body.header')
      @include('frontend.body.navbar')

      <div class="container mt-5 mb-5">
        <div class="row">
     
          <div class="col-md-10 m-auto p-3" > 
          <div class="card">
          <h1 class="text-center mt-5 text-dark" style="text-decoration:underline;text-decoration-color:red;">
            Customer Registeration
          </h1>

          @if(session('error'))
    {       {session('error')}}
          @endif
          <form method="POST" action="{{ route('register') }}" class="p-4">
        @csrf

            <div class="form-group row">
                <div class="col-md-6 mt-2">
                    <label for="">FullName</label>
                    <input type="text" name="name" id="" class="form-control">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" style="color:red;" />
                </div>

                <div class="col-md-6 mt-2">
                    <label for="">Email</label>
                    <input type="email" name="email" id="" class="form-control">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" style="color:red;" />
                </div>

                <div class="col-md-6 mt-2">
                    <label for="">Username</label>
                    <input type="text" name="username" id="" class="form-control">
                    <x-input-error :messages="$errors->get('username')" class="mt-2" style="color:red;" />
                </div>

                <div class="col-md-6 mt-2">
                    <label for="">Phone</label>
                    <input type="text" name="phone" id="" class="form-control">
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" style="color:red;" />
                </div>

                @php 

                $city = App\Models\city::all();
                $province = App\Models\province::all();
                @endphp
                <div class="col-md-6 mt-2">
              <label for="province">Province</label>
              <select name="province" id="province" class="form-control">
                  @foreach($province as $province)
                      <option value="{{ $province->id }}">{{ $province->province_name }}</option>
                  @endforeach
              </select>
          </div>

          <div class="col-md-6 mt-2">
              <label for="city">City</label>
              <select name="city" id="city" class="form-control">
                  <option value="" class="text-center" >-----------Select City--------</option>
                  @foreach($city as $city)
                      <option value="{{ $city->id }}" data-province="{{ $city->province_id }}">{{ $city->city_name }}</option>
                  @endforeach
              </select>
          </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Initial population of cities based on the selected province
        updateCities();

        // Event listener for changes in the selected province
        $('#province').change(function() {
            updateCities();
        });

        // Function to update the city options based on the selected province
        function updateCities() {
            var selectedProvince = $('#province').val();

            // Hide all cities
            $('#city option').hide();

            // Show only cities related to the selected province
            $('#city option[data-province="' + selectedProvince + '"]').show();

            // Set the first visible city as selected
            $('#city').val($('#city option:visible:first').val());
        }
    });
</script>

                

                <div class="col-md-6 mt-2">
                    <label for="">Password</label>
                    <input type="text" name="password" id="" class="form-control">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" style="color:red;" />
                </div>

                <div class="col-md-6 mt-2">
                    <label for="">Confirm Password</label>
                    <input type="text" name="password_confirmation" id="" class="form-control">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="color:red;" />
                </div>

                <div class="col-md-12 mt-2">
                    <input type="submit" value="Register" id="" class="form-control btn btn-success">
                </div>

            </div>

          <span style="color:black;">Already Have an Account</span>
          <a href="{{route('login')}}">Sing In Now</a>
          </form>

          </div>
          </div>
        </div>
      </div>


      <div style="background-color: #333333; width:100vw;">
    @include('frontend.body.footer2')
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>