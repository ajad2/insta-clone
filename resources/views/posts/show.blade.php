
@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-8">
         <img src="{{ asset('storage/'.$post->image)}}" class="w-100">
      </div>
<div class="col-4">
 
      <div>
      <div class="font-weight-bold">{{ $post->user->name}}</div>
</div>
<div>
<a href="#">Follow</a>
</div>
<hr>
      <p><span class="font-weight-bold">{{ $post->user->name}}</span>     {{$post->caption}}</p>
</div>
</div>

   </div>
</div>
@endsection