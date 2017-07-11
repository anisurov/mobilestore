@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="container">
	<div class="row">
          
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				@if (Session::has('success'))
				<div class="alert alert-success alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
					{{Session::get('success')}}
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
