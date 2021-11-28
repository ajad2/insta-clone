
@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">
    {{method_field('post')}} 
    @csrf
    <div class="row">
        <div class="col-8 offset-2">
            <div class="row">
                <h1>Add New Post</h1>
            </div>
        <div class="form-group row">
                            <label for="caption" class="col-md-4 col-form-label">Post caption</label>
                                <input id="caption"
                                 type="text" 
                                 class="form-control @error('caption') is-invalid @enderror" 
                                 name="caption" value="{{ old('caption') }}" 
                                  autocomplete="caption" autofocus>       
                            </div>
                            <div class="row">
                            <label for="image" class="col-md-4 col-form-label">Post image</label>
                                <input type="file" class="form-control-file" id="image" name="image">                                
                              </div>
                               
                              <div class="row-1 pt-4">
                            <button class="btn btn-primary">Add New Post</button>
                              </div>
                                
                              </div>  
                    
    </div>
</form>
</div>
@endsection