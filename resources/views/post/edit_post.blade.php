@extends('welcome')
@section('contant')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
            <a href="{{route('all.post')}}" class="btn btn-info">All Post</a>
        <hr>

        <form action="{{url('update/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" name="title" value="{{$post->title}}">
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
            <label>Category</label>
                <select name="category_id" class="form-control">
                  @foreach($category as $cate)
                    <option value="{{$cate->id}}" 
                    <?php if($cate->id==$post->category_id) echo"selectd" ;?>>
                    {{$cate->name}}</option>
                  @endforeach
                </select>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>New Image</label>
              <input type="file" class="form-control" name="image">
             Old Image: <img src="{{URL::to($post->image)}}" alt="" style="width:70px">
             
             <input type="hidden" name="old_photo" value="{{$post->image}}">
            </div>
          </div>

          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Details</label>
              <!-- <textarea name="details" cols="6" rows="10" value="{{$post->details}}"></textarea> -->
              <input type="text" class="form-control" value="{{$post->details}}" name="details" >
            </div>
          </div>

          <br>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection()