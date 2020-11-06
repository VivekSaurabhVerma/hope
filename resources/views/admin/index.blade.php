@extends('layouts.app')
@section('content')

<div class="container">
  <h2>Anonymous Posts</h2>
             
  
      @foreach ($posts as $post)

      <div class="card m-4">
            <div class="card-body">
            
                    <h3 class="text-center">{{$post->title}}</h3>                    
                    <p class="text-right">Created By - {{$post->name}}</p>
                    <hr>
                    <p>{!!$post->body!!}</p>
                    <br>                    

                    <p>Created At :{{$post->created_at}} </p>
                    <p>Updated At :{{$post->updated_at}} </p>                  


                    <a style ="display: inline" class="btn btn-success" type="button" href="{{ route('approvepost',$post->id) }}">        
                    @if ( $post->is_verified)
                    Reject
                    @else
                    Approve
                    @endif
                    </a>
                    <a style ="display: inline" class="btn btn-warning" type="button" href="{{ route('editpost',$post->id) }}">Edit</a>
                    <form style ="display: inline" method="post" class="delete_form" action="/delete/{{$post->id}}">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button> 
                    </form>
                      

            </div>
        </div> 
    
    @endforeach


<div class="pagination">
    {{ $posts->render() }}
</div>

</div>

@endsection
