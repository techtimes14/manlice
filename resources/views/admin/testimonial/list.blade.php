@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
	<div class="row">
		<div class="col-12 grid-margin">
		  <div class="card">
		    <div class="card-body">
		      <h4 class="card-title">Testimonial List</h4>
		      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	                @if(Session::has('alert-' . $msg))
	                    <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
	                @endif
	            @endforeach
		      <div class="page-description">
		      {!! Form::model($testimonial, ['route' => ['admin.testimonial.list'], 'class' => 'cmxform', 'method' => 'GET', 'novalidate'] ) !!}
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
			      		Searched for "{{ $request->search }}".&nbsp;&nbsp;<a href="{{ route('admin.testimonial.list') }}">Clear Search</a>
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
		                <!-- direction is by default true -->
		                	{!! CustomPaginator::sort('title', 'Title', ['direction' => true]) !!}
		                </th>
		                <th class="sortStyle">
		                	{!! CustomPaginator::sort('content', 'Content') !!}
		                </th>
		                <th class="sortStyle">
		                	{!! CustomPaginator::sort('created_at', 'Created') !!}
		                </th>
		                <th class="sortStyle">Status</th>
		                <th class="sortStyle">Action</th>
		              </tr>
		            </thead>
		            <tbody>
		            <?php $i = ($testimonial->currentPage() - 1) * $testimonial->perPage() + 1; ?>
		            	@if($testimonial->count() == 0)
							<tr>
								<td colspan="8">No records found!</td>
							</tr>
		            	@endif
		            	@foreach($testimonial as $key => $testimonial_detail)
							<tr>
								<td>{{ $i + $key }}</td>
								<td>{{ $testimonial_detail->title }}</td>
								<td >{!! str_limit(strip_tags($testimonial_detail->content), '50', '...') !!}</td>
								<td>{{ date('d/m/Y' , strtotime($testimonial_detail->created_at)) }}</td>
								<td>
									<label class="badge @if($testimonial_detail->is_block == 'N') badge-success @elseif($testimonial_detail->is_block == 'Y') badge-danger @endif">
										@if($testimonial_detail->is_block == 'Y')
											Blocked
										@elseif($testimonial_detail->is_block == 'N')
											Active
										@endif
									</label>
								</td>
								<td>
									<a href="{{ route('admin.testimonial.edit', base64_encode($testimonial_detail->id).'?redirect='.urlencode($request->fullUrl())) }}">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<a onclick="return confirm('Are you sure you want to delete the testimonial?')" href="{{ route('admin.testimonial.delete', base64_encode($testimonial_detail->id)) }}">
										<i class="fas fa-trash-alt"></i>
									</a>

									@if($testimonial_detail->is_block == 'Y')
										<a onclick="return confirm('Are you sure you want to unblock the testimonial?')" href="{{ route('admin.testimonial.status', [base64_encode($testimonial_detail->id), $testimonial_detail->is_block]) }}"><i class="fas fa-lock" title="Click to unblock"></i></a>
									@elseif($testimonial_detail->is_block == 'N')
										<a onclick="return confirm('Are you sure you want to block the testimonial?')" href="{{ route('admin.testimonial.status', [base64_encode($testimonial_detail->id), $testimonial_detail->is_block]) }}"><i class="fas fa-unlock" title="Click to block"></i></a>
									@endif
									</a>
								</td>
							</tr>
						@endforeach
		            </tbody>
		          </table>
		        </div>
		      </div>
		     	<div style="font-size: 15px;">
		     		Showing {{ $testimonial->firstItem() }} to {{ $testimonial->lastItem() }} of {{ $testimonial->total() }} entries
		     	</div>
		      	<div class="text-center-pagination">
					{{ $testimonial->appends(request()->input())->links() }}
				</div>
		    </div>
		  </div>
		</div>
	</div>
</div>

@endsection