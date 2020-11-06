<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
        $this->middleware('auth');
       
    }
    public function create()
    {
       
        return view('admin.create');
    }
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
        $post->role= 'admin';
        
        $post->save();
        
        return redirect('/adminposts')-> with('success','Post Created');

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
     
        $posts = Post::where('role','user')->orderBy('created_at','desc')->paginate(10);
        return view('admin.index')->with('posts',$posts);
    }
    public function adminposts()
    {
        $posts = Post::where('role','admin')->orderBy('created_at','desc')->paginate(10);
        return view('admin.adminposts')->with('posts',$posts);
    }
    public function approve($id)
    {
       
            $post = Post::find($id);

            if ($post->is_verified == true){
                $post->is_verified = false;
                $post->save();
                 Session::flash('error', 'danger');
                return redirect('/home')->with('success','Post Rejected');
            }
            else{
                $post->is_verified = true;
                $post->save();
                return redirect('/home')->with('success','Post Approved');
            }
            
        
    }
    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.edit')->with('post',$post);
    }
    public function update(Request $request,$id)
    {
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->name = $request->input('name');
        $post->save();
        return redirect('/home')->with('success','Post Updated');
    }
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect('/home')->with('success','Post Deleted');

    }
    
}
