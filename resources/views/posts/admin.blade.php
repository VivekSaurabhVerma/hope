@extends('layouts.app')
@section('content')

<a class="btn btn-success"href="/create">Add a new post</a>

<div class="container">
<table>
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Post</th>
    <th>Name</th>
    <th>Role</th>
    <th>is_verified</th>
    <th>Created_at</th>
    <th>Updated_at</th>

  </tr>
  @foreach ($posts as $post)

   <tr>
   <td>{{$post->id}}</td>
    <td>{{$post->title}}</td>
    <td>{{$post->post}}</td>
    <td>{{$post->name}}</td>
    <td>{{$post->role}}</td>
    <td>{{$post->is_verified}}</td>
    <td>{{$post->created_at}}</td>
    <td>{{$post->updated_at}}</td>

    <td><a class="btn btn-primary" href="/is_verified/{{$post->id}}">Approve</a></td>
    <td><a class="btn btn-warning" href="/edit/{{$post->id}}">Edit</a></td>

    <td>
        <form method="post" class="delete_form" action="/delete/{{$post->id}}">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete</button>
        </td>
    </form>

  </tr>
  </div>

   @endforeach

</table>



@endsection
