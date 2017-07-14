@extends('layouts.app') 
@section('title','Entry Model No. Here')
@section('content')
<script src="{{ asset('js/brand.showtabledata.js') }}"></script>
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
                   <b> Entry Model No Here </b>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action='modelEntry'>
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
                                <input type="text" class="form-control" name="modelno">
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
                   <b> Existed Model </b>
                </div>
                <div class="panel-body">
						<div class="row">
							
							<div class="col-md-5 pull-left">
								<select name="brandname" class="form-control">
									<option value="">--- Select brand ---</option>
									
									@foreach($brandnames as $brandname)
									<option value="{{$brandname->brandname}}">{{$brandname->brandname}}</option>
									@endforeach
									
								</select>
							</div>
							
							<div class="col-md-6 pull-rigt">
								<div class="portlet box grey-cascade border-top">

                                <div class="portlet-body">

                                    <ol id="list_model">
                                    	
                                    </ol>
                                    
                              </div>
                                 
                        	 </div>
						</div>
							
					</div>
					
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
