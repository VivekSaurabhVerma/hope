<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::orderBy('created_at','desc')->paginate(5);
        $usersposts = Post::where('is_verified', 1)->orderBy('created_at','desc')->get();
        $adminsposts = Post::where('role','admin')->orderBy('created_at','desc')->get();
        
        return view('posts.index1',['usersposts'=>$usersposts,'adminsposts'=>$adminsposts]);
    }

    public function admin()
    {
        // $posts = Post::orderBy('created_at','desc')->paginate(5);
        $posts = DB::select('select * from Post');
        return view('pages.admin',['posts'=>$posts]);
    }

    public function verify($id)
    {
        $post =  Post::where('id', $id)->first();
        $post->is_verified = true;
        $post->save();
        return redirect('/admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'title' => 'required',
            'body' => 'required'

        ]);
        $post = new Post;

        $post->name = $request->input('name');
        $post->title = $request->input('title');
        $post->body = $request->input('body');


        $post->save();

        return redirect('/')-> with('success','Post sent for verification');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =  Post::where('id', $id)->first();
        return view('pages.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =  Post::where('id', $id)->first();

        $post->name = $request->input('name');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/admin')-> with('success','Post updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/admin')-> with('danger','Post has been deleted');
    }
}
