@extends('layouts.app') 
@section('title','Entry Product Here')
@section('content')
 <div class="container">
      <div class="row">
        <div class="col-xs-6">
          <h1>
            {{ config('app.name') }}
          </h1>
        </div>
        <div class="col-xs-6 text-right">
          <h1>INVOICE</h1>
        </div>
      </div>
      <hr/>
      <!-- / end client details section -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>
              <h4>Serial No.</h4>
            </th>
            <th>
              <h4>Brand Name</h4>
            </th>
            <th>
              <h4>Model No.</h4>
            </th>
            <th>
              <h4>Amount</h4>
            </th>
            <th>
              <h4>Price</h4>
            </th>
          </tr>
        </thead>
      </table>
      <div class="row text-right">
        <div class="col-xs-2 col-xs-offset-8">
          <p>

          </p>
        </div>
      </div>
      <hr />
    </div>
@endsection
