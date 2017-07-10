<?php

namespace mobileStore\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class CheckAvailabilityController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $brandnames = DB::select('select brandname from brand');
        $data = DB::select('select * from present_condition');
        return view('checkproduct', compact('data','brandnames'));
    }

    public function check(Request $request) {
    	if ($request -> input('brandname') && !$request -> input('modelno')) {

			$brandname = $request -> input('brandname');

			// echo 'k;ldfg   ' . $brandname;
			//$data = array('brand_id' =>$brandname ,'model_id'=>$modelno,'amount'=>$amount,'sellprice'=>$price);
			$data = DB::select('select model_no from model where brand_id = (select brand_id from brand   where brandname="' . $brandname . '")');

			return json_encode($data);
		} elseif ($request -> input('brandname') && $request -> input('modelno')) {
        	$modelno = $request -> input('modelno');
			$bid = $request -> input('brandname');
			$brandIds = DB::select('select brand_id from brand   where brandname="' . $bid . '"');
			foreach ($brandIds as $key => $value) {
				$brandId = $value -> brand_id;
			}
			
			$modelIds = DB::select('select model_id from model where brand_id ="' . $brandId . '" and model_no="' . $modelno . '"');

			foreach ($modelIds as $key1 => $value1) {
				$modelID = $value1 -> model_id;
			}
			
			
			$data = DB::select('select * from present_condition where brand_id  = "' . $brandId . '" AND model_id ="' . $modelID . '"');
			return json_encode($data); 
		}
		
    }

}
