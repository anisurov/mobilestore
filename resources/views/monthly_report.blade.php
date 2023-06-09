@extends('layouts.app')
@section('title','Date wise Report Here')
@section('content')
<link href="{{ asset('bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/components.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/monthwise.js') }}"></script>
<script src="{{ asset('jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('js/metronic.js') }}"></script>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading text-center">
					<strong> Date Selection </strong>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" id="register" role="form" method="POST" action="reportmonthly2">
						{{ csrf_field() }}
						<div class="input-group input-xlarge datetimepicker">
							<input type="text" name="from_date" id="from_date"  class="form-control text-center" value="" placeholder="From date" />
							<span class="input-group-addon"> to </span>
							<input type="text" name="to_date" id="to_date"  class="form-control text-center" value="" placeholder="To date"/>
						</div>

					</form>
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
					<strong> Buy Transaction </strong>
				</div>

				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th><h4 class="text-center">Serial No.</h4></th>
								<th><h4 class="text-center">Date</h4></th>
								<th><h4 class="text-center">Product Amount</h4></th>
								<th><h4 class="text-center">Total Price</h4></th>
							</tr>
						</thead>
						<tbody id="tbody">
                                                       <?php
        foreach ($data1 as $key => $value) {
            $date=$value->date;
            $amount = $value->amount;
            $price = $value->price;
            $sl = $key + 1;
            if($sl&&$date&&$amount&&$price){
            echo ' <tr>
            <td class="text-center">' . $sl . '</td>
            <td class="text-center">' . $date . '</td>
            <td class="text-center">' . $amount . '</td>
            <td class="text-center">' . $price . '</td>
            </tr> ';}
        }
        ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">

					<div class="panel-heading text-center">
						<strong> Sell Transaction </strong>
					</div>

					<div class="panel-body">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th><h4 class="text-center">Serial No.</h4></th>
									<th><h4 class="text-center">Date</h4></th>
									<th><h4 class="text-center">Product Amount</h4></th>
									<th><h4 class="text-center">Total Price</h4></th>
								</tr>
							</thead>
							<tbody id="t1body">
                                                                                                       <?php
        foreach ($data as $key => $value) {
            $date=$value->date;
            $amount = $value->amount;
            $price = $value->price;
            $sl = $key + 1;
            if($sl&&$date&&$amount&&$price){
            echo ' <tr>
            <td class="text-center">' . $sl . '</td>
            <td class="text-center">' . $date . '</td>
            <td class="text-center">' . $amount . '</td>
            <td class="text-center">' . $price . '</td>
            </tr> ';}
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
	</div>
	<script type="text/javascript">
		jQuery("#from_date, #to_date").datepicker({
			autoclose : true,
			isRTL : Metronic.isRTL(),
			dateFormat : "yy-mm-dd",
			pickerPosition : (Metronic.isRTL() ? "bottom-right" : "bottom-left")
		});
		jQuery("#submit_form").on("click", function() {

			var from_date = jQuery('#from_date').val();
			var to_date = jQuery('#to_date').val();

			if (from_date === '' || to_date === '') {

				if (from_date === '') {
					jQuery('#from_date').addClass('is_required');
				} else {
					jQuery('#from_date').removeClass('is_required');
				}
				if (to_date === '') {
					jQuery('#to_date').addClass('is_required');
				} else {
					jQuery('#to_date').removeClass('is_required');
				}
				return false;

			} else {

				jQuery("input").removeClass("is_required");
				return true;

			}

		});
	</script>
	@endsection
