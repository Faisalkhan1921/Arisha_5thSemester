@extends('providerpanel.index_master')


@section('user_content')

<div class="row">
    <div class="col-md-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Gallery</h3>
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
                <form action="{{route('gallery.update',$gallery->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">

                

                                        <div class="col-md-12 m-atuo">
                        <label for="">Gallery Category</label>
                        <select name="category_id" id="" class="form-control">
                            @foreach($category as $data)
                                <option value="{{ $data->id }}" @if($data->id == $gallery->category_id) selected @endif>
                                    {{ $data->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>




                  


                       <div class="col-md-12 mt-2">
                        <label for="">Gallery Image</label>
                        <input type="file" name="gallery" id="" class="form-control">
                        <div>
                            <label for="">Old Image</label>
                            <img src="{{ asset( 'storage/' . $gallery->gallery)}}" alt="" width="50px" height="30px">
                        </div>
                       </div>
                       </div>

                    

                    <div class="form-group">
                        <input type="submit" value="Update Gallery" class="form-control btn btn-success">
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