@extends('welcome')
@section('contant')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
            <a href="{{route('all.post')}}" class="btn btn-info">All Post</a>
            <!-- <a href="{{route('all.category')}}" class="btn btn-info">All Category</a> -->
            <hr>
            <div>
             
                    <h3>{{$post->title}}</h3>
                    <img src="{{URL::to($post->image)}}" height="200px" width="200px">
                    <p>Category :{{$post->name}}</p>
                  
                    <l3>Details:{{$post->details}}</h3>
                 
               
            </div>
        </div>
    </div>
  </div>




@endsection()