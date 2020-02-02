@extends('welcome')
@section('contant')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
            
            <a href="{{route('writepost')}}" class="btn btn-info">Write Post</a>
           <hr>
           <table class="table table-responsive">
             <tr>
                <th>No</th>
                <th>Category</th> 
                <th>Title</th>
                <th>Photo</th>
                <th>Action</th>
             </tr>
             @foreach($posts as $post)
             <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->name}}</td>
                <td>{{$post->title}}</td>
                <!-- <td>{{$post->details}}</td> -->
                <td><img src="{{URL::to($post->image)}}" alt="" style="width:60px"></td>
                <td>
                    <a href="{{URL::to('edit/post/'.$post->id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{URL::to('delete/post/'.$post->id)}}" class="btn btn-danger btn-sm" id="delete">Delete</a>
                    <a href="{{URL::to('view/post/'.$post->id)}}" class="btn btn-success btn-sm" id="view">View</a>
                </td>
             </tr>
             @endforeach
           </table>
      </div>
    </div>
  </div>




@endsection()