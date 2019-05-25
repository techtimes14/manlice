<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>{{ config('global.website_title') }}</title>
    <style>
        *
        {
          padding:0;
          margin:0;
        }
        .container690
        {
            width:650px;
            margin:0 auto;
        }
        .imgsec
        {
            padding:36px 20px;
        }
        @media only screen and (max-width:1023px) {
            .container690
            {
                width:90%;
                margin:0 auto;
            }
            .imgsec img
            {
                width: 98%;
                margin: 0 5px 0 0;
                float: left;
                display: inline-block;
            }
            p{ font-size:14px!important; }
            .footcont p
            {
               font-size:10px!important; text-align:center;
            }
        }
    </style>
</head>

<body>
   	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container690">
	    <tr>
	        <td>
	            <table width="100%" border="0" bgcolor="#fcfcfc">
	                <tr>
                        <td style="padding:0 20px"><a href="{{url('/')}}">
	                	  <img src="{{asset('images/site/logo.png')}}" border="0" title="Flower" /></a>
                	    </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                <?php
                $total_cart_price = 0; $final_price = 0; $shipping_charges = 0; $payable = 0;

                if( count($order_details) > 0 ) {
                ?>
                    <tr>
                        <td><strong>Order ID: {{ $order_dtl->unique_order_id }}</strong></td>
                        <td><strong>&nbsp;</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Order Date:
                        @if( $order_dtl->purchase_date != '0000-00-00 00:00:00')
                            {{ date('d/m/Y' , strtotime($order_dtl->purchase_date)) }}
                        @endif
                        </strong></td>
                        <td><strong>&nbsp;</strong></td>
                    
                        <div class="row">
                            <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                <table id="sortable-table-2" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="sortStyle"><strong>Delivery Address</strong></th>
                                            <th class="sortStyle"><strong>Billing Address</strong></th>
                                        </tr>
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
                                                }
                                                ?>
                                                </p>
                                            </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                    </tr>


                    <tr>                    
                        <div class="row">
                            <div class="table-sorter-wrapper col-lg-12 table-responsive">
                                <table id="sortable-table-2" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="sortStyle">Product</th>
                                            <th class="sortStyle">Send To</th>
                                            <th class="sortStyle">Price</th>
                                            <th class="sortStyle">Quantity</th>
                                            <th class="sortStyle">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach( $order_details as $data ) {
                                    ?>
                                        <tr>
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
                                                @php
                                                    if( $order_dtl->order_currency != null ) {
                                                        echo '<span style="font-family: DejaVu Sans; sans-serif;">'.$order_dtl->order_currency->html_code.'</span>';
                                                    }
                                                    echo Currency::orderCurrency($data['unit_price'], $order_dtl->id, ['need_currency' => false, 'number_format' => 2]);

                                                    $total_cart_price = $total_cart_price + ( $data['unit_price'] * $data['qty'] );

                                                    $shipping_charges = $shipping_charges + $data['ship_price'];
                                                @endphp
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
                                                    if( $order_dtl->order_currency != null ) {
                                                        echo '<span style="font-family: DejaVu Sans; sans-serif;">'.$order_dtl->order_currency->html_code.'</span>';
                                                    }
                                                    echo Currency::orderCurrency($data['total_price'], $order_dtl->id, ['need_currency' => false, 'number_format' => 2]);
                                                @endphp
                                                </p>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td>
                                                <strong>Grand Total</strong>
                                            </td>
                                            <td>
                                            <?php
                                            if( $order_dtl->order_currency != null ) {
                                                echo '<span style="font-family: DejaVu Sans; sans-serif;">'.$order_dtl->order_currency->html_code.'</span>';
                                            }
                                                echo Currency::orderCurrency($total_cart_price, $order_dtl->id, ['need_currency' => false, 'number_format' => 2]);

                                                $final_price = $total_cart_price + $final_price;
                                            ?>
                                            </td>
                                        </tr>
                                    <?php
                                    if( $shipping_charges != 0 ) {
                                    ?>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td>
                                                <strong>Shipping Price</strong>
                                            </td>
                                            <td>
                                            <?php
                                            if( $order_dtl->order_currency != null ) {
                                                echo '<span style="font-family: DejaVu Sans; sans-serif;">'.$order_dtl->order_currency->html_code.'</span>';
                                            }
                                                echo Currency::orderCurrency($shipping_charges, $order_dtl->id, ['need_currency' => false, 'number_format' => 2]);

                                                $final_price = $final_price + $shipping_charges;
                                            ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                        <!-- Coupon Section Start -->
                                        <?php
                                        /*$coupondata = App\Http\Helper::get_coupon_details($order_dtl->id);
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
                                            <td colspan="4"></td>
                                            <td>
                                                <strong>Discount</strong>
                                            </td>
                                            <td>
                                            <?php
                                            $final_price = $final_price - $discount_amount;

                                            if( $order_dtl->order_currency != null ) {
                                                echo '<span style="font-family: DejaVu Sans; sans-serif;">'.$order_dtl->order_currency->html_code.'</span>';
                                            }
                                                echo Currency::orderCurrency($discount_amount, $order_dtl->id, ['need_currency' => false, 'number_format' => 2]);
                                            ?>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                        <!-- Coupon Section End -->
                                        <tr>
                                            <td colspan="4"></td>
                                            <td>
                                                <strong>Total</strong>
                                            </td>
                                            <td>
                                            <?php
                                            $payable = $final_price;

                                            if( $order_dtl->order_currency != null ) {
                                                echo '<span style="font-family: DejaVu Sans; sans-serif;">'.$order_dtl->order_currency->html_code.'</span>';
                                            }
                                                echo Currency::orderCurrency($payable, $order_dtl->id, ['need_currency' => false, 'number_format' => 2]);
                                            ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                    </tr>
                <?php
                }
                ?>
	            </table>
	        </td>
	    </tr>
	</table>
</body>
</html>