@extends('providerpanel.index_master')


@section('user_content')
<div class="container-fluid">
<div class="row">
    <div class="col-md-12 m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Seeker Contacts</h3>
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
              
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col" style="font-size:12px;">#</th>
                        <th scope="col" style="font-size:12px;">Name</th>
                        <th scope="col" style="font-size:12px;">Email</th>
                        <th scope="col" style="font-size:12px;">Phone</th>
                        <th scope="col" style="font-size:12px;">Address</th>
                        <th scope="col" style="font-size:12px;">Message</th>
                        <th scope="col" style="font-size:12px;">Category</th>
                        <!-- <th scope="col" style="font-size:12px;">Status</th> -->
                        <!-- <th scope="col" style="font-size:12px;">Action</th> -->

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cont as $item)
                        <tr>
                        <th scope="row" style="font-size:10px;">{{$item->id}}</th>
                        <td style="font-size:10px;">{{$item->name}}</td>
                        <td style="font-size:10px;">{{$item->email}}</td>
                        <td style="font-size:10px;">{{$item->phone}}</td>
                        <td style="font-size:10px;">{{$item->address}}</td>
                        <td style="font-size:10px;">{{$item->message}}</td>
                        <td style="font-size:10px;">{{$item->category_id}}</td>
                        <!-- <td>
                        @if($item->status==0)
                            <p href="" class="btn btn-danger btn-sm ">Pending</p>
                            @elseif($item->status==2)
                            <a href="" class="btn btn-danger btn-sm disabled" disabled>Cancelledbyuser</a>
                            @elseif($item->status == 1)
                            <a href="" class="text-success" disabled>Approved</a>
                            @endif
                        </td>
                        </td> -->
                        <!-- <td>
                        @if($item->status==0)
                            <a href="{{route('provider.contact.data.approve',$item->id)}}" class="btn btn-success btn-sm">Approve</a>
                            @elseif($item->status==2)
                            <a href="" class="btn btn-danger btn-sm disabled" disabled>Cancelled</a>
                            @else 
                            <a href="" class="btn btn-danger btn-sm disabled" disabled>Approved</a>
                            @endif
                        </td> -->
                        </tr>
                      @endforeach
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
</div>

@endsection