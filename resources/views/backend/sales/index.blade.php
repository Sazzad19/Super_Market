@extends('backend.layouts.master')
@section('title')
   Make Sales Listing Page
@endsection
@section('css')
    <link  href="{{asset('backend/plugins/datepicker/datepicker.css')}}" rel="stylesheet">
@endsection
<!-- page content -->
@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Sales Management</h3>
                </div>

            </div>
            <div class="clearfix"></div>
		  <div class="container">
		  <ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#cash_sale">Cash Sale</a></li>
		    <li><a data-toggle="tab" href="#credit_sale">Credit Sale</a></li>
		  </ul>

		  <div class="tab-content">
			    <div id="cash_sale" class="tab-pane fade in active">
			      <p>
			      	@if (Session::has('message'))
					   <div class="alert alert-info">{{ Session::get('message') }}</div>
					@endif
			      	<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#cashsale">Add Cash Sale</button>

				      	<div class="modal fade" id="cashsale" tabindex="-1" role="dialog" aria-labelledby="cashsaleTitle" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="cashsaleTitle">Add Cash Sale</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
								<?php
								$Product=DB::table('products')
								          ->get();
								?>
						        <form action="{{URL::to('/add_cash_sale')}}" method="post" enctype="multipart/form-data">
						        {{ csrf_field() }}
									  <div class="form-group">
									    <label for="inputAddress">Customer Name</label>
									    <input name="customer_name" type="text" class="form-control" id="inputAddress" placeholder="Full Name">
									  </div>
									  <div class="form-group">
									    <label for="inputAddress">Customer Phone</label>
									    <input name="customer_phone" type="text" class="form-control" id="inputAddress" placeholder="Phone Number">
									  </div>
									  <div class="form-row">
									    <div class="form-group col-md-6">
									      <label for="inputState">Product</label>
									      <select name="product" id="inputState" class="form-control">
									        <option selected disabled>Choose</option>
									        <?php
									          foreach ($Product as $key => $Products) {?>
									            <option value="<?php echo $Products->id; ?>"><?php echo $Products->name;?></option>
									        <?php }?>
									      </select>
									    </div>
									    <div class="form-group col-md-6">
									      <label for="inputState">Quantity</label>
									      <select name="quantity" id="inputState" class="form-control">
									        <option selected disabled>Choose</option>
									        <option>1</option>
									        <option>2</option>
									        <option>3</option>
									        <option>4</option>
									        <option>5</option>
									        <option>6</option>
									        <option>7</option>
									        <option>8</option>
									        <option>9</option>
									        <option>10</option>
									      </select>
									    </div>
									  </div>
										<button type="submit" class="btn btn-primary btn-lg btn-block">Add Sale</button>
								</form>
						      </div>
						    </div>
						  </div>
						</div>

					<table class="table table-dark">
					  <thead>
					    <tr>
					      <th scope="col">S.L</th>
					      <th scope="col">Seller</th>
					      <th scope="col">Customer</th>
					      <th scope="col">Product</th>
					      <th scope="col">Quantity</th>
					      <th scope="col">Total Price</th>
					      <th scope="col">Date</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
						  	<?php
							$CashSale=DB::table('cash_sale')
							        ->get();
					        foreach ($CashSale as $key => $CashSales) {?>
					    <tr>
					          <th scope="row"><?php echo $key++ + 1;?></th>
					          <td><?php echo $CashSales->saller_name;?></td>
					          <td><?php echo $CashSales->customer_name;?></td>
					          <td><?php echo $CashSales->product_name;?></td>
					          <td><?php echo $CashSales->quantity;?></td>
					          <td><?php echo $CashSales->total_price;?></td>
					          <td><?php echo $CashSales->date;?></td>
					          <td><button type="button" class="btn btn-info">Edit</button>
					          	<button type="button" class="btn btn-danger">Delete</button></td>
					    </tr>
					    <?php }?>
					  </tbody>
					</table>
				  </p>
			    </div>



			    <div id="credit_sale" class="tab-pane fade">
			      <p>
			      	@if (Session::has('message'))
					   <div class="alert alert-info">{{ Session::get('message') }}</div>
					@endif
			      	<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#creditsale">Add Credit Sale</button>

				      	<div class="modal fade" id="creditsale" tabindex="-1" role="dialog" aria-labelledby="creditsaleTitle" aria-hidden="true">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="creditsaleTitle">Credit Sale</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						      	<?php
								$Product=DB::table('products')
								          ->get();
								$Customer=DB::table('customer')
								          ->get();
								?>
						        <form action="{{URL::to('/add_credit_sale')}}" method="post" enctype="multipart/form-data">
						        {{ csrf_field() }}
									  <div class="form-group">
									    <label for="inputState">Customer</label>
									      <select name="customer_id" id="inputState" class="form-control">
									        <option selected disabled>Choose</option>
									        <?php
									          foreach ($Customer as $key => $Customers) {?>
									            <option value="<?php echo $Customers->id; ?>"><?php echo $Customers->name;?></option>
									        <?php }?>
									      </select>
									  </div>
									  <div class="form-row">
									    <div class="form-group col-md-6">
									      <label for="inputState">Product</label>
									      <select name="product" id="inputState" class="form-control">
									        <option selected disabled>Choose</option>
									        <?php
									          foreach ($Product as $key => $Products) {?>
									            <option value="<?php echo $Products->id; ?>"><?php echo $Products->name;?></option>
									        <?php }?>
									      </select>
									    </div>
									    <div class="form-group col-md-6">
									      <label for="inputState">Quantity</label>
									      <select name="quantity" id="inputState" class="form-control">
									        <option selected disabled>Choose</option>
									        <option>1</option>
									        <option>2</option>
									        <option>3</option>
									        <option>4</option>
									        <option>5</option>
									        <option>6</option>
									        <option>7</option>
									        <option>8</option>
									        <option>9</option>
									        <option>10</option>
									      </select>
									    </div>
									  </div>
										<button type="submit" class="btn btn-primary btn-lg btn-block">Add Sale</button>
								</form>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div>
			      	<table class="table table-dark">
					  <thead>
					    <tr>
					      <th scope="col">S.L</th>
					      <th scope="col">Seller</th>
					      <th scope="col">Customer</th>
					      <th scope="col">Product</th>
					      <th scope="col">Quantity</th>
					      <th scope="col">Total Price</th>
					      <th scope="col">Date</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
						  	<?php
							$CreditSale=DB::table('credit_sale')
										->leftJoin('customer', 'customer.id', '=', 'credit_sale.customer_id')
							        	->get();
					        foreach ($CreditSale as $key => $CreditSales) {?>
					    <tr>
					          <th scope="row"><?php echo $key++ + 1;?></th>
					          <td><?php echo $CreditSales->saller_name;?></td>
					          <td><a href="<?php echo 'customer'.'/'.$CreditSales->customer_id;?>"><?php echo $CreditSales->name;?></a></td>
					          <td><?php echo $CreditSales->product_name;?></td>
					          <td><?php echo $CreditSales->quantity;?></td>
					          <td><?php echo $CreditSales->total_price;?></td>
					          <td><?php echo $CreditSales->date;?></td>
					          <td><button type="button" class="btn btn-info">Edit</button>
					          	<button type="button" class="btn btn-danger">Delete</button></td>
					    </tr>
					    <?php }?>
					  </tbody>
					</table>
			      </p>
			    </div>
		  </div>
		</div>

     </div>
    </div>
    <!-- /page content -->
@endsection
@section('script')

@endsection
