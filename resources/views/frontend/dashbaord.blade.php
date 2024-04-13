@extends('frontend.index_master')
@section('frontend_content')

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center text-danger">
                User Dashboard
            </h3>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">User Dashboard</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- Left Sidebar -->
                                <div class="list-group">
                                    <a href="{{ route('dashboard') }}" class="list-group-item{{ Request::is('dashboard') ? ' active' : '' }}">User Dashboard</a>
                                    <a href="{{route('user.profile')}}" class="list-group-item{{ Request::is('user/profile') ? ' active' : '' }}">Profile</a>
                                    <a href="{{ route('seeker.contact.data') }}" class="list-group-item{{ Request::is('seeker/contact/data') ? ' active' : '' }}">Contact Message</a>
                                </div>
                            </div>

                            <div class="col-md-8">
                                <!-- Right Content -->
                                <div class="content">
                                    @if(Request::is('dashboard'))
                                        <center>
                                            <img src="{{ asset('common/male_avator.jpg') }}" width="100px" height="100px" alt="">
                                        </center>
                                        <h5 class="text-center">Welcome {{ Auth::user()->name }}</h5>
                                        <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi commodi eius, libero natus fuga aliquam necessitatibus perferendis minus. Unde voluptates expedita non animi eius quaerat ducimus quos velit placeat harum, iure reprehenderit esse dicta sed perspiciatis vitae adipisci exercitationem, tenetur rerum a neque! Laudantium ipsam officiis officia ad explicabo sapiente.</p>
                                    @elseif(Request::is('user/profile'))
                                        <h3 class="text-center text-danger">Seeker Profile Edit</h3>

                                        @if(session('success'))
                                        <span class="text-center text-success">{{session('success')}}</span>
                                        @endif
                                        <form action="{{route('seeker.profile.update',$profile->id)}}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="">Name</label>
                                                    <input type="text" name="name" id="" class="form-control" value="{{$profile->name}}">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="">Email</label>
                                                    <input type="email" name="email" id="" class="form-control" value="{{$profile->email}}">
                                                </div>

                                                <div class="col-md-4">
                                                    <label for="">Phone</label>
                                                    <input type="number" name="phone" id="" class="form-control" value="{{$profile->phone}}">
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                <label for="">Province</label>
                                                <select name="province" id="province" class="form-control">
                                                    @foreach($province as $data)
                                                        <option value="{{$data->id}}" {{ $data->id == $profile->province ? 'selected' : '' }}>
                                                            {{$data->province_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6 mt-2">
                                                <label for="">City</label>
                                                <select name="city" id="city" class="form-control">
                                                    @foreach($city as $data)
                                                        <option value="{{$data->id}}" data-province="{{$data->province_id}}" {{ $data->id == $profile->city ? 'selected' : '' }}>
                                                            {{$data->city_name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

<script>
    document.getElementById('province').addEventListener('change', function () {
        var selectedProvinceId = this.value;
        var citySelect = document.getElementById('city');

        // Remove existing options
        while (citySelect.options.length > 0) {
            citySelect.remove(0);
        }

        // Add new options based on the selected province
        @foreach($city as $data)
            if ({{$data->province_id}} == selectedProvinceId) {
                var option = document.createElement('option');
                option.value = '{{$data->id}}';
                option.text = '{{$data->city_name}}';
                option.selected = '{{$data->id == $profile->city ? 'selected' : ''}}';
                citySelect.add(option);
            }
        @endforeach
    });
</script>



                                                <div class="col-md-12 mt-2">
                                                    <label for="">Password</label>
                                                    <input type="text" name="password" id="" class="form-control" value="{{$profile->real_password}}">
                                                </div>

                                                
                                                <div class="col-md-12 mt-2">
                                                    
                                                    <input type="submit"  class="form-control btn btn-success" value="Update Profile">
                                                </div>
                                            </div>
                                        </form>
                                    @elseif(Request::is('seeker/contact/data'))
                                        <table class="table table-responsive bordered">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Category Name</th>
                                                    <th>Provider Name</th>
                                                    <th>Message</th>
                                                    <!-- <th>Status</th> -->
                                                    <!-- <th>Action</th> -->

                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach($data as $data)
                                                <tr>
                                                    <td>{{$data->id}}</td>
                                                    <td>{{$data->category_id}}</td>
                                                    <td>{{$data->service_name}}</td>
                                                    <td>{{$data->message}}</td>
                                                    <!-- <td>
                                                    @if($data->status==0)
                                                      <p href="" class="btn btn-danger btn-sm">Pending</p>
                                                        @elseif($data->status==2)
                                                       <a href="" class="btn btn-danger disabled btn-sm" disabled>Cancelled</a>
                                                       @elseif($data->status == 1)
                                                       <a href="" class="btn btn-success btn-sm" disabled>Approved</a>
                                                        @endif
                                                    </td>
                                                    </td>
                                                    <td>
                                                    @if($data->status==0)
                                                      <a href="{{route('seeker.contact.data.cancel',$data->id)}}" class="btn btn-danger btn-sm">Cancel</a>
                                                        @elseif($data->status==2)
                                                       <a href="" class="btn btn-danger disabled btn-sm" disabled>Cancelled</a>
                                                       @else 
                                                       <a href="" class="btn btn-danger disabled btn-sm" disabled>Cancel</a>
                                                        @endif
                                                    </td> -->
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection