@extends('providerpanel.index_master')


@section('user_content')

<div class="row">
    <div class="col-md-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center text-danger">Shops Data</h3>
            </div>

            <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col" style="font-size:12px;">#</th>
                    <th scope="col" style="font-size:12px;">Image</th>
                    <th scope="col" style="font-size:12px;">Name</th>
                    <th scope="col" style="font-size:12px;">Phone</th>
                    <th scope="col" style="font-size:12px;">Category</th>
                    <th scope="col" style="font-size:12px;">Province</th>
                    <th scope="col" style="font-size:12px;">City</th>
                    <th scope="col" style="font-size:12px;">Featured</th>
                    <!-- <th scope="col" style="font-size:12px;">Status</th> -->
                    <th scope="col" style="font-size:12px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($services as $data)
                    <tr>
                    <td style="font-size:12px;">{{$data->id}}</td>
                    <td style="font-size:12px;">
                    <img src="{{ asset( 'storage/' . $data->cover_image)}}" alt="" width="50px" height="30px"></td>
               
                    <td style="font-size:12px;">{{$data->shop_name}}</td>
                    <td style="font-size:12px;">{{$data->shop_provider_phone}}</td>
                    <td style="font-size:12px;">{{$data['category'] ['category_name']}}</td>
                    <td style="font-size:12px;">{{$data['province'] ['province_name']}}</td>
                    <td style="font-size:12px;">{{$data['city'] ['city_name']}}</td>
                    @if($data->featured == 1)
                    <td style="font-size:12px;">Yes</td>
                    @else 
                    <td style="font-size:12px;">No</td>
                    @endif
                    <!-- <td style="font-size:12px;">{{$data->status}}</td> -->
                    <td>
                        <a href="{{route('provider.edit.shops',$data->id)}}" class="btn btn-primary btn-sm">Edit</a>
                        <!-- <a href="{{route('provider.delete.shops',$data->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a> -->
                        <a href="{{ route('provider.delete.shops', $data->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this service?')">Delete</a>

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

<script type="text/javascript">
$(function(){
$(document).on('click','#delete',function(e){
    e.preventDefault();
    var link = $(this).attr("href");    

    Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

});

});
</script>

@endsection