@extends('layouts.app')
@section('content')

    <h2> Edit Post</h2>
    <form action="{{ route('updatepost',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- <input type="hidden" name="_method" value="PUT" /> --}}
        @method('PUT')
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" class="form-control" value="{{$post->name}}" name="name">
        <label for="title">Title</label>
        <input type="text" id="title" class="form-control" value="{{$post->title}}" name="title">
        {{-- <label for="body">Body</label>
        <textarea  id="body" cols="30" rows="10" class="form-control" name="body"></textarea> --}}

            <label for="body">Description</label>
            <textarea class="form-control" id="body" placeholder="Description" name="body">{{$post->body}}</textarea>
            @error('body')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

      </div>
      <input type="submit" class="btn btn-primary" value="submit" >
      <a href="/" class="btn btn-danger">Cancel</a>
    </form>


@endsection