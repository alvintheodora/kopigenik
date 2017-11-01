<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function ajaxGetComment(){
        $comments = Comment::with('user')->where('post_id',request('post_id'))->get();
        return json_encode($comments);
    }

    // public function store(Request $request){
    // 	$request->validate([

    // 	]);
    // }
}
