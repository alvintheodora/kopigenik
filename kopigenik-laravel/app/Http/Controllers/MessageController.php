<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function store(Request $request){
    	$request->validate([
    		'name' => 'required',
    		'email' => 'required',
    		'subject' => 'required',
    		'message' => 'required|max:255'
    	]);

    	Message::create([
    		'name' => request('name'),
    		'email' => request('email'),
    		'subject' => request('subject'),
    		'message' => request('message')
    	]);

    	return back();
    }
}
