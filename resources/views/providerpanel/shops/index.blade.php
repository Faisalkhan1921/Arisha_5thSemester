@extends('providerpanel.index_master')


@section('user_content')

<div class="row">
    <div class="col-md-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Add Shops</h3>
            </div>

            <div class="card-body">
                
                @if (session('success'))
                    <div class="alert alert-success">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                
                @if (session('error'))
                    <div class="alert alert-success">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif
                <form action="{{route('provider.shops.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">

                    <div class="col-md-4">
                        <label for="">Shop  Name</label>
                        <input type="text" name="service_name" id="" class="form-control">
                    </div>

                    <div class="col-md-4">
                        <label for="">Shop Phone Number</label>
                        <input type="number" name="service_provider_phone" id="" class="form-control">
                    </div>


                    <div class="col-md-4">
                        <label for="">Shop Category</label>
                        <select name="category_id" id="" class="form-control">
                        
                        @foreach($category as $data)
                         <option value="{{$data->id}}">{{$data->category_name}}</option>
                         @endforeach
 
                        </select>
                    </div>

                    <div class="col-md-6 mt-2">
    <label for="">Select Province</label>
    <select name="province_id" id="province_id" class="form-control">
        @foreach($province as $data)
            <option value="{{$data->id}}">{{$data->province_name}}</option>
        @endforeach
    </select>
</div>

<div class="col-md-6 mt-2">
    <label for="">Select City</label>
    <select name="city_id" id="city_id" class="form-control">
        <!-- City options will be dynamically filtered using JavaScript -->
        <option value="" class="text-center">------------Select Cities------------</option>
        @foreach($city as $data)
            <option value="{{$data->id}}" data-province="{{$data->province_id}}">{{$data->city_name}}</option>
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



                       <div class="col-md-12 mt-2">
                       <label for="editor">Description:</label>
                        <textarea class="form-control" id="editor" name="description" rows="5" col="12" style="background-color: balck;">hi</textarea>

                       </div>


                       <div class="col-md-6 mt-2">
                        <label for="">Cover Image</label>
                        <input type="file" name="cover_image" id="" class="form-control">
                       </div>

                       <div class="col-md-6 mt-3">
                        <label for="">Top Featured Product</label>
                        <select name="featured" id="" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                       </div>
                    </div>

                    

                    <div class="form-group">
                        <input type="submit" value="Add Shop" class="form-control btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <!-- CKEditor -->
  <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

  <script>
    // Replace 'editor' with the ID of your textarea
    CKEDITOR.replace('editor');
</script>
@endsection