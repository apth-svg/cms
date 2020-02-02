@extends('welcome')
@section('contant')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
            <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
            <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
            <a href="{{route('all.post')}}" class="btn btn-info">All Post</a>
        <hr>

        <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Title</label>
              <input type="text" class="form-control" placeholder="Title" name="title">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
                <select name="category_id" id="" class="form-control">
                  @foreach($category as $cate)
                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                  @endforeach
                </select>
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" name="image">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Details</label>
              <input type="text" class="form-control" placeholder="Details" name="details" >
            </div>
          </div>
        
          <br>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection()