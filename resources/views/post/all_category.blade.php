@extends('welcome')
@section('contant')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-md-10 mx-auto">
        
            <a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
            <a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
           <hr>
           <table class="table table-responsive">
             <tr>
                <th>SL</th>
                <th>Category Name</th> 
                <th>Slug</th>
                <th>Action</th>
             </tr>
             @foreach($category as $data)
             <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->slug}}</td>
                <td>
                    <a href="{{URL::to('edit/category/'.$data->id)}}" class="btn btn-sm btn-info">Edit</a>
                    <a href="{{URL::to('delete/category/'.$data->id)}}" class="btn btn-sm btn-danger" 
                    id="delete">Delete</a>
                    <a href="{{URL::to('view/category/'.$data->id)}}" class="btn btn-sm btn-success">View</a>
                </td>
             </tr>
             @endforeach
           </table>
      </div>
    </div>
  </div>




@endsection()