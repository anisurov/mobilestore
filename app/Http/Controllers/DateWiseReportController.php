<?php

namespace mobileStore\Http\Controllers;
use DB;
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
     public function report(Request $request)
    {
        $fromdata=$request-> input('from_date');
        $todate=$request -> input('to_date');
        $data=DB::select('select * from product_entry where date>="'.$fromdata.'" && date<="'.$todate.'"');
        if($data)
        {    
        return view('home');
        }
        else
        {
            return view('home');
        }
    }
}
