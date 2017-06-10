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

            $price = DB::select('select sellprice from product_entry where brand_id  =(select brand_id from brand ' . 'where brandname="' . $bid . '") and model_id = "' . $mid . '"');

            return json_encode($price);
        }elseif($request->input('mblno')){
            $mobile = $request->input('mblno');
          $customerName =  DB::select('SELECT name FROM `customer` WHERE mobile="'.$mobile.'"');
          if($customerName)
          return json_encode($customerName);
        }

    }

}
