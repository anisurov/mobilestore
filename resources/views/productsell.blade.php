@extends('layouts.app')
@section('title','Sell Product Here')  
@section('content')
 <div class="panel-body">

        <!-- New Task Form -->
        <form action="/sell" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="cmobileName" class="col-sm-3 control-label">Customer Mobile No. :</label>

                <div class="col-sm-6">
                    <input type="text" name="cmobileName" id="task-name" class="form-control">
                </div>
            </div>
            
           <div class="form-group">
                <label for="cname" class="col-sm-3 control-label"> Customer Name :</label>

                <div class="col-sm-6">
                    <input type="text" name="cname" id="task-name" class="form-control">
                </div>
            </div>
            
            <div class="form-group">
                <label for="SellProduct" class="col-sm-3 control-label">Brand Name :</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            
                <div class="form-group">
                <label for="SellProduct" class="col-sm-3 control-label">Model No. :</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
            
                <div class="form-group">
                <label for="SellProduct" class="col-sm-3 control-label">Amount :</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
              
              <div class="form-group">
                <label for="SellProduct" class="col-sm-3 control-label">Price of one product :</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
              
              <div class="form-group">
                <label for="SellProduct" class="col-sm-3 control-label">Total price :</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
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
@endsection
