@extends('layouts.app') 
@section('title','Available Product')
@section('content')
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/availProduct.js') }}"></script>
<div class="container">
    
        <div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading text-center">
					<strong> Brand Name Selection </strong>
				</div>
                        <select class="form-control text-center" name="brandname" class="form-control" style="width:750px">
                            <option value="">--- Select brand ---</option>

                            @foreach($brandnames as $brandname)
                            <option value="{{$brandname->brandname}}">{{$brandname->brandname}}</option>
                            @endforeach

                        </select>
         </div>
                        </div>
                        </div>
  
    <div class="row">
     	<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading text-center">
					<strong> Model No. Selection </strong>
				</div>
                        <select class="form-control text-center" name="modelno" class="form-control" style="width:750px">
                            <option value="">--- Select Model ---</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    <hr/>
    <!-- / end client details section -->
    <div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">

					<div class="panel-heading text-center">
						<strong> Available Product </strong>
					</div>

					<div class="panel-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
        <h4 class="text-center">Serial No.</h4>
        </th>
        <th>
        <h4 class="text-center">Brand Name</h4>
        </th>
        <th>
        <h4 class="text-center">Model No.</h4>
        </th>
        <th>
        <h4 class="text-center">Amount</h4>
        </th>
        <th>
        <h4 class="text-center">Price</h4>
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
                if ($sl && $brandnames && $models && $amount && $buyprice) {
                    echo ' <tr>
            <td class="text-center">' . $sl . '</td>
            <td class="text-center">' . $brandname . '</td>
            <td class="text-center">' . $model . '</td>
            <td class="text-center">' . $amount . '</td>
            <td class="text-center">' . $buyprice . '</td>
            </tr> ';
                }
            }
            ?>

        </tbody>
    </table>
                                        </div>
                                </div>
                        </div>
    <div class="row text-right">
        <div class="col-xs-2 col-xs-offset-8">
            <p>

            </p>
        </div>
    </div>
    <hr />
</div>
@endsection
