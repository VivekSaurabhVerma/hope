@extends('layouts.user')
@section('content')



<div class="row">
    <div class="col-md-6">
        <h2 class="text-center">Anonymus Posts</h2>
@if (count($usersposts)>0)
    @foreach ($usersposts as $post)
        

        <div class="card m-4">
            <div class="card-body">
            
                    <h3 class="text-center">{{$post->title}}</h3>
                    <br>
                    <hr>
                    <p>{!!$post->body!!}</p>
                    <br>

                    <small>Created By - {{$post->name}}</small>
         


            </div>

        </div>
    @endforeach
    {{-- {{$posts->links()}} --}}
    @endif
    </div>
    <div class="col-md-6">
        <h2 class="text-center">Admin Posts</h2>
        @if (count($adminsposts)>0)
    @foreach ($adminsposts as $post)
        <div class="card m-4">
            <div class="card-body">
          
                    <h3 class="text-center">{{$post->title}}</h3>
                    <br>
                    <hr>
                    <p>{!!$post->body!!}</p>
                    <br>
                   
                    <small>Created By - {{$post->name}}</small>
           
              
            
            </div>
           
        </div>
    @endforeach
    {{-- {{$posts->links()}} --}}
    @endif
    </div>
</div>

@endsection
