
@extends('providerpanel.index_master')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-rbs5bPKdUnr4rnyUnh02sM9JCyxFZK0aPIb9a8F+2n5xkzQz5Ky6S+5FkO8xVA7X" crossorigin="anonymous"></script>


@section('user_content')
<div class="row ">
    <div class="col-md-10 m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">
                    Edit Profile
                    <a href="{{route('profile.view')}}" class="float-right btn btn-primary">View Profile</a>
                </h3>
            </div>

            <div class="card-body">
            @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


               <form action="{{route('profile.update',$data->id)}}" method="post">
                @csrf
                <div class="form-group row">

                <div class="col-md-4">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{$data->name}}" class="form-control">
                </div>

                <div class="col-md-8">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{$data->email}}" class="form-control">
                </div>

                <div class="col-md-4 mt-2">
                    <label for="">Age</label>
                    <input type="number" name="age" value="{{$data->age}}" class="form-control">
                </div>

                <div class="col-md-4 mt-2">
                    <label for="">Weight</label>
                    <input type="number" name="weight" value="{{$data->weight}}" class="form-control">
                </div>

                <div class="col-md-4 mt-2">
                    <label for="">Height</label>
                    <input type="number" name="height" value="{{$data->height}}" class="form-control">
                </div>

                <div class="col-md-6 mt-2">
                    <label for="">Phone</label>
                    <input type="text" name="phone_number" value="{{$data->phone_number}}" class="form-control">
                </div>

                <div class="col-md-6 mt-2">
                    <label for="">Shirt Name</label>
                    <input type="text" name="name_on_shirt" value="{{$data->name_on_shirt}}" class="form-control">
                </div>

                <div class="col-md-6 mt-2">
                    <label for="">Nationality</label>
                    <input type="text" name="nationality" value="{{$data->nationality}}" class="form-control">
                </div>

                <div class="col-md-6 mt-2">
                    <label for="">Gender</label>
                    <select name="gender" id="" class="form-control">
                    <option value="male" {{ $data->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $data->gender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div class="col-md-12 mt-4">
                   <input type="submit" value="Update Profile" class="form-control btn btn-success">
                </div>
                </div>
               </form>
            </div>
        </div>
    </div>
</div>


@endsection