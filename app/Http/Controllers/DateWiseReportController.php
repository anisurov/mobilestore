<?php

namespace mobileStore\Http\Controllers;

use Illuminate\Http\Request;

class DateWiseReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	
	
	public function index()
    {
      return view('datewise_report');
    }
}
