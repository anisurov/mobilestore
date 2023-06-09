@extends('layouts.app') 
@section('title','Entry Product Here')
@section('content')
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/regis.js') }}"></script>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-info">
				@if (Session::has('success'))
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
					{{Session::get('success')}}
				</div>
				@endif
				<div class="panel-heading  text-center">
					<strong>Entry Product Here</strong>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" id="register" role="form" method="POST" action="entry">
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

						<div class="form-group">
							<label for="modelno" class="col-md-4 control-label">Model No.</label>
							<div class="col-md-6">
								<select name="modelno" class="form-control" style="width:350px">

								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="amount" class="col-md-4 control-label">Amount</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="amount">
                                <span class="help-block" id="error"></span>
							</div>
						</div>

						<div class="form-group">
							<label for="sellprice" class="col-md-4 control-label">Selling Price ( of each )</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="sellprice" required>
								<span class="help-block" id="error"></span>
							</div>
						</div>

						<div class="form-group{{ $errors->has('buyprice') ? ' has-error' : '' }}">
							<label for="buyprice" class="col-md-4 control-label">Buy Price (of each)</label>
							<div class="col-md-6">
								<input type="text" class="form-control price" name="buyprice" required>
								<span class="help-block" id="error"></span>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Done
								</button>
								<button type="submit" name="addm" value="true" class="btn btn-primary">
									Add more ?
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
