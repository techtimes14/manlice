@extends('layouts.admin.app')

@section('content')

<style type="text/css">
.line_gap{line-height: 18px;}
.table th img, .table td img{border-radius: 0 !important; width: 70px; height: 75px;}
.table td img.gift_image{border-radius: 0 !important; width: 75px; height: auto;}
.orderData{ outline-style: dotted; }

.tbody_group{
	border: 1px solid #000000;
	background-color: #f5f4f4;
}
.table tbody + tbody {
    border-top: 24px solid #ffffff !important;
}

.tbody_group tr:first-child{
	border-top: 1px solid #000000;
}
</style>
<link rel="stylesheet" href="{{asset('css/admin/selectpicker/bootstrap-select.css')}}">
<script src="{{asset('js/admin/selectpicker/bootstrap-select.js')}}"></script>
<div class="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					@foreach (['danger', 'warning', 'success', 'info'] as $msg)
		                @if(Session::has('alert-' . $msg))
		                    <h4 class="font-weight-light alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</h4>
		                @endif
		            @endforeach
					<h4 class="card-title">{{ __('Assignment Order Data') }}</h4>
				<?php
				if( $order_dtl != null ) {
				?>
					<div class="row">
				        <div class="table-sorter-wrapper col-lg-12 table-responsive">
							<table id="sortable-table-2" class="table table-striped">
				            	<thead>				              		
				            	</thead>
				            	<tbody>
				            		<tr>
				            			<td><strong>Order ID: {{ $order_dtl->unique_order_id }}</strong></td>
				            			<td><strong>&nbsp;</strong></td>
				            		</tr>
				            		<tr>
				            			<td><strong>Purchase Date:
				            			@if( $order_dtl->purchase_date != '0000-00-00 00:00:00')
										 	{{ date('d/m/Y' , strtotime($order_dtl->purchase_date)) }}
										@endif
				            			</strong></td>
				            			<td><strong>&nbsp;</strong></td>
				            		</tr>
				            	</tbody>
				            </table>
				        </div>
				    </div>
				    <p>&nbsp;</p>
					<div class="row">
				        <div class="table-sorter-wrapper col-lg-12 table-responsive">
							<table id="sortable-table-2" class="table table-striped">
				            	<thead>
				              		<tr>
				                		<th class="sortStyle"><strong>Delivery Address</strong></th>
				                		<th class="sortStyle"><strong>Billing Address</strong></th>
				              		</tr>
				            	</thead>
				            	<tbody>
				            		<tr>
					            		<td>
					            			<p class="line_gap">
						            		<?php
						            		if( $order_dtl->delivery_user_name != NULL ) {
						            		?>
					            				<strong>
					            				{!! $order_dtl->delivery_user_name !!}
					            				</strong><br>
												{!! $order_dtl->delivery_address !!},<br>
												{!! $order_dtl->delivery_country !!},<br>
												{!! $order_dtl->delivery_city !!},<br>
												{!! $order_dtl->delivery_state !!} - {!! $order_dtl->delivery_pincode !!}<br>
												{!! $order_dtl->delivery_mobile !!}
											<?php
											}else{
												echo 'NA';
											}
											?>
											</p>
					            		</td>
					            		<td>
					            			<p class="line_gap">
					            			<?php
					            			if( $order_dtl->billing_user_name != NULL ) {
					            			?>
					            				<strong>
					            					{!! $order_dtl->billing_user_name !!}
				            					</strong><br>
												{!! $order_dtl->billing_address !!},<br>
												{!! $order_dtl->billing_country !!},<br>
												{!! $order_dtl->billing_city !!},<br>
												{!! $order_dtl->billing_state !!} - {!! $order_dtl->billing_pincode !!}<br>
												{!! $order_dtl->billing_mobile !!}
											<?php
											}else{
												echo 'NA';
											}
											?>
											</p>
					            		</td>
					            	</tr>
				            	</tbody>
				            </table>
				        </div>
				    </div>
				    <p>&nbsp;</p>

					<?php
					$total_cart_price = 0; $final_price = 0; $shipping_charges = 0; $payable = 0;

					if( count($cart_array) > 0 ) {
					?>
						<div class="row">
					        <div class="table-sorter-wrapper col-lg-12 table-responsive">
					          	<table id="sortable-table-2" class="table table-borderless">
					            	<thead>
					              		<tr>
					              			<th>&nbsp;</th>
					                		<th class="sortStyle">Image</th>
					                		<th class="sortStyle">Product</th>
					                		<th class="sortStyle">Send To</th>
					                		<th class="sortStyle">Price</th>
					                		<th class="sortStyle">Quantity</th>
					                		<th class="sortStyle">Total</th>
					              		</tr>
					            	</thead>
					            	<tbody>
					            	<?php
					            	$assign_status = '';
					            	foreach( $cart_array as $data ) {
					            	?>
					            	<?php
			            				$get_assignment_status = App\Http\Helper::getOrderAssignmentStatus($data['order_detail_id'],$data['product_id']);
			            				$assign_status = $get_assignment_status->status;
			            				if(isset($get_assignment_status->status)){
			            			?>
					            	<tbody class="tbody_group">
					            		<tr>
					            			<td class="stmpoutr">
					            			@if($get_assignment_status != null)
					            				@if($get_assignment_status->status == 'P')
					            					<img src="{{asset('images/pending.png')}}" alt="Pending" class="stampmark">
					            				@elseif($get_assignment_status->status == 'A')
					            					<img src="{{asset('images/accepted.png')}}" alt="Accepted" class="stampmark">
				            					@elseif($get_assignment_status->status == 'D')
					            					<img src="{{asset('images/delivered.png')}}" alt="Delivered" class="stampmark">
				            					@elseif($get_assignment_status->status == 'H')
					            					<img src="{{asset('images/hold.png')}}" alt="Assigned" class="stampmark">
					            				@endif
				            				@else
			            						<input type="checkbox" name="order_details_id[]" id="order_details_id" value="{{$data['order_detail_id']}}" >
					            			@endif
					            			</td>
						            		<td>
					            			@if( isset($data['gift_addon_id']) && $data['gift_addon_id'] == 0 )
		                                        @php //For product only @endphp
		                                        @if(isset($data['image']) && $data['image'] != null )
		                                            @if(file_exists(public_path('/uploaded/product/thumb/'.$data['image'])))
		                                                {!! '<img src="' . URL::to('/') . '/uploaded/product/thumb/' . $data['image'] . '" >' !!}
		                                            @else
		                                                {!! '<img src="' . URL::to('/').config('global.no_image_thumb') . '" >' !!}
		                                            @endif
		                                        @else
		                                            {!! '<img src="'.URL::to('/').config('global.no_image_thumb').'" >' !!}
		                                        @endif
		                                    @else
		                                        @php //For gift addon only @endphp
		                                        @if(isset($data['image']) && $data['image'] != null )
		                                            @if(file_exists(public_path('/uploaded/addon_gift/thumb/'.$data['image'])))
		                                                {!! '<img class="gift_image" src="' . URL::to('/') . '/uploaded/addon_gift/thumb/' . $data['image'] . '" >' !!}
		                                            @else
		                                                {!! '<img class="gift_image" src="' . URL::to('/').config('global.no_image_thumb') . '" >' !!}
		                                            @endif
		                                        @else
		                                            {!! '<img class="gift_image" src="'.URL::to('/').config('global.no_image_thumb').'" >' !!}
		                                        @endif
		                                    @endif
						            		</td>
						            		<td>
	                                            <p>
	                                            	{{ $data['product_name'] }}
		                                            <br />
		                                            <span class="nav-link">
		                                            @php
		                                            if( $data['attribute_name'] != '' ) {
		                                                echo '<small><a>('.$data['attribute_name'].')</a></small>';
		                                            }
		                                            echo '<br>';
		                                            if( $data['product_extra_addon_name'] != null ) {
		                                                echo '<small>';
		                                                $h=1;
		                                                foreach( $data['product_extra_addon_name'] as $key_extra_addon => $val_extra_addon ) {
		                                                    echo $val_extra_addon;
		                                                    if( $h < count($data['product_extra_addon_name']) ) {
		                                                        echo '<br />';
		                                                    }
		                                                    $h++;
		                                                }
		                                                echo '</small>';
		                                            }
		                                            @endphp
		                                            </span>
	                                            </p>
		                                    </td>
		                                    <td>
		                                        <p class="line_gap">
		                                        @php
		                                        if( isset($data['product_id']) && $data['product_id'] != 0 ) {
		                                            echo @$data['delivery_pincode'];
		                                            echo '<br><a>'.date('D, M d').', '.$data['deliverytime'].'</a><br>';
		                                            echo $data['shippingmethod_name'];
		                                        }
		                                        @endphp
		                                        </p>
		                                    </td>
		                                    <td>
		                                        <p>
		                                        <?php
		                                            echo Currency::orderCurrency($data['unit_price'], $order_dtl->id, ['need_currency' => true, 'number_format' => 2]);
		                                            
		                                            $total_cart_price = $total_cart_price + ( $data['unit_price'] * $data['qty'] );

		                                            $shipping_charges = $shipping_charges + $data['ship_price'];
		                                        ?>
		                                        </p>
		                                    </td>
		                                    <td>
		                                        <p>
		                                            {{ $data['qty'] }}
		                                        </p>
		                                    </td>
		                                    <td>
		                                        <p>
		                                        @php
		                                            echo Currency::orderCurrency($data['total_price'], $order_dtl->id, ['need_currency' => true, 'number_format' => 2]);
		                                        @endphp
		                                        </p>
		                                    </td>
						            	</tr>

						            	<?php 
					            		if(count($addon_gift_array)>0){
					            			foreach ($addon_gift_array as $key => $addon_value) {
					            				if($data['order_detail_id'] == $addon_value['order_details_id_giftaddon']){
						            	?>
						            		<tr>
						            		<td>&nbsp;</td>
							            		<td>
						            			@if( isset($addon_value['gift_addon_id']) && $addon_value['gift_addon_id'] == 0 )
			                                        @php //For product only @endphp
			                                        @if(isset($addon_value['image']) && $addon_value['image'] != null )
			                                            @if(file_exists(public_path('/uploaded/product/thumb/'.$addon_value['image'])))
			                                                {!! '<img src="' . URL::to('/') . '/uploaded/product/thumb/' . $addon_value['image'] . '" >' !!}
			                                            @else
			                                                {!! '<img src="' . URL::to('/').config('global.no_image_thumb') . '" >' !!}
			                                            @endif
			                                        @else
			                                            {!! '<img src="'.URL::to('/').config('global.no_image_thumb').'" >' !!}
			                                        @endif
			                                    @else
			                                        @php //For gift addon only @endphp
			                                        @if(isset($addon_value['image']) && $addon_value['image'] != null )
			                                            @if(file_exists(public_path('/uploaded/addon_gift/thumb/'.$addon_value['image'])))
			                                                {!! '<img class="gift_image" src="' . URL::to('/') . '/uploaded/addon_gift/thumb/' . $addon_value['image'] . '" >' !!}
			                                            @else
			                                                {!! '<img class="gift_image" src="' . URL::to('/').config('global.no_image_thumb') . '" >' !!}
			                                            @endif
			                                        @else
			                                            {!! '<img class="gift_image" src="'.URL::to('/').config('global.no_image_thumb').'" >' !!}
			                                        @endif
			                                    @endif
							            		</td>
							            		<td>
		                                            <p>
		                                            	{{ $addon_value['product_name'] }}
			                                            <br />
			                                            <span class="nav-link">
			                                            @php
			                                            if( $addon_value['attribute_name'] != '' ) {
			                                                echo '<small><a>('.$addon_value['attribute_name'].')</a></small>';
			                                            }
			                                            echo '<br>';
			                                            if( $addon_value['product_extra_addon_name'] != null ) {
			                                                echo '<small>';
			                                                $h=1;
			                                                foreach( $addon_value['product_extra_addon_name'] as $key_extra_addon => $val_extra_addon ) {
			                                                    echo $val_extra_addon;
			                                                    if( $h < count($addon_value['product_extra_addon_name']) ) {
			                                                        echo '<br />';
			                                                    }
			                                                    $h++;
			                                                }
			                                                echo '</small>';
			                                            }
			                                            @endphp
			                                            </span>
		                                            </p>
			                                    </td>
			                                    <td>
			                                        <p class="line_gap">
			                                        @php
			                                        if( isset($addon_value['product_id']) && $addon_value['product_id'] != 0 ) {
			                                            echo @$addon_value['delivery_pincode'];
			                                            echo '<br><a>'.date('D, M d').', '.$addon_value['deliverytime'].'</a><br>';
			                                            echo $addon_value['shippingmethod_name'];
			                                        }
			                                        @endphp
			                                        </p>
			                                    </td>
			                                    <td>
			                                        <p>
			                                        <?php
			                                            echo Currency::orderCurrency($addon_value['unit_price'], $order_dtl->id, ['need_currency' => true, 'number_format' => 2]);
			                                            
			                                            $total_cart_price = $total_cart_price + ( $addon_value['unit_price'] * $addon_value['qty'] );

			                                            $shipping_charges = $shipping_charges + $addon_value['ship_price'];
			                                        ?>
			                                        </p>
			                                    </td>
			                                    <td>
			                                        <p>
			                                            {{ $addon_value['qty'] }}
			                                        </p>
			                                    </td>
			                                    <td>
			                                        <p>
			                                        @php
			                                            echo Currency::orderCurrency($addon_value['total_price'], $order_dtl->id, ['need_currency' => true, 'number_format' => 2]);
			                                        @endphp
			                                        </p>
			                                    </td>
							            	</tr>
						            	<?php 
					            				}
					            			}
					            		}
						            	?>
						            	</tbody>
					            	<?php
					            		}
					            	}
					            	?>
					            		<tr>
					            			<td colspan="5"></td>
					            			<td>
					            				<strong>Grand Total</strong>
					            			</td>
					            			<td>
					            			<?php
					            				echo Currency::orderCurrency($total_cart_price, $order_dtl->id, ['need_currency' => true, 'number_format' => 2]);
		                                        $final_price = $total_cart_price + $final_price;
					            			?>
					            			</td>
					            		</tr>

					            		<?php
						            	if( $shipping_charges != 0 ) {
						            	?>
					            		<tr>
					            			<td colspan="5"></td>
					            			<td>
					            				<strong>Shipping Price</strong>
					            			</td>
					            			<td>
					            			<?php
					            				echo Currency::orderCurrency($shipping_charges, $order_dtl->id, ['need_currency' => true, 'number_format' => 2]);
		                                        $final_price = $final_price + $shipping_charges;
					            			?>
					            			</td>
					            		</tr>
						            	<?php
						            	}
						            	?>

					            		<!-- Coupon Section Start -->
					            		<?php
					            		/*$couponadata = App\Http\Helper::get_coupon_details($order_dtl->id);
        								if( $coupondata != null ) {
        								*/
        								if( $order_dtl->order_coupon_data != null ) {
        									$coupondata = $order_dtl->order_coupon_data;

        									$discount_amount = 0;
							                if( $coupondata != null ) {
							                    $discount_amount = $order_dtl->order_coupon_data->coupon_discount_amount;
							                }
        								?>
        								<tr>
        									<td colspan="5"></td>
					            			<td>
					            				<strong>Discount</strong>
					            			</td>
					            			<td>
        										<?php
        										$final_price = $final_price - $discount_amount;
												echo '<a style="margin-top: 5px;">'.Currency::orderCurrency($discount_amount, $order_dtl->id, ['need_currency' => true, 'number_format' => 2]).'</a>';
        										?>
        									</td>
        								</tr>
        								<?php
        								}
        								?>
					            		<!-- Coupon Section End -->
					            		<tr>
					            			<td colspan="5"></td>
					            			<td>
					            				<strong>Total</strong>
					            			</td>
					            			<td>
					            			<?php
					            				$payable = $final_price;
					            				echo '<a style="margin-top: 5px;">'.Currency::orderCurrency($payable, $order_dtl->id, ['need_currency' => true, 'number_format' => 2]).'</a>';
					            			?>
					            			</td>
					            		</tr>
					            		
					            	</tbody>
					            </table>
					        </div>
					    </div>
					    
					<?php
					}
				}else{
					echo 'No record found.';
				}
				?>
					{!! Form::model($oreder_assignment, ['route' => ['admin.orders.assign-order-details', base64_encode($order_dtl->id).'?redirect='.urlencode(Request::query('redirect'))], 'id' => 'order_assign', 'class' => 'cmxform', 'method' => 'PUT', 'novalidate'] ) !!}

					
						<div class="form-group">
							<label for="parent_id">{{ __('Status') }}<span class="text-danger">&#042;</span></label>
							{!! Form::select('status',$status_array, $assign_status,array('required','class'=>'form-control', 'id' => 'status')) !!}
							@if ($errors->has('status'))
								<span class="error">
									{{ $errors->first('status') }}
								</span>
							@endif
						</div>
						<div class="form-group msgSection">
							<label for="messages">{{ __('Message') }}<span class="text-danger">&#042;</span></label>
							{!! Form::textarea('messages', null, array('required', 'class'=>'form-control', 'placeholder' => __('Enter the text'), 'id' => 'messages')) !!}
							@if ($errors->has('messages'))
								<span class="error">
									{{ $errors->first('messages') }}
								</span>
							@endif
						</div>
					
					<p>&nbsp;</p><p>&nbsp;</p>
					<div class="row">
						<fieldset>
							<input class="btn btn-primary" type="submit" value="Submit">
							<a class="btn btn-info" href="{{ route('admin.orders.assigned-order-list') }}">Back</a>
						</fieldset>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
	//For checking messages section
	$('.msgSection').fadeOut();
	<?php
	if($assign_status == 'H'){
	?>
		$('.msgSection').fadeIn('slow');
		$('#messages').val('<?php echo $get_status->messages; ?>');
	<?php
	}
	?>
	$('#status').change(function(){
		var change_value = $(this).val();
		if(change_value == 'H'){
			$('.msgSection').fadeIn('slow');
		}
	});

	// validate the comment form when it is submitted
    $("#order_assign").validate({
    	
  	});
});
</script>
@endsection