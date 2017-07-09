<?php

namespace mobileStore\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use mobileStore\Http\Controllers\Controller;

class ModelController extends Controller
{
   public function __construct() {
		$this -> middleware('auth');
	}
        public function index() {
		$brandnames = DB::select('select brandname from brand');
		return view('addmodel', compact('brandnames'));
	}
        public function model(Request $request)
        {
             $brandname = $request -> input('brandname');
          $model=$request -> input('modelno');
          $brand = DB::select('select brand_id from brand where brandname = "' . $brandname . '"');

		foreach ($brand as $key => $value) {
			$brandID = $value -> brand_id;
		}
        $data=  array('brand_id'=>$brandID,'model_no'=>$model);
       DB::table('model') -> insert($data);
       return view('home');
        }
}
