@extends('welcome')
@section('contant')
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($posts as $post)
        <div class="post-preview">
          <a href="post.html">
          <img src="{{URL::to($post->image)}}" style="height:300px"> 
            <h2 class="post-title">
             {{$post->title}}
            </h2>
          </a>
          <p class="post-meta">Category
            <a href="#">{{$post->name}}</a>
            on Slug{{$post->slug}}</p>
        </div>
        <hr>
        @endforeach

        {{ $posts->links() }}

        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>
 @endsection()