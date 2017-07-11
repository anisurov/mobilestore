<?php

namespace mobileStore\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use mobileStore\Http\Controllers\Controller;
use Session;

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

       if(DB::table('model') -> insert($data)){
      	$flashMessage = 'Your Model Name Entry was Successful!!';
      }else{
      	$flashMessage = 'Your Model Name Entry was failed!!';
      }
	  
	  
	  if ($request -> input('addm') == 'true') {
			$brandnames = DB::select('select brandname from brand');
			Session::flash('success', $flashMessage);
			return view('addmodel', compact('brandnames'));
		} else {

			Session::flash('success', $flashMessage);

			return redirect() -> route('home.index');
		}
        }
}
