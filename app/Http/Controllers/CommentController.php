<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
	public function __construct(){
		$this->middleware('auth')->except(['ajaxGetComment']);
	}
    public function ajaxGetComment(){
        $comments = Comment::with('user')->where('post_id',request('post_id'))->get();
        return json_encode($comments);
    }

    public function store(Request $request){

    	$request->validate([
    		'comment' => 'required|max:255',
    		'comment_post_ID' => 'required'    		

    	]);

    	Comment::create([
    		'post_id' => request('comment_post_ID'),
    		'user_id' => auth()->id(),
    		'content' => request('comment')
    	]);


    	return back();
    }
}
