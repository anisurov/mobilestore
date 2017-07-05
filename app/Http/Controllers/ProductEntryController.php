<?php

namespace mobileStore\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class ProductEntryController extends Controller {
	public function __construct() {
		$this -> middleware('auth');
	}

	public function index() {
		$brandnames = DB::select('select brandname from brand');
		return view('productentry', compact('brandnames'));
	}

	public function create(Request $request) {

		$brandname = $request -> input('brandname');
		$modelno = $request -> input('modelno');
		$amount = $request -> input('amount');
		$sellprice = $request -> input('sellprice');
		$buyprice = $request -> input('buyprice');

		$brand = DB::select('select brand_id from brand where brandname = "' . $brandname . '"');

		foreach ($brand as $key => $value) {
			$brandID = $value -> brand_id;
		}

		$model = DB::select('select model_id from model where brand_id  = "' . $brandID . '" AND model_no ="' . $modelno . '"');

		//var_dump($model);

		foreach ($model as $key => $value) {
			$modelID = $value -> model_id;
		}
		// echo "string::".$modelID;

		$amounts = DB::select('select amount from product_entry where brand_id="' . $brandID . '" and model_id ="' . $modelID . '"');

		//var_dump($model);
		if ($amounts) {

			foreach ($amounts as $key => $value) {
				$pAmount = $value -> amount;
			}

			if ($pAmount) {
				$amount = $amount + $pAmount;
			}
		}

		$data = array('brand_id' => $brandID, 'model_id' => $modelID, 'buyprice' => $buyprice, 'sellprice' => $sellprice, 'amount' => $amount);
		if ($amounts) {
			DB::table('product_entry') -> update($data);
		}else{
		DB::table('product_entry') -> insert($data);}

		Session::flash('success', 'Your Product Entry was Successful!!');

		return redirect() -> route('home.index');
	}

	/*
	 * this api func will be used to retrieve data from db to js.
	 *
	 * @param $request will be used to get api call data
	 *
	 *
	 */

	public function api($request) {

		//$brandname = $request->input('brandname');
		//$modelno   = $request->input('modelno');

		//$data = array('brand_id' =>$brandname ,'model_id'=>$modelno,'amount'=>$amount,'sellprice'=>$price);
		$data = DB::select('select model_no from model where brand_id = (select brand_id from brand   where brandname="' . $request . '")');

		/*return view('productentry');*/
		return json_encode($data);
	}

}
