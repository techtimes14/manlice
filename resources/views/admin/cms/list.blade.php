@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
	<div class="row">
		<div class="col-12 grid-margin">
		  <div class="card">
		    <div class="card-body">
		      <h4 class="card-title">Cms Page List</h4>
		      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	                @if(Session::has('alert-' . $msg))
	                    <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
	                @endif
	            @endforeach
		      <div class="page-description">
		      {!! Form::model($cms, ['route' => ['admin.cms.list'], 'class' => 'cmxform', 'method' => 'GET', 'novalidate'] ) !!}
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
			      		Searched for "{{ $request->search }}".&nbsp;&nbsp;<a href="{{ route('admin.cms.list') }}">Clear Search</a>
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
		                <?php /*<th class="sortStyle">
		                	{!! CustomPaginator::sort('slug', 'Url') !!}
		                </th>*/?>
		                <th class="sortStyle">
		                	{!! CustomPaginator::sort('created_at', 'Created') !!}
		                </th>
		                <th class="sortStyle">Status</th>
		                <th class="sortStyle">Action</th>
		              </tr>
		            </thead>
		            <tbody>
		            <?php $i = ($cms->currentPage() - 1) * $cms->perPage() + 1; ?>
		            	@if($cms->count() == 0)
							<tr>
								<td colspan="8">No records found!</td>
							</tr>
		            	@endif
		            	@foreach($cms as $key => $cms_page)
							<tr>
								<td>{{ $i + $key }}</td>
								<td>{{ $cms_page->title }}</td>
								<?php /*<td><a target="_blank" href="{{ URL::to('/').'/'.$cms_page->slug }}">{{ URL::to('/').'/'.$cms_page->slug }}</a></td>*/?>
								<td>{{ date('d/m/Y' , strtotime($cms_page->created_at)) }}</td>
								<td>
									<label class="badge @if($cms_page->is_block == 'N') badge-success @elseif($cms_page->is_block == 'Y') badge-danger @endif">
										@if($cms_page->is_block == 'Y')
											Blocked
										@elseif($cms_page->is_block == 'N')
											Active
										@endif
									</label>
								</td>
								<td>
									<a href="{{ route('admin.cms.edit', base64_encode($cms_page->id).'?redirect='.urlencode($request->fullUrl())) }}">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<?php /*<a onclick="return confirm('Are you sure you want to delete the CMS page?')" href="{{ route('admin.cms.delete', base64_encode($cms_page->id)) }}">
										<i class="fas fa-trash-alt"></i>
									</a>*/ ?>
									<a onclick="return confirm('Are you sure you want to block/unblock the CMS page?')" href="{{ route('admin.cms.status', [base64_encode($cms_page->id), $cms_page->is_block]) }}">
										@if($cms_page->is_block == 'Y')
											<i class="fas fa-lock"></i>
										@elseif($cms_page->is_block == 'N')
											<i class="fas fa-unlock"></i>
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
		     		Showing {{ $cms->firstItem() }} to {{ $cms->lastItem() }} of {{ $cms->total() }} entries
		     	</div>
		      	<div class="text-center-pagination">
					{{ $cms->appends(request()->input())->links() }}
				</div>
		    </div>
		  </div>
		</div>
	</div>
</div>

@endsection