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

    public function check() {
        
    }

}
