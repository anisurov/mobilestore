<?php

namespace mobileStore\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SellProductController extends Controller {
	public function __construct() {
		$this -> middleware('auth');
	}

	public function index() {

		$brandnames = DB::select('select brandname from brand');
		return view('productsell', compact('brandnames'));
	}

	public function api(Request $request) {

		if ($request -> input('brandname') && !$request -> input('modelno')) {

			$brandname = $request -> input('brandname');

			// echo 'k;ldfg   ' . $brandname;
			//$data = array('brand_id' =>$brandname ,'model_id'=>$modelno,'amount'=>$amount,'sellprice'=>$price);
			$data = DB::select('select model_no from model where brand_id = (select brand_id from brand   where brandname="' . $brandname . '")');

			return json_encode($data);
		} elseif ($request -> input('modelno') && $request -> input('brandname')) {
			$modelno = $request -> input('modelno');
			$bid = $request -> input('brandname');
			$modelId = DB::select('select model_id from model where brand_id = (select brand_id from brand   where brandname="' . $bid . '") and model_no="' . $modelno . '"');

			foreach ($modelId as $key => $value) {
				$mid = $value -> model_id;
			}

			$price = DB::select('select sellprice from present_condition where brand_id  =(select brand_id from brand ' . 'where brandname="' . $bid . '") and model_id = "' . $mid . '"');

			return json_encode($price);
		} elseif ($request -> input('mblno')) {
			$mobile = $request -> input('mblno');
			$customerName = DB::select('SELECT name FROM `customer` WHERE mobile="' . $mobile . '"');
			if ($customerName)
				return json_encode($customerName);
		}

	}

	public function sell(Request $request) {

		$mobile = $request -> input('cmobileNum');
		$customerName = $request -> input('cname');
		$brandnames = $request -> input('brandname');
		$modelno = $request -> input('modelno');
		$amounts = $request -> input('amount');
		$sellprice = $request -> input('price');

		$customerIDs = DB::select('select customer_id from customer where mobile="' . $mobile . '" and name="' . $customerName . '"');

		if ($customerIDs) {
			foreach ($customerIDs as $key => $value) {
				$customerID = $value -> customer_id;
			}
		} else {
			$customerData = array('name' => $customerName, 'mobile' => $mobile);
			DB::table('customer') -> insert($customerData);
			$customerIDs = DB::select('select customer_id from customer where mobile="' . $mobile . '" and name="' . $customerName . '"');
			foreach ($customerIDs as $key => $value) {
				$customerID = $value -> customer_id;
			}
		}

		$totalValue = count($brandnames);

		for ($index = 0; $index < $totalValue; $index++) {
			if($brandnames[$index]&&$modelno[$index]&&$sellprice[$index]&&$amounts[$index]){
			$brand = DB::select('select brand_id from brand where brandname = "' . $brandnames[$index] . '"');

			foreach ($brand as $key => $value) {
				$brandID = $value -> brand_id;
			}

			$model = DB::select('select model_id from model where brand_id  = "' . $brandID . '" AND model_no ="' . $modelno[$index] . '"');

			//var_dump($model);

			foreach ($model as $key => $value) {
				$modelID = $value -> model_id;
			}
			
			
			$amountInDB = DB::select('select amount from present_condition where brand_id="' . $brandID . '" and model_id ="' . $modelID . '"');

		//var_dump($model);
		if ($amountInDB) {

			foreach ($amountInDB as $key => $value) {
				$pAmount = $value -> amount;
			}
			if ($pAmount>0) {
				$amount = $pAmount - $amounts[$index];
			}else{
				$amount = 0;
			}
		}
		$buyPriceInDB = DB::select('select buyprice from present_condition where brand_id="' . $brandID . '" and model_id ="' . $modelID . '"');
		foreach ($buyPriceInDB as $key => $value) {
				$buyprice = $value -> buyprice;
			}
		$data = array('brand_id' => $brandID, 'model_id' => $modelID, 'buyprice' => $buyprice,
		 'sellprice' => $sellprice[$index], 'amount' => $amounts[$index],'customer_id'=>$customerID);
		
		DB::select('update present_condition set amount="'.$amount.'" where brand_id="' . $brandID . '" and model_id ="' . $modelID . '"');
		
		DB::table('product_sell') -> insert($data);	 
		}
		}

	
	
	return view('print',compact('request'));
	}

}
