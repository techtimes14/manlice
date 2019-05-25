<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Auth;
use App\Model\User;
use App\Model\Currency;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\Product;
use App\Model\ProductExtra;
use App\Model\Pincode;
use App\Model\ProductRelatedCityGroup;
use App\Model\ProductRelatedRestrictedPincodeGroup;
use App\Model\ProductExtraAddonGroupRelation;
use App\Model\ProductRelatedGiftAddonGroup;
use App\Model\GiftAddonGroupRelation;
use App\Model\OrderAssignAgent;
use App\Model\GiftAddon;
use App\Model\ProductShipping;
use App\Model\DeliveryTiming;
use App\Model\ShippingMethod;
use App\Model\Setting;
use Illuminate\Support\Facades\DB;
use PDF;

class OrdersController extends CommonController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        /* check permission */
        if($this->checkPermission('orders','list') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        $orWhere = array();
        $where = ['type'=>'order'];
        // search confitions
        if($request->search != null){
            $orWhere[] = ['unique_order_id', 'LIKE', '%'.$request->search.'%'];
        }
        $order_list = Order::where($where)
                                        ->where(function($query) use ($orWhere){
                                            // creating "OR" queries for search
                                            foreach($orWhere as $key => $where){
                                                if($key == 0){
                                                    $query->where([$where]);
                                                }else{
                                                    $query->orWhere([$where]);
                                                }
                                            }
                                        })
                                        ->when($request->sort && $request->direction, function($query) use ($request){
                                            $query->orderBy($request->sort, $request->direction);
                                        }, function($query){
                                            $query->orderBy('created_at', 'desc');
                                        })
                                        ->paginate(20);
        return view('admin.orders.list', ['order_list' => $order_list, 'request' => $request]);
    }

    
    /**
     * Show the listing for assignment order list.
     *
     * @return \Illuminate\Http\Response
     */
    public function assigned_order_list(Request $request)
    {
        /* check permission */
        if($this->checkPermission('orders','assignment_order_list') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        $user_id = Auth::guard('admin')->user()->id;
       
        $orWhere = array();
        $where = ['assign_agent_id'=>$user_id];
        // search confitions
        if($request->search != null){
            $orWhere[] = ['unique_order_id', 'LIKE', '%'.$request->search.'%'];
        }
        $order_list = OrderAssignAgent::where($where)
                                        ->where(function($query) use ($orWhere){
                                            // creating "OR" queries for search
                                            foreach($orWhere as $key => $where){
                                                if($key == 0){
                                                    $query->where([$where]);
                                                }else{
                                                    $query->orWhere([$where]);
                                                }
                                            }
                                        })
                                        ->when($request->sort && $request->direction, function($query) use ($request){
                                            $query->orderBy($request->sort, $request->direction);
                                        }, function($query){
                                            $query->orderBy('created_at', 'desc');
                                        })
                                        ->groupBy('order_id')
                                        ->paginate(20);
        return view('admin.orders.assignment_order_list', ['order_list' => $order_list, 'request' => $request,'user_id'=>$user_id]);
    }

    /**
     * View Assignment Order Details
     *
     * @return \Illuminate\Http\Response
     */
    public function assign_order_details($id = null, Request $request)
    {
        /* check permission */
        if($this->checkPermission('orders','assign_order_details') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        $oreder_assignment = new OrderAssignAgent;
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);

        $user_id = Auth::guard('admin')->user()->id;
        $assignment_order_details_id = OrderAssignAgent::where(['assign_agent_id'=>$user_id,'order_id'=>$id])->pluck('order_details_id')->toArray();

        $order_dtl = Order::find($id);

        $total_cart_price = 0.00; $occasion_product_price = 0;
        
        $cart_array = array();
        if( $order_dtl != null ) {
            if( isset($order_dtl->order_detail_admin) && count($order_dtl->order_detail_admin) > 0 ) {
                $i = 0;
                foreach( $order_dtl->order_detail_admin as $productLists ) {
                   
                    $extra_addon_array = []; $extra_addon_ids_array = [];
                    //if(in_array($productLists->id, $assignment_order_details_id)){

                        //If Extra Addons NOT exist
                        if( $productLists->order_details_id == 0 ) {
                            //If Gift Addons NOT exist
                            if( $productLists->gift_addon_id == 0 ) {

                                $product_image_name = '';
                                if( isset($productLists->product->default_product_image) && $productLists->product->default_product_image != null ) {
                                    $product_image_name = $productLists->product->default_product_image['name'];
                                }
                                $cart_array[$i]['order_detail_id']  = $productLists->id;
                                $cart_array[$i]['category_id']      = $productLists->category_id;
                                $cart_array[$i]['occasion_id']      = $productLists->occasion_id;
                                $cart_array[$i]['product_id']       = $productLists->product->id;
                                $cart_array[$i]['product_attr_id']  = $productLists->product_attr_id;
                                $cart_array[$i]['gift_addon_id']    = $productLists->gift_addon_id;
                                $cart_array[$i]['product_name']     = $productLists->product->product_name;
                                $cart_array[$i]['image']            = $product_image_name;
                                $cart_array[$i]['qty']              = $productLists->qty;

                                $cart_array[$i]['delivery_pincode'] = $productLists->delivery_pincode;
                                $cart_array[$i]['delivery_date']    = $productLists->delivery_date;
                                $cart_array[$i]['shippingmethod_id']= $productLists->shippingmethod_id;
                                $cart_array[$i]['shippingmethod_name']= $productLists->shippingmethod_name;
                                $cart_array[$i]['ship_price']       = $productLists->ship_price;
                                $cart_array[$i]['delivery_time_id'] = $productLists->delivery_time_id;
                                $cart_array[$i]['deliverytime']     = $productLists->deliverytime;
                                $cart_array[$i]['order_details_id_giftaddon']     = $productLists->order_details_id_giftaddon;

                                //If product attribute exist
                                //if(isset($productLists->product->order_product_all_attributes) && $productLists->product->order_product_all_attributes != null){
                                if( $productLists->product_attr_id != 0 ) {
                                    foreach ( $productLists->product->order_product_all_attributes as $key => $value) {
                                        if( $value->id == $productLists->product_attr_id ) {
                                            $cart_array[$i]['attribute_name'] = $value->title;
                                        }
                                    }
                                }else{
                                    $cart_array[$i]['attribute_name'] = '';
                                }
                                //$productLists->order_detail_admin_agent_extraaddon

                                //If extra addon exists
                                if( isset($productLists->order_related_detail) && ($productLists->order_related_detail != null) ) {
                                    if( $productLists->order_related_detail->product_extras_addon_id != '' ) {

                                        if( strpos($productLists->order_related_detail->product_extras_addon_id, ',') !== false ) { //For multiple extra addon
                                            $extra_array  = explode(',', $productLists->order_related_detail->product_extras_addon_id);
                                            asort($extra_array);
                                            foreach ( $extra_array as $key_extra => $val_extra ) {
                                                $get_pro_extra = ProductExtra::where('id',$val_extra)->first();

                                                $extra_addon_array[]     = $get_pro_extra['title'];
                                                $extra_addon_ids_array[] = $get_pro_extra['id'];
                                            }
                                        }else{  //For single extra addon
                                            $get_pro_extra = ProductExtra::where('id',$productLists->order_related_detail->product_extras_addon_id)->first();

                                                $extra_addon_array[]     = $get_pro_extra['title'];
                                                $extra_addon_ids_array[] = $get_pro_extra['id'];
                                        }
                                    }

                                    asort($extra_addon_ids_array);
                                    $cart_array[$i]['product_extra_addon_name'] = $extra_addon_array;
                                    $cart_array[$i]['product_extra_addon_ids']  = $extra_addon_ids_array;

                                    $cart_array[$i]['product_unit_price']       = $productLists->unit_price;

                                    $cart_array[$i]['unit_price']       = $productLists->unit_price + $productLists->order_related_detail->unit_price;
                                    $cart_array[$i]['total_price']      = $productLists->total_price + $productLists->order_related_detail->total_price;
                                    $total_cart_price                   = $total_cart_price + $productLists->total_price + $productLists->order_related_detail->total_price;

                                    //For occasion related product (Total Price)//
                                    if( $productLists->product->occasions_id != null ) {
                                        $occasion_product_price = $occasion_product_price + $productLists->unit_price + $productLists->order_related_detail->total_price;
                                    }
                                    //For occasion related product (Total Price)//
                                }
                                else{   //If NOT extra addon exists
                                    $cart_array[$i]['product_extra_addon_name'] = $extra_addon_array;
                                    $cart_array[$i]['product_extra_addon_ids']  = $extra_addon_ids_array;
                                    $cart_array[$i]['product_unit_price']       = $productLists->unit_price;
                                    $cart_array[$i]['unit_price']               = $productLists->unit_price;
                                    $cart_array[$i]['total_price']              = $productLists->total_price;
                                    $total_cart_price                           = $total_cart_price + $productLists->total_price;

                                    //For occasion related product (Total Price)//
                                    if( $productLists->product->occasions_id != null ) {
                                        $occasion_product_price = $occasion_product_price + $productLists->total_price;
                                    }
                                    //For occasion related product (Total Price)//
                                }
                            }
                            else{   //If Gift Addons exist
                                $giftaddon_image_name = '';
                                $giftaddon_image_name = $productLists->gift_addon_detail->image;
                                
                                $cart_array[$i]['order_detail_id']  = $productLists->id;
                                $cart_array[$i]['category_id']      = $productLists->category_id;
                                $cart_array[$i]['occasion_id']      = $productLists->occasion_id;
                                $cart_array[$i]['product_id']       = $productLists->product_id;
                                $cart_array[$i]['product_attr_id']  = $productLists->product_attr_id;
                                $cart_array[$i]['gift_addon_id']    = $productLists->gift_addon_id;
                                $cart_array[$i]['product_name']     = $productLists->gift_addon_detail->title;
                                $cart_array[$i]['image']            = $giftaddon_image_name;
                                $cart_array[$i]['qty']              = $productLists->qty;

                                $cart_array[$i]['delivery_pincode'] = $productLists->delivery_pincode;
                                $cart_array[$i]['delivery_date']    = $productLists->delivery_date;
                                $cart_array[$i]['shippingmethod_id']= $productLists->shippingmethod_id;
                                $cart_array[$i]['shippingmethod_name']= $productLists->shippingmethod_name;
                                $cart_array[$i]['ship_price']       = $productLists->ship_price;
                                $cart_array[$i]['delivery_time_id'] = $productLists->delivery_time_id;
                                $cart_array[$i]['deliverytime']     = $productLists->deliverytime;
                                $cart_array[$i]['order_details_id_giftaddon']     = $productLists->order_details_id_giftaddon;

                                //If product attribute exist
                                if(isset($productLists->product->order_product_attribute) && $productLists->product->order_product_attribute['title'] != null){
                                    $cart_array[$i]['attribute_name']=$productLists->product->order_product_attribute['title'];
                                }
                                else{
                                    $cart_array[$i]['attribute_name'] = '';
                                }

                                $cart_array[$i]['product_extra_addon_name'] = $extra_addon_array;
                                $cart_array[$i]['product_extra_addon_ids']  = $extra_addon_ids_array;

                                $cart_array[$i]['product_unit_price']= $productLists->unit_price;
                                $cart_array[$i]['unit_price']       = $productLists->unit_price;
                                $cart_array[$i]['total_price']      = $productLists->total_price;
                                $total_cart_price                   = $total_cart_price+$productLists->total_price;
                            }
                        }   //If Extra Addons NOT exist condition end here
                        $i++;
                        unset($extra_addon_array); unset($extra_addon_ids_array);
                    //}
                }
            }
            //dd($cart_array);
        }

        $addon_gift_array = [];
        if(count($cart_array)>0){
            foreach ($cart_array as $key => $cart_product) {
                if($cart_product['gift_addon_id'] >0){
                    unset($cart_array[$key]);
                    $addon_gift_array[] = $cart_product;
                }
            }
        }
        /* Update status of assign data */
        if($request->isMethod('PUT')){
            if(OrderAssignAgent::where(['order_id' => $id,'assign_agent_id'=>$user_id])->update(['status' => $request->status,'messages'=>$request->messages])){

                $request->session()->flash('alert-success', 'successfully updated');
                return redirect()->back();
            }else{
                $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back();
            }
        }

        $status_array = array('P'=>'Pending','A'=>'Accepted','D'=>'Delivery','H'=>'Hold');
        $get_status = OrderAssignAgent::where(['order_id'=>$id,'assign_agent_id'=>$user_id])->select('status','messages')->first();
        if($get_status != null){
            if($get_status->status == 'P'){
                $status_array = array('P'=>'Pending','A'=>'Accepted','D'=>'Delivery','H'=>'Hold');
            }elseif($get_status->status == 'A'){
                $status_array = array('A'=>'Accepted','D'=>'Delivery','H'=>'Hold');
            }elseif($get_status->status == 'H'){
                $status_array = array('A'=>'Accepted','D'=>'Delivery','H'=>'Hold');
            }elseif($get_status->status == 'D'){
                $status_array = array('D'=>'Delivery');
            }
        }

        return view('admin.orders.assign_order_details', ['order_dtl' => $order_dtl, 'cart_array' => $cart_array, 'addon_gift_array' => $addon_gift_array,'status_array'=>$status_array,'oreder_assignment'=>$oreder_assignment,'get_status'=>$get_status]);
    }
    
    /**
     * View Order Details
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id = null, Request $request)
    {
        /* check permission */
        if($this->checkPermission('orders','view') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }

        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);

        $order_dtl = Order::find($id);

        $total_cart_price = 0.00; $occasion_product_price = 0;
        
        $cart_array = array();
        if( $order_dtl != null ) {
            if( isset($order_dtl->order_detail_admin) && count($order_dtl->order_detail_admin) > 0 ) {

                $i = 0;
                foreach( $order_dtl->order_detail_admin as $productLists ) {

                    $extra_addon_array = []; $extra_addon_ids_array = [];
                    //If Extra Addons NOT exist
                    if( $productLists->order_details_id == 0 ) {
                        //If Gift Addons NOT exist
                        if( $productLists->gift_addon_id == 0 ) {

                            $product_image_name = '';
                            if( isset($productLists->product->default_product_image) && $productLists->product->default_product_image != null ) {
                                $product_image_name = $productLists->product->default_product_image['name'];
                            }
                            $cart_array[$i]['order_detail_id']  = $productLists->id;
                            $cart_array[$i]['category_id']      = $productLists->category_id;
                            $cart_array[$i]['occasion_id']      = $productLists->occasion_id;
                            $cart_array[$i]['product_id']       = $productLists->product->id;
                            $cart_array[$i]['product_attr_id']  = $productLists->product_attr_id;
                            $cart_array[$i]['gift_addon_id']    = $productLists->gift_addon_id;
                            $cart_array[$i]['product_name']     = $productLists->product->product_name;
                            $cart_array[$i]['image']            = $product_image_name;
                            $cart_array[$i]['qty']              = $productLists->qty;

                            $cart_array[$i]['delivery_pincode'] = $productLists->delivery_pincode;
                            $cart_array[$i]['delivery_date']    = $productLists->delivery_date;
                            $cart_array[$i]['shippingmethod_id']= $productLists->shippingmethod_id;
                            $cart_array[$i]['shippingmethod_name']= $productLists->shippingmethod_name;
                            $cart_array[$i]['ship_price']       = $productLists->ship_price;
                            $cart_array[$i]['delivery_time_id'] = $productLists->delivery_time_id;
                            $cart_array[$i]['deliverytime']     = $productLists->deliverytime;
                            $cart_array[$i]['order_details_id_giftaddon']     = $productLists->order_details_id_giftaddon;

                            //If product attribute exist
                            //if(isset($productLists->product->order_product_all_attributes) && $productLists->product->order_product_all_attributes != null){
                            if( $productLists->product_attr_id != 0 ) {
                                foreach ( $productLists->product->order_product_all_attributes as $key => $value) {
                                    if( $value->id == $productLists->product_attr_id ) {
                                        $cart_array[$i]['attribute_name'] = $value->title;
                                    }
                                }
                            }
                            else{
                                $cart_array[$i]['attribute_name'] = '';
                            }

                            //If extra addon exists
                            if( isset($productLists->order_related_detail) && ($productLists->order_related_detail != null) ) {

                                if( $productLists->order_related_detail->product_extras_addon_id != '' ) {
                                    if( strpos($productLists->order_related_detail->product_extras_addon_id, ',') !== false ) { //For multiple extra addon
                                        $extra_array  = explode(',', $productLists->order_related_detail->product_extras_addon_id);
                                        asort($extra_array);
                                        foreach ( $extra_array as $key_extra => $val_extra ) {
                                            $get_pro_extra = ProductExtra::where('id',$val_extra)->first();

                                            $extra_addon_array[]     = $get_pro_extra['title'];
                                            $extra_addon_ids_array[] = $get_pro_extra['id'];
                                        }
                                    }else{  //For single extra addon
                                        $get_pro_extra = ProductExtra::where('id',$productLists->order_related_detail->product_extras_addon_id)->first();

                                            $extra_addon_array[]     = $get_pro_extra['title'];
                                            $extra_addon_ids_array[] = $get_pro_extra['id'];
                                    }
                                }
                                asort($extra_addon_ids_array);
                                $cart_array[$i]['product_extra_addon_name'] = $extra_addon_array;
                                $cart_array[$i]['product_extra_addon_ids']  = $extra_addon_ids_array;

                                $cart_array[$i]['product_unit_price']       = $productLists->unit_price;

                                $cart_array[$i]['unit_price']       = $productLists->unit_price + $productLists->order_related_detail->unit_price;
                                $cart_array[$i]['total_price']      = $productLists->total_price + $productLists->order_related_detail->total_price;
                                $total_cart_price                   = $total_cart_price + $productLists->total_price + $productLists->order_related_detail->total_price;

                                //For occasion related product (Total Price)//
                                if( $productLists->product->occasions_id != null ) {
                                    $occasion_product_price = $occasion_product_price + $productLists->unit_price + $productLists->order_related_detail->total_price;
                                }
                                //For occasion related product (Total Price)//
                            }
                            else{   //If NOT extra addon exists
                                $cart_array[$i]['product_extra_addon_name'] = $extra_addon_array;
                                $cart_array[$i]['product_extra_addon_ids']  = $extra_addon_ids_array;
                                $cart_array[$i]['product_unit_price']       = $productLists->unit_price;
                                $cart_array[$i]['unit_price']               = $productLists->unit_price;
                                $cart_array[$i]['total_price']              = $productLists->total_price;
                                $total_cart_price                           = $total_cart_price + $productLists->total_price;

                                //For occasion related product (Total Price)//
                                if( $productLists->product->occasions_id != null ) {
                                    $occasion_product_price = $occasion_product_price + $productLists->total_price;
                                }
                                //For occasion related product (Total Price)//
                            }
                        }
                        else{   //If Gift Addons exist
                            $giftaddon_image_name = '';
                            $giftaddon_image_name = $productLists->gift_addon_detail->image;
                            
                            $cart_array[$i]['order_detail_id']  = $productLists->id;
                            $cart_array[$i]['category_id']      = $productLists->category_id;
                            $cart_array[$i]['occasion_id']      = $productLists->occasion_id;
                            $cart_array[$i]['product_id']       = $productLists->product_id;
                            $cart_array[$i]['product_attr_id']  = $productLists->product_attr_id;
                            $cart_array[$i]['gift_addon_id']    = $productLists->gift_addon_id;
                            $cart_array[$i]['product_name']     = $productLists->gift_addon_detail->title;
                            $cart_array[$i]['image']            = $giftaddon_image_name;
                            $cart_array[$i]['qty']              = $productLists->qty;

                            $cart_array[$i]['delivery_pincode'] = $productLists->delivery_pincode;
                            $cart_array[$i]['delivery_date']    = $productLists->delivery_date;
                            $cart_array[$i]['shippingmethod_id']= $productLists->shippingmethod_id;
                            $cart_array[$i]['shippingmethod_name']= $productLists->shippingmethod_name;
                            $cart_array[$i]['ship_price']       = $productLists->ship_price;
                            $cart_array[$i]['delivery_time_id'] = $productLists->delivery_time_id;
                            $cart_array[$i]['deliverytime']     = $productLists->deliverytime;
                            $cart_array[$i]['order_details_id_giftaddon']     = $productLists->order_details_id_giftaddon;

                            //If product attribute exist
                            if(isset($productLists->product->order_product_attribute) && $productLists->product->order_product_attribute['title'] != null){
                                $cart_array[$i]['attribute_name']=$productLists->product->order_product_attribute['title'];
                            }
                            else{
                                $cart_array[$i]['attribute_name'] = '';
                            }

                            $cart_array[$i]['product_extra_addon_name'] = $extra_addon_array;
                            $cart_array[$i]['product_extra_addon_ids']  = $extra_addon_ids_array;

                            $cart_array[$i]['product_unit_price']= $productLists->unit_price;
                            $cart_array[$i]['unit_price']       = $productLists->unit_price;
                            $cart_array[$i]['total_price']      = $productLists->total_price;
                            $total_cart_price                   = $total_cart_price+$productLists->total_price;
                        }
                    }   //If Extra Addons NOT exist condition end here
                    $i++;
                    unset($extra_addon_array); unset($extra_addon_ids_array);
                }
            }
            //dd($cart_array);
        }

        $addon_gift_array = [];
        if(count($cart_array)>0){
            foreach ($cart_array as $key => $cart_product) {
                if($cart_product['gift_addon_id'] >0){
                    unset($cart_array[$key]);
                    $addon_gift_array[] = $cart_product;
                }
            }
        }
        // echo '<pre>';
        // print_r($cart_array);

        // echo '<pre>';
        // print_r($addon_gift_array);
        // exit;
        $agent_list = User::where(['user_type'=>'AG','status'=>'A','is_block'=>'N'])->pluck('users.name', 'users.id');
        return view('admin.orders.view', ['order_dtl' => $order_dtl, 'cart_array' => $cart_array, 'addon_gift_array' => $addon_gift_array,'agent_list'=>$agent_list]);
    }


    /* Generate Invoice */
    public function generateInvoice( $order_id = null, Request $request ) {
        /* check permission */
        if($this->checkPermission('orders','list') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }

        $orderid   = base64_decode($order_id);
        $order_dtl = Order::where(['id'=>$orderid])->first();

        $order_details = $this->order_dtl($orderid);        

        $generate_pdf =PDF::loadView('admin.orders.generate_invoice',compact('order_details','order_dtl'))->setPaper('a4');

        return $generate_pdf->download($order_dtl->unique_order_id.'.pdf');
        
        return view('admin.orders.generate_invoice');
    }


    //Get order detail data//
    public function order_dtl($id = null) {
        $order_dtl = Order::find($id);
        $total_cart_price = 0.00; $occasion_product_price = 0;
        
        $cart_detail_array = array();
        if( $order_dtl != null ) {
            if( isset($order_dtl->order_detail_admin) && count($order_dtl->order_detail_admin) > 0 ) {

                $i = 0;
                foreach( $order_dtl->order_detail_admin as $productLists ) {

                    $extra_addon_array = []; $extra_addon_ids_array = [];
                    //If Extra Addons NOT exist
                    if( $productLists->order_details_id == 0 ) {
                        //If Gift Addons NOT exist
                        if( $productLists->gift_addon_id == 0 ) {

                            $product_image_name = '';
                            if( isset($productLists->product->default_product_image) && $productLists->product->default_product_image != null ) {
                                $product_image_name = $productLists->product->default_product_image['name'];
                            }
                            $cart_detail_array[$i]['order_detail_id']  = $productLists->id;
                            $cart_detail_array[$i]['category_id']      = $productLists->category_id;
                            $cart_detail_array[$i]['occasion_id']      = $productLists->occasion_id;
                            $cart_detail_array[$i]['product_id']       = $productLists->product->id;
                            $cart_detail_array[$i]['product_attr_id']  = $productLists->product_attr_id;
                            $cart_detail_array[$i]['gift_addon_id']    = $productLists->gift_addon_id;
                            $cart_detail_array[$i]['product_name']     = $productLists->product->product_name;
                            $cart_detail_array[$i]['image']            = $product_image_name;
                            $cart_detail_array[$i]['qty']              = $productLists->qty;

                            $cart_detail_array[$i]['delivery_pincode'] = $productLists->delivery_pincode;
                            $cart_detail_array[$i]['delivery_date']    = $productLists->delivery_date;
                            $cart_detail_array[$i]['shippingmethod_id']= $productLists->shippingmethod_id;
                            $cart_detail_array[$i]['shippingmethod_name']= $productLists->shippingmethod_name;
                            $cart_detail_array[$i]['ship_price']       = $productLists->ship_price;
                            $cart_detail_array[$i]['delivery_time_id'] = $productLists->delivery_time_id;
                            $cart_detail_array[$i]['deliverytime']     = $productLists->deliverytime;

                            //If product attribute exist
                            if( $productLists->product_attr_id != 0 ) {
                                foreach ( $productLists->product->order_product_all_attributes as $key => $value) {
                                    if( $value->id == $productLists->product_attr_id ) {
                                        $cart_detail_array[$i]['attribute_name'] = $value->title;
                                    }
                                }
                            }else{
                                $cart_detail_array[$i]['attribute_name'] = '';
                            }

                            //If extra addon exists
                            if( isset($productLists->order_related_detail) && ($productLists->order_related_detail != null) ) {

                                if( $productLists->order_related_detail->product_extras_addon_id != '' ) {
                                    if( strpos($productLists->order_related_detail->product_extras_addon_id, ',') !== false ) { //For multiple extra addon
                                        $extra_array  = explode(',', $productLists->order_related_detail->product_extras_addon_id);
                                        asort($extra_array);
                                        foreach ( $extra_array as $key_extra => $val_extra ) {
                                            $get_pro_extra = ProductExtra::where('id',$val_extra)->first();

                                            $extra_addon_array[]     = $get_pro_extra['title'];
                                            $extra_addon_ids_array[] = $get_pro_extra['id'];
                                        }
                                    }else{  //For single extra addon
                                        $get_pro_extra = ProductExtra::where('id',$productLists->order_related_detail->product_extras_addon_id)->first();

                                            $extra_addon_array[]     = $get_pro_extra['title'];
                                            $extra_addon_ids_array[] = $get_pro_extra['id'];
                                    }
                                }
                                asort($extra_addon_ids_array);
                                $cart_detail_array[$i]['product_extra_addon_name'] = $extra_addon_array;
                                $cart_detail_array[$i]['product_extra_addon_ids']  = $extra_addon_ids_array;

                                $cart_detail_array[$i]['product_unit_price']       = $productLists->unit_price;

                                $cart_detail_array[$i]['unit_price']       = $productLists->unit_price + $productLists->order_related_detail->unit_price;
                                $cart_detail_array[$i]['total_price']      = $productLists->total_price + $productLists->order_related_detail->total_price;
                                $total_cart_price                   = $total_cart_price + $productLists->total_price + $productLists->order_related_detail->total_price;

                                //For occasion related product (Total Price)//
                                if( $productLists->product->occasions_id != null ) {
                                    $occasion_product_price = $occasion_product_price + $productLists->unit_price + $productLists->order_related_detail->total_price;
                                }
                                //For occasion related product (Total Price)//
                            }
                            else{   //If NOT extra addon exists
                                $cart_detail_array[$i]['product_extra_addon_name'] = $extra_addon_array;
                                $cart_detail_array[$i]['product_extra_addon_ids']  = $extra_addon_ids_array;
                                $cart_detail_array[$i]['product_unit_price']       = $productLists->unit_price;
                                $cart_detail_array[$i]['unit_price']               = $productLists->unit_price;
                                $cart_detail_array[$i]['total_price']              = $productLists->total_price;
                                $total_cart_price                           = $total_cart_price + $productLists->total_price;

                                //For occasion related product (Total Price)//
                                if( $productLists->product->occasions_id != null ) {
                                    $occasion_product_price = $occasion_product_price + $productLists->total_price;
                                }
                                //For occasion related product (Total Price)//
                            }
                        }
                        else{   //If Gift Addons exist
                            $giftaddon_image_name = '';
                            $giftaddon_image_name = $productLists->gift_addon_detail->image;
                            
                            $cart_detail_array[$i]['order_detail_id']  = $productLists->id;
                            $cart_detail_array[$i]['category_id']      = $productLists->category_id;
                            $cart_detail_array[$i]['occasion_id']      = $productLists->occasion_id;
                            $cart_detail_array[$i]['product_id']       = $productLists->product_id;
                            $cart_detail_array[$i]['product_attr_id']  = $productLists->product_attr_id;
                            $cart_detail_array[$i]['gift_addon_id']    = $productLists->gift_addon_id;
                            $cart_detail_array[$i]['product_name']     = $productLists->gift_addon_detail->title;
                            $cart_detail_array[$i]['image']            = $giftaddon_image_name;
                            $cart_detail_array[$i]['qty']              = $productLists->qty;

                            $cart_detail_array[$i]['delivery_pincode'] = $productLists->delivery_pincode;
                            $cart_detail_array[$i]['delivery_date']    = $productLists->delivery_date;
                            $cart_detail_array[$i]['shippingmethod_id']= $productLists->shippingmethod_id;
                            $cart_detail_array[$i]['shippingmethod_name']= $productLists->shippingmethod_name;
                            $cart_detail_array[$i]['ship_price']       = $productLists->ship_price;
                            $cart_detail_array[$i]['delivery_time_id'] = $productLists->delivery_time_id;
                            $cart_detail_array[$i]['deliverytime']     = $productLists->deliverytime;

                            //If product attribute exist
                            if(isset($productLists->product->order_product_attribute) && $productLists->product->order_product_attribute['title'] != null){
                                $cart_detail_array[$i]['attribute_name']=$productLists->product->order_product_attribute['title'];
                            }
                            else{
                                $cart_detail_array[$i]['attribute_name'] = '';
                            }

                            $cart_detail_array[$i]['product_extra_addon_name'] = $extra_addon_array;
                            $cart_detail_array[$i]['product_extra_addon_ids']  = $extra_addon_ids_array;

                            $cart_detail_array[$i]['product_unit_price']= $productLists->unit_price;
                            $cart_detail_array[$i]['unit_price']       = $productLists->unit_price;
                            $cart_detail_array[$i]['total_price']      = $productLists->total_price;
                            $total_cart_price                   = $total_cart_price+$productLists->total_price;
                        }
                    }   //If Extra Addons NOT exist condition end here
                    $i++;
                    unset($extra_addon_array); unset($extra_addon_ids_array);
                }
            }
            return $cart_detail_array;
        }
    }

    /**********************************Order assign to agent**********************************/
    public function order_assign_to_agent(Request $request) {
        /* check permission */
        if($this->checkPermission('orders','order_assign_to_agent') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        if($request->isMethod('PUT')){
            $assign_data = '';
            if(count($request->order_details_id)){
                $agent_id = $request->assign_agent_id;
                $order_assign_agent = array();
                foreach ($request->order_details_id as $key => $detail_data) {
                    $get_detail_data = OrderDetail::where(['id'=>$detail_data])->first();
                    if($get_detail_data != null){
                        OrderAssignAgent::where(['order_id' => $get_detail_data->order_id, 'product_id' => $get_detail_data->product_id])->delete();
                        $order_assign_agent['order_id'] = $get_detail_data->order_id;
                        $order_assign_agent['order_details_id'] = $get_detail_data->id;
                        $order_assign_agent['product_id'] = $get_detail_data->product_id;
                        $order_assign_agent['assign_agent_id'] = $agent_id;
                        $order_assign_agent['created_at'] = date('Y-m-d H:i:s');
                        $order_assign_agent['updated_at'] = date('Y-m-d H:i:s');
                        $assign_data = OrderAssignAgent::create($order_assign_agent);
                    }
                }
            }
            if($assign_data != null || $assign_data !=''){
                $request->session()->flash('alert-success', 'Agent assign successfully.');
                return redirect()->route('admin.orders.view',base64_encode($get_detail_data->order_id));
            }else{
                $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back()->with($request->except(['_method', '_token']));
            }
        }
    }

    
    /********************************** Add Order Section **********************************/
    //Add PINCODE to ADMIN SESSION
    public function addPincodeToSession(Request $request) {
        if($request->isMethod('POST')){
            //Set pincode in the session data
            $pin = $request->pincode;
            if( $pin != '' ) {
                $checkpin_count = Pincode::where(['pincode' => $pin],['is_block' => 'N'])->count();
                if( $checkpin_count > 0 ){
                    Session::put(['Admin.delivery_pin_code'=>$pin]);
                    $type = 'success';
                }else{
                    if(Session::has('Admin.delivery_pin_code')){
                        Session::forget('Admin.delivery_pin_code');
                    }
                    $type = 'error';
                }
            }else{
                $type = 'error';
            }
            return json_encode(['type' => $type]);
        }
    }
    //Remove PINCODE from ADMIN SESSION
    public function removePincodeFromSession(Request $request){
        if($request->isMethod('POST')){
            if(Session::has('Admin.delivery_pin_code')){
                Session::forget('Admin.delivery_pin_code');
                return json_encode(['type' => 'success']);
            }else{
                return json_encode(['type' => 'error']);
            }
        }
    }

    //Add product section
    public function addProductSection(Request $request) {
        if($request->isMethod('POST')) {
            $counter_value    = isset($request->counter_value)?$request->counter_value:0;
            $current_currency = isset($request->current_currency)?$request->current_currency:0;
            $product_list = Product::where(['status'=>'A','is_deleted'=> 'N'])
                                            ->select('id','product_name','sku','has_attribute','price','delivery_delay_days','delivery_delay_days_from')
                                            ->get();
            return view('admin.orders.addproductsection', ['product_list' => $product_list, 'counter_value' => $counter_value, 'current_currency' => $current_currency]);
        }
    }

    //Checking product is available in the desired Pincode or not
    public function checkPincode(Request $request) {
        if($request->isMethod('POST')){

            $setting_data = Setting::pluck('product_delivery_error_message')->first();

            $msg = isset($setting_data)?$setting_data:'Sorry, currently we are not delivering this in your pincode.';
            $status = 'not_available';

            $pincode = Pincode::where(['pincode' => $request->pincode])->first();
            if( $pincode != null ){
                if(isset($pincode->city->city_group_relation) && count($pincode->city->city_group_relation)>0){
                    $city_group_id = [];
                    foreach ($pincode->city->city_group_relation as $city_group_data) {
                       $city_group_id[] = $city_group_data['city_group_id'];
                    }
                    if(count($city_group_id)>0){
                        $check_pincode = ProductRelatedCityGroup::where(['product_id' => $request->product_id])->whereIn('city_groups_id', $city_group_id)->first();
                        if($check_pincode != null){
                            if($pincode->pincode_group_relation->count() > 0){
                                $pincode_group_relation = $pincode->pincode_group_relation;
                                foreach($pincode_group_relation as $relation){
                                    $pincode_group_id[] = $relation->pincode_group_id;
                                }
                                $check_pincode = ProductRelatedRestrictedPincodeGroup::where(['product_id' => $request->product_id])->whereIn('pincode_group_id', $pincode_group_id)->first();
                                if($check_pincode != null){
                                    $msg = isset($setting_data)?$setting_data:'Sorry, currently we are not delivering this in your pincode.';
                                    $status = 'not_available';
                                }else{
                                    $msg = '';
                                    $status = 'available';
                                }
                            }else{
                                $msg = '';
                                $status = 'available';
                            }
                        }else{
                            $msg = '';
                            $status = 'available';
                        }
                    }else{
                        $msg = isset($setting_data)?$setting_data:'Sorry, currently we are not delivering this in your pincode.';
                        $status = 'not_available';
                    }
                }
            }
            return json_encode(['status' => $status, 'msg' => $msg]);
        }
    }

    //Getting product respective attribute + extra addon + gift addon
    public function productAttributeExtraaddonGiftaddon(Request $request) {
        if($request->isMethod('POST')){
            $product_id       = isset($request->product_id)?$request->product_id:0;
            $count_value      = isset($request->count_value)?$request->count_value:0;
            $current_currency = isset($request->current_currency)?$request->current_currency:3;

            $product_details = Product::where('id',$product_id)->first();
            //dd($product_details);

            //Extra addon and Gift section start
            $extraaddon_ids = []; $all_extra_addons = [];
            if (count($product_details->assign_extra_addon) > 0) {
                foreach ( $product_details->assign_extra_addon as $product_extra ) {
                    $extra_addon_ids = ProductExtraAddonGroupRelation::where('product_extra_addon_group_id', $product_extra->product_extra_addon_group_id)->get();
                    //dd($extra_addon_ids);
                    if( isset($extra_addon_ids) && count($extra_addon_ids) > 0 ) {
                        foreach($extra_addon_ids as $key => $val) {
                            $extraaddon_ids[] = $val->product_extra_addon_id;
                        }
                    }
                }
                if(!empty($extraaddon_ids)) {
                    asort($extraaddon_ids);

                    $all_extra_addons=ProductExtra::where('is_block','N')->whereIn('id',$extraaddon_ids)->get();
                }
            }

            $gift_addons = '';
            $ProductRelatedGiftAddonGroup = ProductRelatedGiftAddonGroup::where('product_id',$product_id)->pluck('gift_addon_group_id');
            if(isset($ProductRelatedGiftAddonGroup) && count($ProductRelatedGiftAddonGroup) > 0) {
                $GiftAddonGroupRelation = GiftAddonGroupRelation::whereIn('gift_addon_group_id',$ProductRelatedGiftAddonGroup)->distinct('gift_addon_id')->orderBy('gift_addon_id','ASC')->pluck('gift_addon_id');
                if(isset($GiftAddonGroupRelation) && count($GiftAddonGroupRelation) > 0) {
                    $gift_addons = GiftAddon::where('is_block','N')->whereIn('id',$GiftAddonGroupRelation)->get();
                }
            }
            //Extra addon and Gift addon section end

            return view('admin.orders.details')->with(['product_details' => $product_details, 'all_extra_addons' => $all_extra_addons, 'gift_addons' => $gift_addons, 'count_value' => $count_value, 'current_currency' => $current_currency]);
        }
    }

    // Getting Date respective Shipping Methods and Timings for Delivery Date Section
    public function deliveryMethod( Request $request ) {
        if($request->isMethod('POST')) {
            $shipping_date        = isset($request->shipping_date)?$request->shipping_date:'';
            $product_id           = isset($request->product_id)?$request->product_id:0;
            $count_value          = isset($request->count_value)?$request->count_value:'';
            $current_currency     = isset($request->current_currency)?$request->current_currency:3;
            $all_shipping_methods = [];
            $delivery_day         = '';
            $current_date         = '';

            if( $shipping_date != '' && $count_value != '' ) {
                $delivery_day = date('D',strtotime($shipping_date));
                $current_date = @$this->get_date_time();
                $current_date = isset($current_date)?$current_date:date('Y-m-d');

                $current_time = @$this->get_time();
                $current_time = isset($current_time)?$current_time:date('H:i');

                //$all_slots = DeliveryTiming::where('shipping_method_id',$shipping_method_id)->get();
                
                $product_shipping_relation = ProductShipping::where('product_id',$product_id)->pluck('shipping_method_id');
                if( $product_shipping_relation->count() > 0 ) {                    
                    $all_shipping_methods = ShippingMethod::whereIn('id',$product_shipping_relation)->get();
                }
            }
            return view('admin.orders.delivery_method')->with(['product_id'=>$product_id,'current_date'=>$current_date,'current_time'=>$current_time,'delivery_day'=>$delivery_day,'all_shipping_methods'=>$all_shipping_methods,'shipping_date'=>$shipping_date,'count_value'=>$count_value,'current_currency'=>$current_currency]);
        }
    }    

    // Getting Date respective Time Slots for Delivery Date Section
    public function deliveryTimeSlot( Request $request ){
        if($request->isMethod('POST')){
            $shipping_date      = isset($request->shipping_date)?$request->shipping_date:'';
            $shipping_method_id = isset($request->shipping_method_id)?$request->shipping_method_id:0;
            $count_value        = isset($request->count_value)?$request->count_value:'';
            $all_slots          = '';
            $delivery_day       = '';
            $current_date       = '';
            if( $shipping_date != '' && $shipping_method_id != 0 && $count_value != '' ) {
                $delivery_day = date('D',strtotime($shipping_date));
                $current_date = @$this->get_date_time();
                $current_date = isset($current_date)?$current_date:date('Y-m-d');

                $current_time = @$this->get_time();
                $current_time = isset($current_time)?$current_time:date('H:i');

                $all_slots = DeliveryTiming::where('shipping_method_id',$shipping_method_id)->get();
                
                $shipping_data  = ShippingMethod::where('id',$shipping_method_id)->first();
            }
            return view('admin.orders.delivery_slot')->with(['all_slots'=>$all_slots,'current_date'=>$current_date,'current_time'=>$current_time,'shipping_method_id'=>$shipping_method_id,'delivery_day'=>$delivery_day,'shipping_data'=>$shipping_data,'shipping_date'=>$shipping_date,'count_value'=>$count_value]);
        }
    }


    public function add(Request $request) {
        /* check permission */
        if($this->checkPermission('orders','add') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }

        $order = new Order;
        $list_users = User::select(
                                DB::raw("CONCAT(name,' (',email,')') AS username"),'id')
                                ->where([
                                        ['user_type', '<>', 'A'],
                                        ['email_verified', '=', 'Y'],
                                        ['is_block', '=', 'N'],
                                        ['status', '=', 'A']
                                    ])
                                ->pluck('username', 'id');

        $list_currency = Currency::where('is_block', 'N')->pluck('currency', 'id');

        /* Add to Cart Section Start */
        if($request->isMethod('PUT')){
            dd($request);
        }
        /* Add to Cart Section End */

        return view('admin.orders.add',['order' => $order, 'list_users' => $list_users, 'list_currency' => $list_currency]);
    }

    











    //Getting div for Product list
    public function getItemProduct(Request $request) {
        if($request->isMethod('POST','PUT')) {
            $counter_value = $request->counter_value;
            $pincode = Pincode::where(['pincode' => $request->pincode])->first();

            $pincode = Pincode::where(['pincode' => $request->pincode])->first();
            if( $pincode != null ){

                if(isset($pincode->city->city_group_relation) && count($pincode->city->city_group_relation)>0){
                    $city_group_id = [];
                    foreach ($pincode->city->city_group_relation as $city_group_data) {
                       $city_group_id[] = $city_group_data['city_group_id'];
                    }
                    if(count($city_group_id)>0){
                        $check_pincode = ProductRelatedCityGroup::where(['product_id' => $request->product_id])->whereIn('city_groups_id', $city_group_id)->first();
                        if($check_pincode != null){
                            if($pincode->pincode_group_relation->count() > 0){
                                $pincode_group_relation = $pincode->pincode_group_relation;
                                foreach($pincode_group_relation as $relation){
                                    $pincode_group_id[] = $relation->pincode_group_id;
                                }
                                $check_pincode = ProductRelatedRestrictedPincodeGroup::where(['product_id' => $request->product_id])->whereIn('pincode_group_id', $pincode_group_id)->first();
                                if($check_pincode != null){
                                    $msg = 'Sorry, currently we are not delivering this in your pincode';
                                    $status = 'not_available';
                                }else{
                                    $msg = '';
                                    $status = 'available';
                                }
                            }else{
                                $msg = '';
                                $status = 'available';
                            }
                        }else{
                            $msg = '';
                            $status = 'available';

                            //Set pincode in the session data
                            $pin = $request->pincode;
                            Session::put(['product_delivery_pin_code'=>$pin]);
                        }
                    }else{
                        $msg = 'Sorry, currently we are not delivering this in your pincode';
                        $status = 'not_available';
                    }
                }
            }
            return view('admin.orders.getproducts', ['product_list' => $product_list, 'counter_value' => $counter_value]);
        }
    }

    //Getting div for Product => attribute + extra addons + gift addons
    public function getProductAttributePrice(Request $request) {
        if($request->isMethod('POST','PUT')) {
            $product_id     = isset($request->product_id)?$request->product_id:0;
            $counter_value  = iset($request->counter_value)?$request->counter_value:0;

            $product_details= Product::where(['id'=>$product_id,'status'=>'A','is_deleted'=> 'N'])->first();

            dd($product_details);

            /*
            $pincode = Pincode::where(['pincode' => $request->pincode])->first();
            if( $pincode != null ){
                $pincode_group_relation = $pincode->pincode_group_relation;
                foreach($pincode_group_relation as $relation){
                    $pincode_group_id[] = $relation->pincode_group_id;
                }
                //$check_pincode = ProductRelatedRestrictedPincodeGroup::where(['product_id' => $request->product_id])->whereIn('pincode_group_id', $pincode_group_id)->first();
                
                $product_ids = ProductRelatedRestrictedPincodeGroup::whereIn('pincode_group_id', $pincode_group_id)->orderBy('product_id', 'ASC')->distinct()->pluck('product_id');
                //echo '<pre>'; print_r($product_ids);

                if($product_ids != null) {
                    $product_list = Product::where(['status'=>'A','is_deleted'=> 'N'])
                                            ->whereIn('id',$product_ids)
                                            ->select('id','product_name','sku','has_attribute','price','delivery_delay_days','delivery_delay_days_from')
                                            ->get();
                }
            }
            return view('admin.orders.getproducts', ['product_list' => $product_list, 'counter_value' => $counter_value]);
            */
        }
    }


    /********************************** Add Order Section **********************************/


    
}