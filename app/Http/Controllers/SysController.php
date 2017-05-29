<?php

namespace mobileStore\Http\Controllers;

use Illuminate\Http\Request;

use Session;

class SysController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	
	
	public function index()
    {
      return view('home');
    }
}
