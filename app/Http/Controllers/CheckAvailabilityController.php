<?php

namespace mobileStore\Http\Controllers;

use Illuminate\Http\Request;

class CheckAvailabilityController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	
	
	public function index()
    {
      return view('checkproduct');
    }
}
