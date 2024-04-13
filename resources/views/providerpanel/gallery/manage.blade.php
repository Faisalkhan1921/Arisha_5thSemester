@extends('providerpanel.index_master')


@section('user_content')

<div class="row">
    <div class="col-md-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center text-danger">Gallery Data</h3>
            </div>

            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col" style="font-size:12px;">#</th>
                    <th scope="col" style="font-size:12px;">Category</th>
                    <th scope="col" style="font-size:12px;">Image</th>
                    <th scope="col" style="font-size:12px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                    <tr>
                    <td style="font-size:12px;">{{$data->id}}</td>
                    <td style="font-size:12px;">{{$data['category']['category_name']}}</td>
                    <td style="font-size:12px;">
                    <img src="{{ asset( 'storage/' . $data->gallery)}}" alt="" width="50px" height="30px"></td>
               
                  
                    <td>
                        <a href="{{route('gallery.edit',$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <!-- <a href="{{route('provider.delete.service',$data->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a> -->
                        <a href="{{ route('gallery.delete', $data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?')">Delete</a>

                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
 

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



@endsection