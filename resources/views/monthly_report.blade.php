@extends('layouts.app')
@section('title','Entry Product Here')  
@section('content')
 <div class="panel-body">

        <!-- New Task Form -->
        <form action="/EntryProduct" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="EntryProduct" class="col-sm-3 control-label">Brand Name :</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
           <div class="form-group">
                <label for="EntryProduct" class="col-sm-3 control-label"> Model No. :</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="EntryProduct" class="col-sm-3 control-label">Amount :</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
                <div class="form-group">
                <label for="EntryProduct" class="col-sm-3 control-label">Price :</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
