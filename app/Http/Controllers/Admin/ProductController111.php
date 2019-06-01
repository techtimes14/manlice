<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Auth;
use Image;
use App\Model\Product;
use App\Model\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductController extends CommonController
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
        $orWhere = array();
        $where = ['is_deleted'=>'N'];
        // search conditions
        if($request->search != null){
            $orWhere[] = ['product_name', 'LIKE', '%'.$request->search.'%'];
        }
        $products = Product::where($where)
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
                        ->paginate(50);
        return view('admin.product.list', ['products' => $products, 'request' => $request]);
    }

    /**
     * Add product.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request) {
        $products = new Product;
        if($request->isMethod('PUT')){
			dd($request);

            //=======For category product data=======//
            if((isset($request->categories_id) && count($request->categories_id)>0)){
                foreach( $request->categories_id as $cat_id ) {
                    $product_request = [];
                    $product_request['product_name']    = $request->product_name;
                    $product_request['description']     = $request->description;
                    $product_request['slug']            = Product::getUniqueSlug($request->product_name);                    
                    $product_request['price']        	= $request->price;
                    $product_request['special_price']   = $request->special_price;
					$product_request['meta_title']       = $request->meta_title;
                    $product_request['meta_keyword']     = $request->meta_keyword;
                    $product_request['meta_description'] = $request->meta_description;

                    if($product_data = Product::create($product_request)){
						
						//=== Related Products ===//
                        $related_product = [];
                        if(isset($request->product_ids) && count($request->product_ids)>0){
                            foreach ( $request->product_ids as $key_product => $val_product ) {
                                $related_product['product_id']         = $product_data->id;
                                $related_product['related_product_id'] = $val_product;
                                $related_product['created_at']         = date('Y-m-d H:i:s');
                                $related_product['updated_at']         = date('Y-m-d H:i:s');
                                RelatedProduct::create($related_product);
                                unset($related_product);
                            }
                        }
						
                        $request->session()->flash('alert-success', 'Product added successfully');
                        return redirect()->route('admin.product.list');
                    }else{
                        $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                        return redirect()->back()->with($request->except(['_method', '_token']));
                    }
                }
            }
			
			if(isset($product_data->id) && $product_data->id >0){
                $request->session()->flash('alert-success', 'Product successfully added.');
                return redirect()->route('admin.product.list');
            }

        }

		$product_list = Product::where([['status','A'],['is_deleted','N']])->orderBy('id','desc')->pluck('product_name','id');
        return view('admin.product.add', ['products' => $products, 'product_list' => $product_list]);
    }

    /**
     * Edit product.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null, Request $request) {
        /* check permission */
        if($this->checkPermission('product','edit') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);

        $products = Product::find($id);

        $categories = new Category;
        $category_list = $categories->join('taxonomies as taxonomy', 'categories.taxonomy_id', '=', 'taxonomy.id')->orderBy('taxonomy.title', 'ASC')->pluck('taxonomy.title', 'categories.id');

        $occasions = new Occasion;
        $occasions_list = $occasions->join('taxonomies as taxonomy', 'occasions.taxonomy_id', '=', 'taxonomy.id')->orderBy('taxonomy.title', 'ASC')->pluck('taxonomy.title', 'occasions.id');

        $shipping_methods = ShippingMethod::where('is_block','N')->orderBy('title', 'ASC')->pluck('title','id');

        $product_list = Product::where([['id','!=',$id],['status','A'],['is_deleted','N']])->orderBy('id','desc')->pluck('product_name','id');

        $city_list = CityGroup::where('is_block','N')->orderBy('title','asc')->pluck('title','id');

        $gift_addon_group_list = GiftAddonGroup::where('is_block','N')->orderBy('title','asc')->pluck('title','id');

        $pincode_group_list = PincodeGroup::where('is_block','N')->orderBy('title','asc')->pluck('title','id');

        $product_extra_addon_groups = ProductExtraAddonGroup::where('is_block','N')->orderBy('title', 'ASC')->pluck('title','id');


        if($request->isMethod('PUT')) {
            // $request->validate([
            //     'product_name' => 'required|unique:products,product_name,'.$products->id
            // ]);

            $product_request = [];
            //dd($request);

            if(isset($request->has_attribute) && $request->has_attribute == 'YES'){
                if(!isset($request->attr_title)){
                    $request->session()->flash('alert-danger', 'Please add product attribute.');
                    return redirect()->back()->with($request->except(['_method', '_token']));
                }
            }

            $product_request['product_name']        = $request->product_name;
            $product_request['has_attribute']       = $request->has_attribute;
            $product_request['description']         = $request->description;
            $product_request['delivery_information']= $request->delivery_information;
            $product_request['care_instruction']    = $request->care_instruction;
            $product_request['slug']                = Product::getUniqueSlug($request->product_name, $id);
            //$product_request->sku                 = $request->description;
            $product_request['created_by']          = Auth::guard('admin')->user()->id;

            if(isset($request->has_attribute) && $request->has_attribute == 'NO'){
                $product_request['price']           = $request->price;
                $product_request['sortby_price']    = $request->price;

                if($products->has_attribute == 'YES') {
                    ProductAttribute::where('product_id',$products->id)->update(['is_block' => 'D','deleted_at' => date('Y-m-d H:i:s')]);
                }
            }
            else if(isset($request->has_attribute) && $request->has_attribute == 'YES'){
                $product_request['price']           = null;
            }

            $product_request['special_delivery']    = $request->special_delivery;
            $product_request['tax_class']           = $request->tax_class;

            //Delivery delay section
            if((isset($request->delivery_delay_days) && $request->delivery_delay_days>0)){
                $delivery_delay_days      = $request->delivery_delay_days;
                $delivery_delay_days_from = date('Y-m-d',strtotime(date('Y-m-d').'+ '.$delivery_delay_days.' days'));
                $product_request['delivery_delay_days']      = $delivery_delay_days;
                $product_request['delivery_delay_days_from'] = $delivery_delay_days_from;
            }else{
                $product_request['delivery_delay_days']      = 0;
                $product_request['delivery_delay_days_from'] = date('Y-m-d',strtotime(date('Y-m-d').'- 1 days'));
            }

            $product_request['alt_key']             = $request->alt_key;
            $product_request['meta_title']          = $request->meta_title;
            $product_request['meta_keyword']        = $request->meta_keyword;
            $product_request['meta_description']    = $request->meta_description;

            if($products->update($product_request)){

                //=== Extra addon set ===//
                if(isset($request->product_extras_id) && count($request->product_extras_id)>0){
                    AssignProductExtra::where('product_id',$products->id)->delete();
                    foreach ($request->product_extras_id as $product_extras_id) {
                        $product_extra = [];
                        $product_extra['product_id']                   = $products->id;
                        $product_extra['product_extra_addon_group_id'] = $product_extras_id;
                        AssignProductExtra::create($product_extra);
                        unset($product_extra);
                    }
                }

                //=== Extra Addon Groups ===//
                $related_gift_addon_groups = [];
                if(isset($request->gift_addon_group_ids) && count($request->gift_addon_group_ids)>0){
                    ProductRelatedGiftAddonGroup::where('product_id',$products->id)->delete();
                    foreach ( $request->gift_addon_group_ids as $key => $val ) {
                        $related_gift_addon_groups['product_id']          = $products->id;
                        $related_gift_addon_groups['gift_addon_group_id'] = $val;
                        $related_gift_addon_groups['created_at']          = date('Y-m-d H:i:s');
                        $related_gift_addon_groups['updated_at']          = date('Y-m-d H:i:s');
                        ProductRelatedGiftAddonGroup::create($related_gift_addon_groups);
                        unset($related_gift_addon_groups);
                    }
                }

                //=== Product Shipping ===//
                $product_shipping = [];
                if(isset($request->shipping_methods) && count($request->shipping_methods)>0){
                    ProductShipping::where('product_id',$products->id)->delete();
                    foreach ($request->shipping_methods as $key_shipping => $val_shipping) {
                        $product_shipping['product_id']         = $products->id;
                        $product_shipping['shipping_method_id'] = $val_shipping;
                        $product_shipping['created_at']         = date('Y-m-d H:i:s');
                        $product_shipping['updated_at']         = date('Y-m-d H:i:s');
                        ProductShipping::create($product_shipping);
                        unset($product_shipping);
                    }
                }

                //=== Related Products ===//
                $related_product = [];
                if(isset($request->product_ids) && count($request->product_ids)>0){
                    RelatedProduct::where('product_id',$products->id)->delete();
                    foreach ( $request->product_ids as $key_product => $val_product ) {
                        $related_product['product_id']         = $products->id;
                        $related_product['related_product_id'] = $val_product;
                        $related_product['created_at']         = date('Y-m-d H:i:s');
                        $related_product['updated_at']         = date('Y-m-d H:i:s');
                        RelatedProduct::create($related_product);
                        unset($related_product);
                    }
                }

                //=== Available Gift Addon Groups ===//
                $related_restricted_pincode_groups = [];
                if(isset($request->pincode_group_ids) && count($request->pincode_group_ids)>0){
                    ProductRelatedRestrictedPincodeGroup::where('product_id',$products->id)->delete();
                    foreach ( $request->pincode_group_ids as $key => $val ) {
                        $related_restricted_pincode_groups['product_id']       = $products->id;
                        $related_restricted_pincode_groups['pincode_group_id'] = $val;
                        $related_restricted_pincode_groups['created_at']       = date('Y-m-d H:i:s');
                        $related_restricted_pincode_groups['updated_at']       = date('Y-m-d H:i:s');
                        ProductRelatedRestrictedPincodeGroup::create($related_restricted_pincode_groups);
                        unset($related_restricted_pincode_groups);
                    }
                }else{
                    ProductRelatedRestrictedPincodeGroup::where('product_id',$products->id)->delete();
                }

                //=== Related city group add ===//
                $city_group = [];
                if( isset($request->city_ids) && count($request->city_ids)>0 ) {
                    ProductRelatedCityGroup::where('product_id',$products->id)->delete();
                    foreach ( $request->city_ids as $key_city => $val_city ) {
                        $city_group['product_id'] = $products->id;
                        $city_group['city_groups_id'] = $val_city;
                        $city_group['created_at'] = date('Y-m-d H:i:s');
                        $city_group['updated_at'] = date('Y-m-d H:i:s');
                        ProductRelatedCityGroup::create($city_group);
                        unset($city_group);
                        //=== Available Cities ===//
                        $get_city_from_group = CityGroupRelation::where('city_group_id',$val_city)->pluck('id','cities_id');

                        if(!empty($get_city_from_group) && count($get_city_from_group)>0){
                            RelatedCity::where('product_id',$products->id)->delete();
                            $related_cities = [];
                            foreach ($get_city_from_group as $city_key => $city_id) {
                                $related_cities['product_id'] = $products->id;
                                $related_cities['cities_id']  = $city_id;
                                $related_cities['created_at'] = date('Y-m-d H:i:s');
                                $related_cities['updated_at'] = date('Y-m-d H:i:s');
                                RelatedCity::create($related_cities);
                                unset($related_cities);
                            }
                        }
                    }
                }

                if(isset($request->has_attribute) && $request->has_attribute == 'YES'){
                    if((isset($request->attr_title) && count($request->attr_title)>0) && (isset($request->attr_price) && count($request->attr_price)>0)){
                        $g=1;
                        foreach ($request->attr_title as $attr_key => $attribute_title) {
                            if($request->attr_id[$attr_key] >0){
                                $product_attribute = [];
                                if( $attribute_title != '' ){
                                    $product_attribute['title']      = $attribute_title;
                                    $product_attribute['price']      = $request->attr_price[$attr_key];
                                    $product_attribute['sl_no']      = $attr_key;
                                    $product_attribute['updated_at'] = date('Y-m-d H:i:s');
                                    ProductAttribute::where('id', $request->attr_id[$attr_key])->update($product_attribute);
                                    if( $g == 1 ){
                                        Product::where('id',$products->id)->update(['sortby_price' => $request->attr_price[$attr_key]]);
                                    }
                                }
                            }elseif($request->attr_id[$attr_key] ==''){
                                $product_attribute = [];

                                if($attribute_title != '') {
                                    $product_attribute['product_id'] = $products->id;
                                    $product_attribute['title']      = $attribute_title;
                                    $product_attribute['price']      = $request->attr_price[$attr_key];
                                    $product_attribute['sl_no']      = $attr_key;
                                    $product_attribute['created_by'] = Auth::guard('admin')->user()->id;
                                    ProductAttribute::create($product_attribute);
                                    if( $g == 1 ){
                                        Product::where('id',$products->id)->update(['sortby_price' => $request->attr_price[$attr_key]]);
                                    }
                                }
                            }
                            $g++;
                        }
                    }
                }
                $request->session()->flash('alert-success', 'Product successfully updated.');
                return redirect()->route('admin.product.list');
            }else{
                $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back()->with($request->except(['_method', '_token']));
            }
        }

        $delivery_options = DeliveryOption::where('is_block','N')->pluck('title','id');
        $tax_classes      = TaxClass::where('is_block','N')->select('id','title','amount')->get();
        $product_ids = [];
        if(!empty($products->related_products)){
            foreach ($products->related_products as $key1 => $val1) {
                $product_ids[] = $val1->related_product_id;
            }
        }

        $city_ids = [];
        if(!empty($products->related_cities_group)){
            foreach ($products->related_cities_group as $key2 => $val2) {
                $city_ids[] = $val2->city_groups_id;
            }
        }

        $gift_addon_group_ids = [];
        if(!empty($products->related_gift_addon_group)){
            foreach ($products->related_gift_addon_group as $key2 => $val2) {
                $gift_addon_group_ids[] = $val2->gift_addon_group_id;
            }
            asort($gift_addon_group_ids);
        }

        $pincode_group_ids = [];
        if(!empty($products->related_restricted_pincode_group)){
            foreach ($products->related_restricted_pincode_group as $key2 => $val2) {
                $pincode_group_ids[] = $val2->pincode_group_id;
            }
            asort($pincode_group_ids);
        }

        $assign_product_extra = [];
        if(!empty($products->related_extra_addon_group)){
            foreach ($products->related_extra_addon_group as $key3 => $val3) {
                $assign_product_extra[] = $val3->product_extra_addon_group_id;
            }
            asort($assign_product_extra);
        }

        return view('admin.product.edit', ['products'=>$products,'category_list'=>$category_list,'occasions_list'=>$occasions_list,'product_extra_addon_groups'=>$product_extra_addon_groups,'assign_product_extra'=>$assign_product_extra,'delivery_options'=>$delivery_options,'tax_classes'=>$tax_classes,'shipping_methods'=>$shipping_methods,'city_list'=>$city_list,'product_list'=>$product_list,'product_ids'=>$product_ids,'city_ids'=>$city_ids, 'gift_addon_group_list'=>$gift_addon_group_list, 'pincode_group_list'=>$pincode_group_list, 'gift_addon_group_ids'=>$gift_addon_group_ids, 'pincode_group_ids'=>$pincode_group_ids]);
    }


    /**
     * Download Product excel template.
     *
     * @return \Illuminate\Http\Response
     */
    public function download_template(Request $request){
        \Excel::create( 'product', function ( $excel ) {
            $excel->sheet( 'sheet_name', function ( $sheet ) {
                $sheet->SetCellValue( "A1", "Category" );
                $sheet->SetCellValue( "B1", "Occasion" );
                $sheet->SetCellValue( "C1", "Product Name" );
                $sheet->SetCellValue( "D1", "Description" );
                $sheet->SetCellValue( "E1", "Delivery Information" );
                $sheet->SetCellValue( "F1", "Care Instruction" );
                $sheet->SetCellValue( "G1", "Meta Title" );
                $sheet->SetCellValue( "H1", "Meta Keyword" );
                $sheet->SetCellValue( "I1", "Meta Description" );

                $category_list = Category::join('taxonomies as taxonomy', 'categories.taxonomy_id', '=', 'taxonomy.id')->pluck('taxonomy.title', 'categories.id');

                $sheet->SetCellValue("AA1", '0->Select');
                $index = 2;
                foreach ($category_list as $key => $cat) {
                    $catlst = $key."->".$cat;
                    $sheet->SetCellValue( "AA".$index, $catlst );
                    $index++;
                }

                $occasions_list = Occasion::join('taxonomies as taxonomy', 'occasions.taxonomy_id', '=', 'taxonomy.id')->pluck('taxonomy.title', 'occasions.id');
                $sheet->SetCellValue("AB1", '0->Select');
                $occ_indx = 2;
                foreach ($occasions_list as $key1 => $occation) {
                    $occationlst = $key1."->".$occation;
                    $sheet->SetCellValue( "AB".$occ_indx, $occationlst );
                    $occ_indx++;
                }


                //Gather data from these cells
                $sheet->_parent->addNamedRange(
                    new \PHPExcel_NamedRange(
                        'category', $sheet, 'AA1:AA'.$index
                    )
                );

                //Occasion data from these cells
                $sheet->_parent->addNamedRange(
                    new \PHPExcel_NamedRange(
                        'occasion', $sheet, 'AB1:AB'.$index
                    )
                );

                //dd($sheet);

                $col_count = 100; //Getting the value of column count

                for ( $i = 2; $i <= $col_count; $i ++ ) {
                    $objValidation = $sheet->getCell( 'A' . $i )->getDataValidation();
                    $objValidation->setType( \PHPExcel_Cell_DataValidation::TYPE_LIST );
                    $objValidation->setErrorStyle( \PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
                    $objValidation->setAllowBlank( false );
                    $objValidation->setShowInputMessage( true );
                    $objValidation->setShowErrorMessage( true );
                    $objValidation->setShowDropDown( true );
                    $objValidation->setErrorTitle( 'Input error' );
                    $objValidation->setError( 'Value is not in list.' );
                    $objValidation->setPromptTitle( 'Pick from list' );
                    $objValidation->setPrompt( 'Please pick a value from the drop-down list.' );
                    $objValidation->setFormula1( 'category' ); //note this!
                }

                for ( $j = 2; $j <= $col_count; $j ++ ) {
                    $objValidation = $sheet->getCell( 'B' . $j )->getDataValidation();
                    $objValidation->setType( \PHPExcel_Cell_DataValidation::TYPE_LIST );
                    $objValidation->setErrorStyle( \PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
                    $objValidation->setAllowBlank( false );
                    $objValidation->setShowInputMessage( true );
                    $objValidation->setShowErrorMessage( true );
                    $objValidation->setShowDropDown( true );
                    $objValidation->setErrorTitle( 'Input error' );
                    $objValidation->setError( 'Value is not in list.' );
                    $objValidation->setPromptTitle( 'Pick from list' );
                    $objValidation->setPrompt( 'Please pick a value from the drop-down list.' );
                    $objValidation->setFormula1( 'occasion' ); //note this!
                }

           });

        })->download( 'xlsx' );
    }

    /**
     * Upload Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload_product(Request $request){
        /* check permission */
        if($this->checkPermission('product','upload_product') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }

        $product = new Product;
        if($request->isMethod('POST')){

            $path_data  = $request->file('product_file')->getRealPath();
            $product_data = \Excel::load($path_data)->get();
            if($product_data->count()){
                $product_request = [];
                $product_request_occassion = [];
                $product_error_message = [];

                foreach ($product_data as $key_prod => $val_prod) {
                    $export_cart = explode('->', $val_prod->category);
                    //=======For category product data=======//
                    if((isset($val_prod->category) && $export_cart[0]>0)){
                        $product_request['categories_id']       = $export_cart[0];
                        $product_request['product_name']        = $val_prod->product_name;
                        $product_request['description']         = $val_prod->description;
                        $product_request['delivery_information']= $val_prod->delivery_information;
                        $product_request['care_instruction']    = $val_prod->care_instruction;
                        $product_request['meta_title']          = $val_prod->meta_title;
                        $product_request['meta_keyword']        = $val_prod->meta_keyword;
                        $product_request['meta_description']    = $val_prod->meta_description;
                        $product_request['slug']                = Product::getUniqueSlug($val_prod->product_name);
                        $product_request['created_by']          = Auth::guard('admin')->user()->id;

                        if($product_data = Product::create($product_request)){
                            /* For sku calculation */
                            $sku_generate_array = array();
                            $sku_generate_array['category_id']  = $export_cart[0];
                            $sku_generate_array['product_type'] = 'A';
                            $sku_generate_array['delivery_by']  = 'H';
                            $sku_generate_array['product_id']   = $product_data->id;
                            $sku_generate_array['country_id']   = 99;
                            $sku = @$this->generate_sku($sku_generate_array);
                            /* Update product sku */
                            Product::where('id',$product_data->id)->update(['sku'=>$sku]);

                        }else{
                            $product_error_message[] = $val_prod->product_name;
                        }
                    }

                    //=========Export occassion==========//
                    $export_occasion = explode('->', $val_prod->occasion);
                    //=======For occasion product data=======//
                    if((isset($val_prod->occasion) && $export_occasion[0]>0)){
                        $product_request_occassion['occasions_id']        = $export_occasion[0];
                        $product_request_occassion['product_name']        = $val_prod->product_name;
                        $product_request_occassion['description']         = $val_prod->description;
                        $product_request_occassion['delivery_information']= $val_prod->delivery_information;
                        $product_request_occassion['care_instruction']    = $val_prod->care_instruction;
                        $product_request_occassion['meta_title']          = $val_prod->meta_title;
                        $product_request_occassion['meta_keyword']        = $val_prod->meta_keyword;
                        $product_request_occassion['meta_description']    = $val_prod->meta_description;
                        $product_request_occassion['slug']                = Product::getUniqueSlug($val_prod->product_name);
                        $product_request_occassion['created_by']          = Auth::guard('admin')->user()->id;

                        if($product_data_occassion = Product::create($product_request_occassion)){
                            /* For sku calculation */
                            $sku_generate_occasion_array = array();
                            $sku_generate_occasion_array['product_type'] = 'A';
                            $sku_generate_occasion_array['delivery_by']  = 'H';
                            $sku_generate_occasion_array['product_id']   = $product_data_occassion->id;
                            $sku_generate_occasion_array['country_id']   = 99;
                            $sku_generate_occasion_array['occasion_id'] = $export_occasion[0];
                            $sku_occasion = @$this->generate_sku($sku_generate_occasion_array);
                            /* Update product sku */
                            Product::where('id',$product_data_occassion->id)->update(['sku'=>$sku_occasion]);

                        }else{
                            $product_error_message[] = $val_prod->product_name;
                        }
                    }
                }

                if(count($product_error_message)>0){
                    $data_error_msg = '';
                    foreach ($product_error_message as $key => $error_msg) {
                        $data_error_msg .= ','.$error_msg;
                    }
                    $data_error_msg = trim($data_error_msg,",");
                    $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                    return redirect()->back()->with($request->except(['_method', '_token']));
                }else{
                    $request->session()->flash('alert-success', 'Product successfully added.');
                    return redirect()->route('admin.product.list');
                }
            }
        }
        return view('admin.product.upload_product',['product'=>$product]);
    }

    /**
     * Product image.
     *
     * @return \Illuminate\Http\Response
     */
    public function product_image(Request $request){
        $products = new Product;
        return view('admin.product.product_image', ['products' => $products]);
    }

    /**
     * Upload File.
     *
     * @return \Illuminate\Http\Response
     */
    public function multifileupload($id = null){
        /* check permission */
        if($this->checkPermission('product','multifileupload') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);

        $products = Product::find($id);
        return view('admin.product.product_image',['products'=>$products]);
    }

    public function store($product_id = null, Request $request){
        $product_id = $product_id;
        $image = $request->file('file');
        $filename = $image->getClientOriginalName();
        $location = public_path('/uploaded/product/'.$filename);
        if(Image::make($image)->resize(490,517)->save($location)){
            $product_image = [];
            $product_image['product_id'] = $product_id;
            $product_image['name'] = $filename;

            $thumb_location = public_path('/uploaded/product/thumb/'.$filename);
            Image::make($image)->resize(100,120)->save($thumb_location);

            $count_default_image = ProductImage::where([['product_id',$product_id],['default_image','Y']])->count();
            if($count_default_image == 0){
                $product_image['default_image'] = 'Y';
            }
            if(ProductImage::create($product_image)){
                $upload_success = $filename;
            }
        }

        if ($upload_success) {
            return response()->json(['success'=>$upload_success]);
        }
        // Else, return error 400
        else {
            return response()->json('error', 400);
        }
    }

    /**
    Upload Video
    *
    */
    public function video($id = null, Request $request)
    {
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id       = base64_decode($id);
        $products = Product::find($id);

        $product_video_details = ProductVideo::where('product_id',$id)->first();
        if($request->isMethod('PUT')) {
            //dd('ok');
            /*$request->validate([
                'iframe_code' => 'required'
            ]);*/

            $product_video = [];
            //dd($products);
            $product_video['product_id']  = $products->id;
            $product_video['iframe_code'] = $request->iframe_code;
            $product_video['created_at']  = date('Y-m-d H:i:s');
            $product_video['updated_at']  = date('Y-m-d H:i:s');

            if( $request->product_video_id != 0 ) {
                if($product_video_details->update($product_video)) {
                    $request->session()->flash('alert-success', 'Product video successfully updated.');
                    return redirect()->route('admin.product.list');
                }else{
                    $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                    return redirect()->back()->with($request->except(['_method', '_token']));
                }
            }
            else{
                if(ProductVideo::create($product_video)){
                    $request->session()->flash('alert-success', 'Product video successfully created.');
                    return redirect()->route('admin.product.list');
                }else{
                    $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                    return redirect()->back()->with($request->except(['_method', '_token']));
                }
            }
        }
        return view('admin.product.product_video', ['products'=>$products,'product_video_details'=>$product_video_details]);
    }


    /**
     * File destroy.
     *
     * @return \Illuminate\Http\Response
     */
    public function image_delete(Request $request){
        $filename =  $request->filename;
        ProductImage::where(['name'=>$filename])->delete();
        $path = public_path('/uploaded/product/'.$filename);
        $path = public_path('/uploaded/product/thumb/'.$filename);
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }
    

    /**
     * Check Product title.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxCheckProductTitle(Request $request){
        if($request->isMethod('POST')) {
            $product_title = $request->product_name;
            $if_exist_product = Product::where(['status'=>'A','product_name'=>$product_title])->count();
            if($if_exist_product >0){
                echo 0;
            }else{
                echo 1;
            }
            exit;
        }
    }
    /**
     * Generate SKU code.
     *
     * @return \Illuminate\Http\Response
     */
    public function generate_sku($request){
        $formated_number = '';
        $total_digit_number = '00000';
        $product_id = $request['product_id'];
        $product_id_length = strlen((string)$product_id);
        $concate_digit_and_pid = $total_digit_number.$product_id;
        $formated_product_number = substr($concate_digit_and_pid, $product_id_length);
        $country = Country::where('id',$request['country_id'])->first();
        $country_sort_code = strtoupper($country->country_code);
        $webside_code = 1;
        if(isset($request['category_id'])){
            $category = Category::where('id',$request['category_id'])->first();
            $parent_category_title = '';
            if(isset($category->parent)){
                $parent_category_title = strtoupper(substr($category->parent->taxonomy->title, 0, 1));
            }
            $category_title = strtoupper(substr($category->taxonomy->title, 0, 1));

            $formated_number = $parent_category_title.$category_title.$request['product_type'].$request['delivery_by'].$formated_product_number.$country_sort_code.$webside_code;
        }elseif(isset($request['occasion_id'])){
            $occation = Occasion::where('id',$request['occasion_id'])->first();

            $occation_title = strtoupper(substr($occation->taxonomy->title, 0, 2));
            $country_sort_code = strtoupper($country->country_code);
            $webside_code = 1;
            $formated_number = $request['product_type'].$request['delivery_by'].$formated_product_number.$country_sort_code.$occation_title.$webside_code;
        }
        return $formated_number;
    }

    /**
     * Delete product.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id = null, Request $request){
        /* check permission */
        if($this->checkPermission('product','delete') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
        if(Product::where(['id' => $id])->update(['is_deleted' => 'Y','deleted_at' => date('Y-m-d H:i:s')])){
            // @unlink(public_path() . '/uploaded/product/' . $data->image);
            // $data->delete();
            $request->session()->flash('alert-success', 'Product successfully deleted.');
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
            return redirect()->back();
        }
    }

    /**
     * Delete product images.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_product_image($id = null, $product_id = null, Request $request){
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
        $product_id = base64_decode($product_id);
        $get_image_data = ProductImage::where(['id' => $id,'product_id'=>$product_id])->first();

        if($get_image_data->default_image == 'N'){
            @unlink(public_path() . '/uploaded/product/' . $get_image_data->name);
            @unlink(public_path() . '/uploaded/product/thumb/' . $get_image_data->name);
            $get_image_data->delete();
            $request->session()->flash('alert-success', 'Image successfully deleted.');
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! Default image can not deleted.');
            return redirect()->back();
        }

    }

    /**
     * Change product status - block or unblock.
     *
     * @return \Illuminate\Http\Response
     */
    public function status($id = null, $status = null, Request $request){
        if($id == null || $status == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
        $block = 'I';
        $blockText = 'blocked';
        switch($status){
            case 'A':
                $block = 'I';
                $blockText = 'blocked';
                break;
            case 'I':
                $block = 'A';
                $blockText = 'unblocked';
                break;
            default:
                $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back();
        }
        if(Product::where(['id' => $id])->update(['status' => $block])){
            $request->session()->flash('alert-success', 'Product successfully '.$blockText);
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
            return redirect()->back();
        }
    }

    /**
     * Make default image.
     *
     * @return \Illuminate\Http\Response
     */
    public function make_default_image(Request $request){

        $product_id = base64_decode($request->product_id);
        $image_id = base64_decode($request->image_id);
        $res = 0;
        if($product_id >0 && $image_id >0){
            if(ProductImage::where(['product_id' => $product_id])->update(['default_image' => 'N','updated_at' => date('Y-m-d H:i:s')])){

                if(ProductImage::where(['product_id' => $product_id,'id'=>$image_id])->update(['default_image' => 'Y','updated_at' => date('Y-m-d H:i:s')])){
                    $res = 1;
                }

            }else{
                $res = 0;
            }
        }
        echo $res;
    }

    /**
     * Delete product attribute.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_product_attribute(Request $request){
        $attribute_id = base64_decode($request->attribute_id);
        $product_id = $request->product_id;
        $count_product_attr = ProductAttribute::where(['product_id' => $product_id])->count();

        $res = 0;
        if($count_product_attr >1){
            if(ProductAttribute::where(['id' => $attribute_id])->delete()){
                $res = 1;
            }else{
                $res = 0;
            }
        }else{
            $res = 2;
        }
        echo $res;
    }

    /**
     * Change status product attribute and update attribute srl no wise price in main Product table.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_status_product_attribute(Request $request){
        $attribute_id       = base64_decode($request->attribute_id);
        $product_id         = $request->product_id;
        $attribute_status   = $request->attribute_status;

        $count_product_attr = ProductAttribute::where([
                                                    ['id', '<>' ,$attribute_id],
                                                    ['product_id', $product_id],
                                                    ['is_block', 'N']
                                                ])
                                                ->count();
        $res = 0;
        if( $count_product_attr > 0 ){
            if( ProductAttribute::where([
                                    ['id', $attribute_id],
                                    ['product_id', $product_id]
                                ])
                                ->update([
                                        'is_block' => $attribute_status,
                                        'updated_at' => date('Y-m-d H:i:s')
                                ])
            ) {

                $rest_data = ProductAttribute::where([
                                    ['product_id', $product_id],
                                    ['is_block', 'N']
                                ])->orderBy('sl_no','ASC')
                                ->first();
                if($rest_data != null) {
                    Product::where(['id' => $product_id])->update([
                                        'sortby_price' => $rest_data->price,
                                        'updated_at' => date('Y-m-d H:i:s')
                                ]);
                }

                $res = 1;
            }else{
                $res = 0;
            }
        }else{
            $res = 2;
        }
        echo $res;
    }

}