<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
	public function __construct(){
		$this->middleware('auth')->except('index');
	}
    public function index(){
    	return view('subscribe');
    }
    public function show(){
    	return view('payment-confirmation');
    }
    public function store(){
    	return redirect()->home();
    }
}
