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
            $data=DB::select('select date(date) as date,sum(sellprice*amount) as price,sum(amount) as amount from product_sell where 
               date(date)<=CURDATE() AND date(date)>=DATE_SUB(CURDATE(), INTERVAL 10 DAY) group by date(date)');
                $data1=DB::select('select date(date) as date,sum(sellprice*amount) as price,sum(amount) as amount from product_entry where 
               date(date)<=CURDATE() AND date(date)>=DATE_SUB(CURDATE(), INTERVAL 10 DAY) group by date(date)');
      return view('monthly_report',compact('data','data1'));
    }
    public function report(Request $request)
    {
           $fromdata=$request-> input('fromdate');
             $todate=$request-> input('todate');
       
        $data=DB::select('select date(date) as date,sum(sellprice*amount) as price,sum(amount) as amount from product_sell where '
                . 'date(date)>= "' . $fromdata . '" AND date(date)<="' . $todate . '" group by date(date)');
        //var_dump($data);
        
        if($data)
        {    
             $i=0;
         foreach ($data as $key => $value) {

                $date = $value->date;
                $price = $value->price;
                $amount = $value->amount;
                
                    $returnData[$i] = array('transaction' => 'sell','date' => $date, 'price' => $price, 'amount' => $value->amount);
            $i=$i+1;
         }
          $data=DB::select('select date(date) as date,sum(sellprice*amount) as price,sum(amount) as amount from product_entry where '
                . 'date(date)>= "' . $fromdata . '" AND date(date)<="' . $todate . '" group by date(date)');
                   foreach ($data as $key => $value) {

                $date = $value->date;
                $price = $value->price;
                $amount = $value->amount;
                    $returnData[$i] = array('transaction' => 'buy','date' => $date, 'price' => $price, 'amount' => $value->amount);
            $i=$i+1;
         }
         return json_encode($returnData);
        }
    }
}
