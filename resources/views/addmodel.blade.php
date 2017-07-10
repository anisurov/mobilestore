@extends('layouts.app') 
@section('title','Entry Product Here')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Entry Model No Here
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
                                <a type="submit" class="btn btn-link" href="brandname"> Add more ? </a>
                            </div>
                        </div>

                    </form>

                </div>

            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Existed Brand
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
