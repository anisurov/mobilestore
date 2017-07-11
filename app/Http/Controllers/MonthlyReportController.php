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
           $fromdata=$request-> input('fromdate');
           $time = new DateTime($fromdata);
        $todate=$request -> input('todate');
        $date = $fromdata->format('n.j.Y');
        echo $date;
//$time = $time->format('H:i');
        $data=DB::select('select * from product_entry where date>="'.$fromdata.'" && date<="'.$todate.'"');
        var_dump($data);
        if($data)
        {    
        return view('monthly_report');
        }
        else
        {
            return view('home');
        }
    }
}
