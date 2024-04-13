@extends('providerpanel.index_master')

@section('user_content')

<div class="row">
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Add Province</h3>
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
                <form action="{{route('store.province')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Province Name</label>
                        <input type="text" name="p_name" id="" class="form-control">
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Add Province" class="form-control btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection