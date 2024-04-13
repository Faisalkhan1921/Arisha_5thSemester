<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Register</title>

    <!-- Fontfaces CSS-->
    @include('providerpanel.body.css')

</head>

<body class="animsition">
    <div class="page-wrapper ">
        <div class="page-content--bge5">
            <div class="container">
                <div class="mt-4">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                            <img src="{{asset('common/logo.png')}}" width="100" height="40" alt="CoolAdmin">
                            </a>
                            <h3 class="text-center">Registration</h3>
                        </div>
                        <div class="login-form mt-5">
                        @if(Session::has('error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{session::get('error')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                        @endif

                        <form action="{{route('admin.register.create')}}" method="post">
                                @csrf
                               <div class="form-group row">


                               <div class="col-md-4">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                                </div>

                                <div class="col-md-4">
                                   <label for="">Phone</label> 
                                   <input type="number" name="phone" id="" class="form-control">
                                </div>


                                <div class="col-md-4">
                                <label for="">UserName</label>
                                <input type="text" name="username" class="form-control">
                                </div>

                                <div class="col-md-6 mt-2">
                                   <label for="">Organization</label> 
                                   <input type="text" name="organization" id="" class="form-control">
                                </div>

                                <div class="col-md-6 mt-2">
                                   <label for="">Service Provider</label> 
                                   <input type="text" name="sp_type" id="" class="form-control">
                                </div>


                               <!-- resources/views/your_view.blade.php -->

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
            <option value="{{ $city->city_name }}" data-province="{{ $city->province_id }}">{{ $city->city_name }}</option>
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
                                 @if ($errors->has('password'))
                                    <div class="alert alert-danger">
                                        <p>{{ $errors->first('password') }}</p>
                                    </div>
                                @endif
                                </div>

                                <div class="col-md-6 mt-2">
                                <label for="">confirmation_password</label> 
                                 <input type="text" name="confirmation_password" id="" class="form-control">
                                 
                                @if ($errors->has('confirmation_password'))
                                    <div class="alert alert-danger">
                                        <p>{{ $errors->first('confirmation_password') }}</p>
                                    </div>
                                @endif

                                </div>

                                <div class="col-md-12 mt-4">
                                    <input type="submit" value="Register" class="form-control btn btn-success">
                                </div>
                               </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="{{url('admin/login')}}">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    @include('providerpanel.body.js')

</body>

</html>
<!-- end document-->