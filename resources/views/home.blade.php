@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				@if (Session::has('success'))

				<div class="alert alert-success" role="alert">
					<strong>Success:</strong>{{Session::get('success')}}
				</div>

				@endif
				<div class="panel-heading">
					Dashboard
				</div>

				<div class="panel-body">
					You are logged in!.....................
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
