@extends('layouts.app')
@section('title','Sell Product Here')
@section('content')
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/validator.js') }}"></script>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Entry Product Here
				</div>
				<div class="panel-body">
					<form action="/sell" id="register" method="POST" class="form-horizontal">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="cmobileNum" class="col-sm-4 control-label">Customer Mobile No. :</label>
							<div class="col-sm-6">
								<input type="text" name="cmobileNum" class="form-control">
								<span class="help-block" id="error"></span>
							</div>
						</div>

						<div class="form-group">
							<label for="cname" class="col-sm-4 control-label"> Customer Name :</label>
							<div class="col-sm-6">
								<input type="text" name="cname"  class="form-control">
								<span class="help-block" id="error"></span>
							</div>
						</div>

						<div class="form-group col-lg-3" style="margin-right:2px">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-plus"></i> Brand
								</div>
								<select name="brandname" class="form-control">
									<option value="">Select brand</option>
									@foreach($brandnames as $brandname)
									<option value="{{$brandname->brandname}}">{{$brandname->brandname}}</option>
									@endforeach
								</select>
							</div>
							<span class="help-block" id="error"></span>
						</div>

						<div class="form-group col-lg-3" style="margin-right: 2px">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-plus"></i> Brand
								</div>
								<select name="modelno" class="form-control">

									<option value="">Select Model</option>

								</select>
							</div>
							<span class="help-block" id="error"></span>
						</div>

						<div class="form-group col-lg-3" style="margin-right: 2px">
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-plus"></i> Amount
								</div>
								<input type="text" name="amount" id="task-name" class="form-control">
							</div>
							<span class="help-block" id="error"></span>
						</div>

						<div class="form-group">
							<div class="form-group col-lg-3" style="margin-right: 3px">
								<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-plus"></i> Unit Price
									</div>
									<input type="text" name="price" id="task-name" class="form-control">
								</div>
								<span class="help-block" id="error"></span>
							</div>

							<div class="form-group">
								<label for="SellProduct" class="col-sm-4 control-label">Total price :</label>
								<div class="col-sm-4">
									<input type="text" name="total" id="task-name" class="form-control">
								</div>
							</div>

							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-6">
									<button type="submit" class="btn btn-default">
										<i class="fa fa-plus"></i> Done
									</button>
								</div>
							</div>

					</form>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
