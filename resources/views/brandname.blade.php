@extends('layouts.app') 
@section('title','Entry Product Here')
@section('content')
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
                <div class="panel-heading">
                    <b>Entry Brand Name Here</b>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action='brandEntry'>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="brandname" class="col-md-4 control-label">Brand Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="brandname">
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
            <div class="panel panel-info">
                <div class="panel-heading">
                   <b> Existed Brand </b>
                </div>
                <div class="panel-body">
                    
                    <table class="table table-bordered">
                        <tr>
                            
                        @foreach($brandnames as $brandname)
                        <tr><td>{{$brandname->brandname}}</td></tr>
                        @endforeach
                        </tr>
                    </table>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
