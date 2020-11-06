@extends('layouts.app')
@section('content')

    <h2> Create Post</h2>
    <form action="{{ route('adminstorepost') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" placeholder="Name" name="name">
        <label for="title">Title</label>
        <input type="text" id="title" class="form-control" placeholder="Title" name="title">
        {{-- <label for="body">Body</label>
        <textarea  id="body" cols="30" rows="10" class="form-control" name="body" placeholder="Body"></textarea> --}}
        
            <label for="body">Description</label>
            <textarea class="form-control" id="body" placeholder="Description" name="body"></textarea>
            @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        
      </div>
      <input type="submit" class="btn btn-primary" value="Submit" >
      <a href="/" class="btn btn-danger">Cancel</a>
    </form>


@endsection
