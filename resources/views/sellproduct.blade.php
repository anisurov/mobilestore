@extends('layouts.app')
@section('title','Entry Product Here')  
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Entry Product Here</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="entry">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('brandname') ? ' has-error' : '' }}">
                            <label for="brandname" class="col-md-4 control-label">Brand Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="brandname" value="{{ old('brandname') }}" required autofocus>

                                @if ($errors->has('brandname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('brandname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('modelno') ? ' has-error' : '' }}">
                            <label for="modelno" class="col-md-4 control-label">Model No.</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="modelno" required>
                                @if ($errors->has('modelno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modelno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="amount" required>
                                @if ($errors->has('amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price of each</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price" required>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

   
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Done
                                </button>
                                <a class="btn btn-link" href="productentry">
                                    Add more?
                                </a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
