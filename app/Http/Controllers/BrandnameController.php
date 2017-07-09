<?php

namespace mobileStore\Http\Controllers;

use Illuminate\Http\Request;
use mobileStore\Http\Controllers\Controller;
use DB;

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
        echo $brandname;
        $data=  array('brandname'=>$brandname);
       DB::table('brand') -> insert($data);
       return view('home');
    }
}
