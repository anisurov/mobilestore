@extends('layouts.app') 
@section('title','Available Product')
@section('content')
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/availProduct.js') }}"></script>
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <h1>
                {{ config('app.name') }}
            </h1>
        </div>
        <div class="col-xs-6 text-right">
            <h1>INVOICE</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
    <div class="panel-body">
    	{{ csrf_field() }}
    <div class="form-group">
        <label for="brandname" class="col-md-4 control-label">Brand Name</label>
        <div class="col-md-6">
            <select name="brandname" class="form-control" style="width:350px">
                <option value="">--- Select brand ---</option>

                @foreach($brandnames as $brandname)
                <option value="{{$brandname->brandname}}">{{$brandname->brandname}}</option>
                @endforeach

            </select>
        </div>
    </div>
    </div>
    </div>
    </div>
        <div class="row">
            <div class="col-xs-6">
    <div class="panel-body">
    <div class="form-group">
        <label for="modelno" class="col-md-4 control-label">Model No.</label>
        <div class="col-md-6">
            <select name="modelno" class="form-control" style="width:350px">
				<option value="">--- Select Model ---</option>
            </select>
        </div>
    </div>
    </div>
        </div>
        </div>
    <hr/>
    <!-- / end client details section -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
        <h4>Serial No.</h4>
        </th>
        <th>
        <h4>Brand Name</h4>
        </th>
        <th>
        <h4>Model No.</h4>
        </th>
        <th>
        <h4>Amount</h4>
        </th>
        <th>
        <h4>Price</h4>
        </th>
        </tr>
        </thead>
        <tbody id="tbody">
        <?php
        foreach ($data as $key => $value) {
            $brandID = $value->brand_id;
            $brandnames = DB::select('select brandname from brand where brand_id="' . $brandID . '"');
            foreach ($brandnames as $key1 => $value1) {
                $brandname = $value1->brandname;
            }
            $modelID = $value->model_id;
            $models = DB::select('select model_no from model where brand_id  = "' . $brandID . '" AND model_id ="' . $modelID . '"');
            foreach ($models as $key2 => $value2) {
                $model = $value2->model_no;
            }
            $amount = $value->amount;
            $buyprice = $value->buyprice;
            $sellprice = $value->sellprice;
            $sl = $key + 1;
            echo ' <tr>
            <td>' . $sl . '</td>
            <td>' . $brandname . '</td>
            <td class="text-right">' . $model . '</td>
            <td class="text-right">' . $amount . '</td>
            <td class="text-right">' . $buyprice . '</td>
         </tr> ';
        }
        ?>
		</tbody>
    </table>
    <div class="row text-right">
        <div class="col-xs-2 col-xs-offset-8">
            <p>

            </p>
        </div>
    </div>
    <hr />
</div>
@endsection
