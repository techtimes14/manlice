@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
	<div class="row">
		<div class="col-12 grid-margin">
		  	<div class="card">
		    	<div class="card-body">
		      		<h4 class="card-title">Assignment order list</h4>
		      		@foreach (['danger', 'warning', 'success', 'info'] as $msg)
	                	@if(Session::has('alert-' . $msg))
	                    	<h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
	                	@endif
	            	@endforeach
	            	<?php /*
		      		<div class="page-description">
		      		{!! Form::model($order_list, ['route' => ['admin.orders.assigned-order-list'], 'class' => 'cmxform', 'method' => 'GET', 'novalidate'] ) !!}
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
				*/ ?>
		      <div class="row">
		        <div class="table-sorter-wrapper col-lg-12 table-responsive">
		          <table id="sortable-table-2" class="table table-striped">
		            <thead>
		              <tr>
		                <th>#</th>
		                <th class="sortStyle">Order ID</th>
		                <th class="sortStyle">
		                	Purchase Date
		                </th>
		                <th class="sortStyle">
		                	{!! CustomPaginator::sort('created_at', 'Assign Date') !!}
		                </th>
		                <th class="sortStyle">
		                	Payment Mode
		                </th>
		                <th class="sortStyle">
		                	{!! CustomPaginator::sort('status', 'status') !!}
		                </th>
		                <th class="sortStyle">Action</th>
		              </tr>
		            </thead>
		            <tbody>
		            <?php $i = ($order_list->currentPage() - 1) * $order_list->perPage() + 1;  ?>
		            	@if($order_list->count() == 0)
							<tr>
								<td colspan="8">No records found!</td>
							</tr>
		            	@endif
		            	@foreach($order_list as $key => $order)
							<tr>
								<td>{{ $i + $key }}</td>
								<td>{{ $order->get_order->unique_order_id }}</td>
								<td>
								@if( $order->get_order->purchase_date != NULL)
								 	{{ date("d/m/Y H:i" , strtotime($order->get_order->purchase_date)) }}
								@else
									{!! 'NA' !!}
								@endif
								</td>
								<td>
									@if( $order->created_at != NULL)
								 		{{ date("d/m/Y H:i" , strtotime($order->created_at)) }}
									@else
										{!! 'NA' !!}
									@endif
								</td>
								<td>
									<label class="badge @if($order->get_order->payment_method == 1) badge-bank @elseif($order->get_order->payment_method == 2) badge-payU @elseif($order->get_order->payment_method == 3) badge-primary @elseif($order->get_order->payment_method == 4) badge-danger @endif">
										@if($order->get_order->payment_method == 1)
											COD
										@elseif($order->get_order->payment_method == 2)
											PayU Money
										@elseif($order->get_order->payment_method == 3)
											PayPal
										@elseif($order->get_order->payment_method == 4)
											Bank Transfer
										@endif
									</label>
								</td>
								<td>
									@if($order->status == 'P')
                                    	<label class="badge act_pend">Pending</label>
                                    <?php /*
                                    <label class="badge act_cancld">cancelled</label>
                                    */ ?>
									@elseif($order->status == 'A')
										<label class="badge act_accept">Accepted</label>
									@elseif($order->status == 'D')
										<label class="badge act_delivrd">Delivered</label>
									@elseif($order->status == 'H')
										<label class="badge act_hld">Hold</label>
									@endif
								</td>

								<td>
									<a href="{{ route('admin.orders.assign-order-details', base64_encode($order->get_order->id)) }}">
										<i class="fa fa-eye"></i>
									</a>
									<?php /*
									&nbsp;&nbsp;<a href="{{ route('admin.orders.generate-invoice', base64_encode($order->get_order->id)) }}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i></a>
									</a>
									*/ ?>
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