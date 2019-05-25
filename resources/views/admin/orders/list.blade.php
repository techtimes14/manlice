@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
	<div class="row">
		<div class="col-12 grid-margin">
		  	<div class="card">
		    	<div class="card-body">
		      		<h4 class="card-title">Order List</h4>
		      		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
	                	@if(Session::has('alert-' . $msg))
	                    	<h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
	                	@endif
	            	@endforeach
		      		<div class="page-description">
		      		{!! Form::model($order_list, ['route' => ['admin.orders.list'], 'class' => 'cmxform', 'method' => 'GET', 'novalidate'] ) !!}
			      	<div class="input-group col-lg-3 col-md-3 col-sm-3 float-right">
	                	{!! Form::text('search', null, array('id' => 'search-field', 'class'=>'form-control', 'placeholder' => __('Search...'))) !!}
	                	<button type="submit" class="btn btn-info">
	                		<span class="input-group-addon d-flex align-items-center">
		                		<i class="icon-magnifier icons"></i>
		                	</span>
	                	</button>
			      	</div>
			     {!! Form::close() !!}
		      	<div class="clearfix"></div>
		      	@if($request->search != null)
			      	<div class="input-group col-lg-12 col-md-12 col-sm-12" style="font-size: 13px;">
			      		Searched for "{{ $request->search }}".&nbsp;&nbsp;<a href="{{ route('admin.orders.list') }}">Clear Search</a>
			      	</div>
		      	@endif
		      </div>
		      <div class="row">
		        <div class="table-sorter-wrapper col-lg-12 table-responsive">
		          <table id="sortable-table-2" class="table table-striped">
		            <thead>
		              <tr>
		                <th>#</th>
		                <th class="sortStyle">Order ID</th>
		                <th class="sortStyle">
		                	{!! CustomPaginator::sort('created_at', 'Purchase Date') !!}
		                </th>
		                <th class="sortStyle">
		                	{!! CustomPaginator::sort('payment_method', 'Payment Mode') !!}
		                </th>
		                <th class="sortStyle">
		                	{!! CustomPaginator::sort('type', 'Order Type') !!}
		                </th>
		                <th class="sortStyle">Action</th>
		              </tr>
		            </thead>
		            <tbody>
		            <?php $i = ($order_list->currentPage() - 1) * $order_list->perPage() + 1; ?>
		            	@if($order_list->count() == 0)
							<tr>
								<td colspan="8">No records found!</td>
							</tr>
		            	@endif
		            	@foreach($order_list as $key => $order)
							<tr>
								<td>{{ $i + $key }}</td>
								<td>{{ $order->unique_order_id }}</td>
								<td>
								@if( $order->purchase_date != NULL)
								 	{{ date("d/m/Y H:i" , strtotime($order->purchase_date)) }}
								@else
									{!! 'NA' !!}
								@endif
								</td>
								<td>
									<label class="badge @if($order->payment_method == 1) badge-bank @elseif($order->payment_method == 2) badge-payU @elseif($order->payment_method == 3) badge-primary @elseif($order->payment_method == 4) badge-danger @endif">
										@if($order->payment_method == 1)
											COD
										@elseif($order->payment_method == 2)
											PayU Money
										@elseif($order->payment_method == 3)
											PayPal
										@elseif($order->payment_method == 4)
											Bank Transfer
										@endif
									</label>
								</td>
								<td>
									<label class="badge @if($order->type == 'order') badge-success @elseif($order->type == 'cart') badge-danger @endif">
										@if($order->type == 'cart')
											In Cart
										@elseif($order->type == 'order')
											Ordered
										@endif
									</label>
								</td>

								<td>
									<a href="{{ route('admin.orders.view', base64_encode($order->id)) }}">
										<i class="fa fa-eye"></i>
									</a>

									<!--<a onclick="return confirm('Are you sure you want to delete the shipping method?')" href="{{ route('admin.orders.delete', base64_encode($order->id)) }}">
										<i class="fas fa-trash-alt"></i>
									</a>-->
								<?php
								if($order->type == 'order') {
								?>
									&nbsp;&nbsp;<a href="{{ route('admin.orders.generate-invoice', base64_encode($order->id)) }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
								<?php
								}
								?>
									</a>
								</td>
							</tr>
						@endforeach
		            </tbody>
		          </table>
		        </div>
		      </div>
		     	<div style="font-size: 15px;">
		     		Showing {{ $order_list->firstItem() }} to {{ $order_list->lastItem() }} of {{ $order_list->total() }} entries
		     	</div>
		      	<div class="text-center-pagination">
					{{ $order_list->appends(request()->input())->links() }}
				</div>
		    </div>
		  </div>
		</div>
	</div>
</div>

@endsection