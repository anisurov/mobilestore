@extends('layouts.app')
@section('title','Daily Report Here')
@section('content')
<link href="{{ asset('bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/components.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/datewise.js') }}"></script>
<script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/metronic.js') }}"></script>

<div class="container">
	<div class="row">
		<div class="col-xs-6">
			<h1> {{ config('app.name') }} </h1>
		</div>
		<div class="col-xs-6 text-right">
			<h1>INVOICE</h1>
		</div>
	</div>
	<div class="row">
		<div class="panel-body">
                    <form class="form-horizontal" id="register" role="form" method="POST" action="reportdate2">
				{{ csrf_field() }}
				<div class="col-md-6">
					<div class="input-group input-xlarge datetimepicker">
						<input type="text" name="from_date" id="from_date"  class="form-control text-center" value="" placeholder="Select date" />
					</div>
				</div>
                    </form>
			</div>
		</div>
	</div>
	<hr/>
	<!-- / end client details section -->
	<table class="table table-bordered">
             <div class="row">
            <caption class="text-center"><h4 class="text-center">Buy Transaction</h4></caption>
            </div>
		<thead>
			<tr>
				<th><h4 class="text-center">Serial No.</h4></th>
                                <th><h4 class="text-center">Transaction</h4></th>
				<th><h4 class="text-center">Brand Name</h4></th>
				<th><h4 class="text-center">Model No.</h4></th>
				<th><h4 class="text-center">Amount</h4></th>
				<th><h4 class="text-center">Price</h4></th>
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
            if($sl&&$brandnames&&$models&&$amount&&$buyprice){
            echo ' <tr>
            <td class="text-center">' . $sl . '</td>
            <td class="text-center"> Buy </td>
            <td class="text-center">' . $brandname . '</td>
            <td class="text-center">' . $model . '</td>
            <td class="text-center">' . $amount . '</td>
            <td class="text-center">' . $buyprice . '</td>
            </tr> ';}
        }
        ?>
		</tbody>
	</table>
        	<table class="table table-bordered">
                     <div class="row">
            <caption class="text-center"><h4 class="text-center">Sell Transaction</h4></caption>
            </div>
		<thead>
			<tr>
				<th><h4 class="text-center">Serial No.</h4></th>
                                <th><h4 class="text-center">Transaction</h4></th>
				<th><h4 class="text-center">Brand Name</h4></th>
				<th><h4 class="text-center">Model No.</h4></th>
				<th><h4 class="text-center">Amount</h4></th>
				<th><h4 class="text-center">Price</h4></th>
			</tr>
		</thead>
		<tbody id="t1body">
               <?php
        foreach ($data1 as $key => $value) {
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
            if($sl&&$brandnames&&$models&&$amount&&$buyprice){
            echo ' <tr>
            <td class="text-center">' . $sl . '</td>
                 <td class="text-center"> Sell </td>
            <td class="text-center">' . $brandname . '</td>
            <td class="text-center">' . $model . '</td>
            <td class="text-center">' . $amount . '</td>
            <td class="text-center">' . $sellprice . '</td>
            </tr> ';}
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
<script type="text/javascript">
	jQuery("#from_date").datepicker({
		autoclose : true,
		isRTL : Metronic.isRTL(),
		dateFormat: "yy-mm-dd",
		pickerPosition : (Metronic.isRTL() ? "bottom-right" : "bottom-left")
	});
	jQuery("#submit_form").on("click", function() {

		var from_date = jQuery('#from_date').val();

		if (from_date === '') {

			if (from_date === '') {
				jQuery('#from_date').addClass('is_required');
			} else {
				jQuery('#from_date').removeClass('is_required');
			}
			return false;

		} else {

			jQuery("input").removeClass("is_required");
			return true;

		}

	}); 
</script>
@endsection