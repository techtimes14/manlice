@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
	<div class="row">
		<div class="col-12 grid-margin">
		  <div class="card">
		    <div class="card-body">
		      <h4 class="card-title">Users List</h4>
		      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	                @if(Session::has('alert-' . $msg))
	                    <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
	                @endif
	            @endforeach
		      <div class="page-description">
		      {!! Form::model($users, ['route' => ['admin.user.list'], 'class' => 'cmxform', 'method' => 'GET', 'novalidate'] ) !!}
			      	<div class="input-group col-lg-3 col-md-3 col-sm-3 pull-right">
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
			      		Searched for "{{ $request->search }}".&nbsp;&nbsp;<a href="{{ route('admin.user.list') }}">Clear Search</a>
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
		                	{!! CustomPaginator::sort('first_name', 'First Name', ['direction' => true]) !!}
		                </th>
		                <th class="sortStyle">
		                	{!! CustomPaginator::sort('last_name', 'Last Name') !!}
		                </th>
		                <th class="sortStyle">
		                	{!! CustomPaginator::sort('email', 'Email') !!}
		                </th>
		                <th class="sortStyle">Mobile Number</th>
		                <th class="sortStyle">
		                	{!! CustomPaginator::sort('created_at', 'Created') !!}
		                </th>
		                <th class="sortStyle">Status</th>
		                <th class="sortStyle">Action</th>
		              </tr>
		            </thead>
		            <tbody>
		            <?php $i = ($users->currentPage() - 1) * $users->perPage() + 1; ?>
		            	@if($users->count() == 0)
							<tr>
								<td colspan="8">No records found!</td>
							</tr>
		            	@endif
		            	@foreach($users as $key => $user)
							<tr>
								<td>{{ $i + $key }}</td>
								<td>{{ $user->first_name }}</td>
								<td>{{ $user->last_name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ (isset($user->mobile) && !empty($user->mobile)) ? $user->mobile : 'N/A' }}</td>
								<td>{{ date('d/m/Y' , strtotime($user->created_at)) }}</td>
								<td>
									<label class="badge @if($user->is_block == 'N' && $user->status == 'A') badge-success @elseif($user->is_block == 'Y') badge-danger @elseif($user->is_block == 'N' && $user->status == 'I') badge-warning @endif">
										@if($user->is_block == 'Y')
											Blocked
										@elseif($user->is_block == 'N' && $user->status == 'A')
											Active
										@elseif($user->is_block == 'N' && $user->status == 'I')
											Inactive
										@endif
									</label>
								</td>
								<td>
									<a target="_blank" href="{{ route('admin.user.view', base64_encode($user->id)) }}">
										<i class="fas fa-eye"></i>
									</a>
									<a href="{{ route('admin.user.edit', base64_encode($user->id).'?redirect='.urlencode($request->fullUrl())) }}">
										<i class="fas fa-pencil-alt"></i>
									</a>
									<a onclick="return confirm('Are you sure you want to delete the user?')" href="{{ route('admin.user.delete', base64_encode($user->id)) }}">
										<i class="fas fa-trash-alt"></i>
									</a>
									<a onclick="return confirm('Are you sure you want to block/unblock the user?')" href="{{ route('admin.user.status', [base64_encode($user->id), $user->is_block]) }}">
										@if($user->is_block == 'Y')
											<i class="fas fa-lock"></i>
										@elseif($user->is_block == 'N')
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
		     		Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
		     	</div>
		      	<div class="text-center-pagination">
					{{ $users->appends(request()->input())->links() }}
				</div>
		    </div>
		  </div>
		</div>
	</div>
</div>

@endsection