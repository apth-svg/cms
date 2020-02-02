@extends('welcome')
@section('contant')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
            <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
            <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
            <hr>
            <div>
                <ol>
                    <li>Category Name :{{$cat->name}}</li>
                    <li>Category Slug:{{$cat->slug}}</li>
                </ol>
            </div>
        </div>
    </div>
  </div>




@endsection()