@extends('providerpanel.index_master')

@section('user_content')
<div class="row mt-5">
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">
                    Profile View
                </h3>
            </div>

            <div class="card-body text-center">
                <!-- Profile Image -->
                <img src="{{asset('common/male_avator.jpg')}}" alt="Profile Image"  style="width: 170px; height: 130px;">


                <!-- Name -->
                <h4 class="card-title">{{$data->username}}</h4>

                <!-- Email -->
                <p class="card-text">{{$data->email}}</p>

                <!-- Button -->
                <a href="{{route('profile.edit')}}" class="btn btn-success mt-2">Edit Profile</a>
            </div>
        </div>
    </div>
</div>


@endsection