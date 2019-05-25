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
		      <h4 class="card-title">Search Keyword List</h4>
		      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	                @if(Session::has('alert-' . $msg))
	                    <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
	                @endif
	            @endforeach
		      <div class="page-description">
		      {!! Form::model($searchKeywords, ['route' => ['admin.searchKeyword'], 'class' => 'cmxform', 'method' => 'GET', 'novalidate'] ) !!}
			      	<div class="input-group col-lg-3 col-md-3 col-sm-3 float-right">
	                	{!! Form::text('search', null, array('id' => 'search-field', 'class'=>'form-control', 'placeholder' => __('Search...'))) !!}
	                	<button type="submit" class="btn btn-info">
	                		<span class="input-group-pincode d-flex align-items-center">
		                		<i class="icon-magnifier icons"></i>
		                	</span>
	                	</button>
			      	</div>
			     {!! Form::close() !!}
		      	<div class="clearfix"></div>
		      	@if($request->search != null)
			      	<div class="input-group col-lg-12 col-md-12 col-sm-12" style="font-size: 13px;">
			      		Searched for "{{ $request->search }}".&nbsp;&nbsp;<a href="{{ route('admin.searchKeyword') }}">Clear Search</a>
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
		                	{!! CustomPaginator::sort('search_key', 'Search Key', ['direction' => true]) !!}
		                </th>
		                <th class="sortStyle">{!! CustomPaginator::sort('count', 'Counter', ['direction' => true]) !!}</th>
                                <th class="sortStyle">Action</th>
		              </tr>
		            </thead>
		            <tbody>
		            <?php $i = ($searchKeywords->currentPage() - 1) * $searchKeywords->perPage() + 1; ?>
		            	@if($searchKeywords->count() == 0)
							<tr>
								<td colspan="7">No records found!</td>
							</tr>
		            	@endif
		            	@foreach($searchKeywords as $key => $searchVal)
							<tr>
								<td>{{ $i + $key }}</td>
								<td>{{ $searchVal->search_key }}</td>
								<td>{{ $searchVal->count }}</td>
								<td>
                                                                    <a onclick="return confirm('Are you sure you want to delete the search keyword?')" href="{{ route('admin.searchKeyDelete', base64_encode($searchVal->id)) }}">
                                                                            <i class="fas fa-trash-alt"></i>
                                                                    </a>									
								</td>
							</tr>
						@endforeach
		            </tbody>
		          </table>
		        </div>
		      </div>
		     	<div style="font-size: 15px;">
		     		Showing {{ $searchKeywords->firstItem() }} to {{ $searchKeywords->lastItem() }} of {{ $searchKeywords->total() }} entries
		     	</div>
		      	<div class="text-center-pagination">
					{{ $searchKeywords->appends(request()->input())->links() }}
				</div>
		    </div>
		  </div>
		</div>
	</div>
</div>

@endsection