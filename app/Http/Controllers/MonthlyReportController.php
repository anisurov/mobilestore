<?php

namespace mobileStore\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class  MonthlyReportController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	
	
	public function index()
    {
      return view('monthly_report');
    }
    public function report(Request $request)
    {
        
    }
}
