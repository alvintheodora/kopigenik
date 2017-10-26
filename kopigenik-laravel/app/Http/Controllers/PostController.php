<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    public function __construct(){
		
	}

	public function index(){
		$posts = Post::all();
		//$date = Carbon::parse($transaction->time_bought)->addDay(2)->format('j M Y, H:i:s');
		return view('blog',compact('posts'));
	}

	public function showPost(Post $post){
		return view('blog-show',compact('post'));
	}


	//Admin
	public function indexByAdmin(){
		return view('blog-admin');
	}
	public function createPost(){		
        return view('blog-admin-create');
	}
	public function storePost(Request $request){		
		//validate request
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Post::create([
        	'name' => request('title'),
        	'title' => request('title'),
        	'content' => request('content')
        ]);
        
        return redirect('/blog-admin/create-post');
	}
	public function removePost(Post $post){
		$post->delete();
        return redirect('/blog-admin');
	}

	public function ajaxPostDataTable(){
        $posts = Post::all();
        return json_encode($posts);
    }

}
