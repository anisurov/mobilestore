<?php

namespace mobileStore\Http\Controllers;

use Illuminate\Http\Request;
use mobileStore\Http\Controllers\Controller;
use DB;
use Session;

class BrandnameController extends Controller
{
        public function __construct(){
        $this->middleware('auth');
    }
	
	
	public function index()
    {
     $brandnames = DB::select('select brandname from brand');
		return view('brandname', compact('brandnames'));
    }
	
    public function brand(Request $request)
    {
        $brandname = $request -> input('brandname');
        $data=  array('brandname'=>$brandname);
		
      if(DB::table('brand') -> insert($data)){
      	$flashMessage = 'Your Brand Name Entry was Successful!!';
      }else{
      	$flashMessage = 'Your Brand Name Entry was failed!!';
      }
	  
	  if ($request -> input('addm') == 'true') {
			$brandnames = DB::select('select brandname from brand');
			Session::flash('success', $flashMessage);
			return view('brandname', compact('brandnames'));
		} else {

			Session::flash('success', $flashMessage);

			return redirect() -> route('home.index');
		}
    }
}
