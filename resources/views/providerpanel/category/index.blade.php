@extends('providerpanel.index_master')
@section('user_content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">
                        Add Category
                    </h3>

                    <div class="card-body">
                        @if(session('success'))
                        <span class="text-success">{{session('success')}}</span>
                        @endif
                        <form action="{{route('store.category')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" name="category_name" id="" class="form-control">
                            </div>

                            <div class="form-group mt-3">
                                <input type="submit" value="Add Category" class="form-control btn btn-success">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection