<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Invoice</title>
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  
  <body>
<?php
		$mobile = $request -> input('cmobileNum');
		$customerName = $request -> input('cname');
		$brandnames = $request -> input('brandname');
		$modelno = $request -> input('modelno');
		$amounts = $request -> input('amount');
		$sellprice = $request -> input('price');
		$total = $request -> input('total');

?>
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
      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h4>Client</h4>
            </div>
            <div class="panel-body">
              <p>
               <b>Name</b> : <?php echo $customerName?> <br>
               <b>Mobile</b> : <?php echo $mobile?> <br>
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- / end client details section -->
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>
              <h4>Serial No.</h4>
            </th>
            <th>
              <h4>Description</h4>
            </th>
            <th>
              <h4>Qty</h4>
            </th>
            <th>
              <h4>Rate/Price</h4>
            </th>
            <th>
              <h4>Sub Total</h4>
            </th>
          </tr>
        </thead>
        <tbody>
        	<?php
        	$totalValue = count($brandnames);

			for ($index = 0; $index < $totalValue; $index++) {
				$id = $index + 1;
         echo ' <tr>
            <td>'.$id.'</td>
            <td>'.$brandnames[$index].','.$modelno[$index].'</td>
            <td class="text-right">'.$amounts[$index].'</td>
            <td class="text-right">'.$sellprice[$index].'</td>
            <td class="text-right">'.$amounts[$index]*$sellprice[$index].'</td>
         </tr> ';
          }?>
        </tbody>
      </table>
      <div class="row text-right">
        <div class="col-xs-2 col-xs-offset-8">
          <p>
            <strong>
            Total : <?php echo $total;?> <br>
            </strong>
          </p>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-xs-12">
      	  <div class="panel panel-default">
              <div class="panel-heading">
                <h4>Sold By</h4>
              </div>
              <div class="panel-body">
                <p>
                 {{ Auth::user()->name }}
                </p>
              </div>
            </div>
        </div>
      </div>
 	
 	<input type="button" onClick="window.print()" value="Print!!"/>
 	
    </div>
 </body>
</html>