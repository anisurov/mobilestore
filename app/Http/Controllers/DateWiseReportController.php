<?php

namespace mobileStore\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class DateWiseReportController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('datewise_report');
    }

    public function report(Request $request) {
        $fromdata = $request->input('fromdate');
        $todate = $request->input('todate');

        $data = DB::select('select * from product_entry where date>="' . $fromdata . '" && date<="' . $todate . '"');
        //$returnData=  array();
          $i=0;
        if ($data) {
            foreach ($data as $key => $value) {

                $modelid = $value->model_id;
                $brandid = $value->brand_id;
                $brandnames = DB::select('select brandname from brand where brand_id="' . $brandid . '"');
                foreach ($brandnames as $key1 => $value1) {
                    $brandname = $value1->brandname;
                }
                $models = DB::select('select model_no from model where brand_id  = "' . $brandid . '" AND model_id ="' . $modelid . '"');
                foreach ($models as $key2 => $value2) {
                    $model = $value2->model_no;
                }

                $returnData[$i] = array('transaction' => 'buy', 'brandname' => $brandname, 'modelno' => $model, 'amount' => $value->amount, 'buyprice' => $value->buyprice);
            $i=$i+1;
                
                }
            $data = DB::select('select * from product_sell where date>="' . $fromdata . '" && date<="' . $todate . '"');
            foreach ($data as $key => $value) {

                $modelid = $value->model_id;
                $brandid = $value->brand_id;
                $brandnames = DB::select('select brandname from brand where brand_id="' . $brandid . '"');
                foreach ($brandnames as $key1 => $value1) {
                    $brandname = $value1->brandname;
                }
                $models = DB::select('select model_no from model where brand_id  = "' . $brandid . '" AND model_id ="' . $modelid . '"');
                foreach ($models as $key2 => $value2) {
                    $model = $value2->model_no;
                }

                $returnData[$i] = array('transaction' => 'sell', 'brandname' => $brandname, 'modelno' => $model, 'amount' => $value->amount, 'buyprice' => $value->buyprice);
            $i=$i+1;
                
                }
            return json_encode($returnData);
        } else {
            return view('home');
        }
    }

}
