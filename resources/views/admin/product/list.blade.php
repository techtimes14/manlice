@extends('layouts.admin.app')

@section('content')
<style type="text/css">
	.table th img, .table td img{
		width: 100px;
    	height: auto;
    	border-radius: 0;
	}
</style>
<div class="content-wrapper">
	<div class="row">
		<div class="col-12 grid-margin">
		  <div class="card">
		    <div class="card-body">
		      <h4 class="card-title">Products List</h4>
		      	@foreach (['danger', 'warning', 'success', 'info'] as $msg)
	                @if(Session::has('alert-' . $msg))
	                    <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
	                @endif
	            @endforeach
		      <div class="page-description">
		      {!! Form::model($products, ['route' => ['admin.product.list'], 'class' => 'cmxform', 'method' => 'GET', 'novalidate'] ) !!}
			      	<div class="input-group col-lg-3 col-md-3 col-sm-3 float-right">
	                	{!! Form::text('search', null, array('id' => 'search-field', 'class'=>'form-control', 'placeholder' => __('Search...'))) !!}
	                	<button type="submit" class="btn btn-info">
	                		<span class="input-group-product d-flex align-items-center">
		                		<i class="icon-magnifier icons"></i>
		                	</span>
	                	</button>
			      	</div>
			     {!! Form::close() !!}
		      	<div class="clearfix"></div>
		      	@if($request->search != null)
			      	<div class="input-group col-lg-12 col-md-12 col-sm-12" style="font-size: 13px;">
			      		Searched for "{{ $request->search }}".&nbsp;&nbsp;<a href="{{ route('admin.product.list') }}">Clear Search</a>
			      	</div>
		      	@endif
		      </div>
		      <div class="row">
		        <div class="table-sorter-wrapper col-lg-12 table-responsive">
		          <table id="sortable-table-2" class="table table-striped">
		            <thead>
		              	<tr>
			                <th>#</th>
			                <th class="sortStyle">
			                	Image
			                </th>
			                <th class="sortStyle">
			                	<!-- direction is by default true -->
			                	{!! CustomPaginator::sort('product_name', 'Name', ['direction' => true]) !!}
			                </th>
			                <th class="sortStyle">
			                	Price
			                </th>
			                <th class="sortStyle">
			                	{!! CustomPaginator::sort('created_at', 'Created') !!}
			                </th>
			                <th class="sortStyle">Status</th>
			                <th class="sortStyle">Action</th>
		              	</tr>
		            </thead>
		            <tbody>
		            <?php $i = ($products->currentPage() - 1) * $products->perPage() + 1; ?>
		            	@if($products->count() == 0)
							<tr>
								<td colspan="7">No records found!</td>
							</tr>
		            	@endif
		            	@foreach($products as $key => $product)
							<tr>
								<td>{{ $i + $key }}</td>
								<td>
								@if(isset($product->default_product_image) && $product->default_product_image != null )
									@if(file_exists(public_path('/uploaded/product/'.$product->default_product_image['name'])))
									  	{!! '<img src="' . URL::to('/') . '/uploaded/product/' . $product->default_product_image['name'] . '" style="width: 50px;" >' !!}
									@else
									  	{!! '<img src="' . URL::to('/') . '/images/no_images.png" style="width: 50px;" >' !!}
									@endif
								@else
									{!! '<img src="' . URL::to('/') . '/images/no_images.png" style="width: 50px;" >' !!}
								@endif
								</td>
								<td>{{ $product->product_name }}</td>
								<td>{{ $product->price }}</td>
								<td>{{ date('d/m/Y' , strtotime($product->created_at)) }}</td>
								<td>
									<label class="badge @if($product->status == 'A') badge-success @elseif($product->status == 'I') badge-danger @endif">
										@if($product->status == 'I')
											Blocked
										@elseif($product->status == 'A')
											Active
										@endif
									</label>
								</td>
								<td>
									<a href="{{ route('admin.product.multifileupload', base64_encode($product->id).'?redirect='.urlencode($request->fullUrl())) }}" title="Product Image"><i class="far fa-image" ></i></a>
									&nbsp;
									<a href="{{ route('admin.product.edit', base64_encode($product->id).'?redirect='.urlencode($request->fullUrl())) }}" title="Edit"><i class="fas fa-pencil-alt"></i></a>
									&nbsp;
									@if($product->status == 'I')
										<a onclick="return confirm('Are you sure you want to unblock the product?')" href="{{ route('admin.product.status', [base64_encode($product->id), $product->status]) }}"><i class="fas fa-lock" title="Click to unblock"></i></a>
									@elseif($product->status == 'A')
										<a onclick="return confirm('Are you sure you want to block the product?')" href="{{ route('admin.product.status', [base64_encode($product->id), $product->status]) }}"><i class="fas fa-unlock" title="Click to block"></i></a>
									@endif
									&nbsp;
									<a onclick="return confirm('Are you sure you want to delete the product?')" href="{{ route('admin.product.delete', base64_encode($product->id)) }}" title="Delete"><i class="fas fa-trash-alt"></i></a>
								</td>
							</tr>
						@endforeach
		            </tbody>
		          </table>
		        </div>
		      </div>
		     	<div style="font-size: 15px;">
		     		Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
		     	</div>
		      	<div class="text-center-pagination">
					{{ $products->appends(request()->input())->links() }}
				</div>
		    </div>
		  </div>
		</div>
	</div>
</div>

@endsection