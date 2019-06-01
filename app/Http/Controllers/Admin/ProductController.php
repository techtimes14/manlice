<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Auth;
use Image;
use CommonHepler;
use App\Model\Product;
use App\Model\ProductLocale;
use App\Model\RelatedProduct;
use App\Model\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductController extends CommonController
{
    /**
    *** Create a new controller instance.
    **/
    public function __construct()
    {
        parent::__construct();
    }

    /**
    *** Show the listing
    **/
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
                        ->paginate(CommonHepler::ADMIN_PRODUCT_LIMIT);
        return view('admin.product.list', ['products' => $products, 'request' => $request]);
    }

    /**
    *** Add product
    **/
    public function add(Request $request) {
		$products = new Product;
        if($request->isMethod('PUT')){
			$product_request = [];
			$product_request['product_name']    = $request->product_name_en;
			$product_request['slug']            = Product::getUniqueSlug($request->product_name_en);                    
			$product_request['price']        	= $request->price;
			$product_request['special_price']	= $request->special_price;
			$product_request['meta_title']      = $request->meta_title;
			$product_request['meta_keyword']    = $request->meta_keyword;
			$product_request['meta_description']= $request->meta_description;

			if($product_data = Product::create($product_request)){				
				if(count(CommonHepler::WEBSITE_LANGUAGES) > 0){
					foreach(CommonHepler::WEBSITE_LANGUAGES as $keyLang => $valLang) {
						$product_locale['product_id']   = $product_data->id;
						$product_locale['lang_code'] 	= $keyLang;
						$product_locale['product_name']	= $request['product_name_'.$keyLang];
						$product_locale['description']	= $request['description_'.$keyLang];
						ProductLocale::create($product_locale);
						unset($product_locale);
					}
				}
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
			
            
			
			if(isset($product_data->id) && $product_data->id >0){
                $request->session()->flash('alert-success', 'Product successfully added.');
                return redirect()->route('admin.product.list');
            }

        }

		$product_list = Product::where([['status','A'],['is_deleted','N']])->orderBy('id','desc')->pluck('product_name','id');
        return view('admin.product.add', ['products' => $products, 'product_list' => $product_list]);
    }

    /**
    *** Edit product.
    **/
    public function edit($id = null, Request $request) {
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
		$products = Product::find($id);
		
        if($request->isMethod('PUT')) {
            // $request->validate([
            //     'product_name' => 'required|unique:products,product_name,'.$products->id
            // ]);
            $product_request = [];
            $product_request['product_name'] = $request->product_name_en;
            $product_request['slug']         = Product::getUniqueSlug($request->product_name_en, $id);
			$product_request['price']        = $request->price;
			$product_request['special_price']= $request->special_price;
			
			if($products->update($product_request)){
				if (count(CommonHepler::WEBSITE_LANGUAGES) > 0){
					foreach (CommonHepler::WEBSITE_LANGUAGES as $keyLang => $valLang) {
						if (count($products->productLocale) > 0) {
							foreach ($products->productLocale as $locale) {
								if ($keyLang == $locale->lang_code) {
									ProductLocale::where('id', $locale->id)->update([
																					'product_name' => $request['product_name_'.$keyLang],
																					'description'  => $request['description_'.$keyLang]
																					]);
								}
							}
						}
					}
				}				
                //=== Related Products ===//
                $related_product = [];
				RelatedProduct::where('product_id',$products->id)->delete();
                if(isset($request->product_ids) && count($request->product_ids)>0){                    
                    foreach ( $request->product_ids as $key_product => $val_product ) {
                        $related_product['product_id']         = $products->id;
                        $related_product['related_product_id'] = $val_product;
                        $related_product['created_at']         = date('Y-m-d H:i:s');
                        $related_product['updated_at']         = date('Y-m-d H:i:s');
                        RelatedProduct::create($related_product);
                        unset($related_product);
                    }
                }                
                $request->session()->flash('alert-success', 'Product updated successfully');
                return redirect()->route('admin.product.list');
            }else{
                $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back()->with($request->except(['_method', '_token']));
            }
        }

		$product_list = Product::where([['id','!=',$id],['status','A'],['is_deleted','N']])->orderBy('id','desc')->pluck('product_name','id');		
        $product_ids = [];
        if(!empty($products->related_products)){
            foreach ($products->related_products as $key1 => $val1) {
                $product_ids[] = $val1->related_product_id;
            }
        }
		$productLocales = [];
		if(!empty($products->productLocale)){
            foreach ($products->productLocale as $keyLocale => $valLocale) {
				$productLocales[$valLocale->lang_code]['product_name_'.$valLocale->lang_code] = $valLocale->product_name;
				$productLocales[$valLocale->lang_code]['description_'.$valLocale->lang_code]  = $valLocale->description;
            }
        }

        return view('admin.product.edit', ['products'=>$products, 'product_list'=>$product_list, 'productLocale'=>$productLocales, 'product_ids'=>$product_ids]);
    }

	/**
    *** Product image.
    **/
    public function product_image(Request $request){
        $products = new Product;
        return view('admin.product.product_image', ['products' => $products]);
    }

    /**
    *** Upload File.
    **/
    public function multifileupload($id = null){
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);

        $products = Product::find($id);
		return view('admin.product.product_image',['products'=>$products]);
    }

	/**
	*** Store uploaded image
	**/
    public function store($product_id = null, Request $request){
        $product_id = $product_id;
		$image = $request->file('file');
		$filename = $image->getClientOriginalName();
        $location = public_path('/uploaded/product/'.$filename);
        if(Image::make($image)->save($location)){
            $product_image = [];
            $product_image['product_id'] = $product_id;
            $product_image['name'] = $filename;

            $thumb_location = public_path('/uploaded/product/thumb/'.$filename);
            Image::make($image)->resize(520,350)->save($thumb_location);

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
    *** File destroy.
    **/
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
    *** Check Product title.
    **/
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
    *** Delete product.
    **/
    public function delete($id = null, Request $request){
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
        if(Product::where(['id' => $id])->update(['is_deleted' => 'Y','deleted_at' => date('Y-m-d H:i:s')])){
            $request->session()->flash('alert-success', 'Product deleted successfully');
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
            return redirect()->back();
        }
    }

    /**
    *** Delete product images.
    **/
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
            $request->session()->flash('alert-success', 'Image deleted successfully');
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! Default image can not deleted');
            return redirect()->back();
        }

    }

    /**
    *** Change product status - block or unblock.
    **/
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
            $request->session()->flash('alert-success', 'Product '.$blockText.' successfully');
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
            return redirect()->back();
        }
    }

    /**
    *** Make default image.
    **/
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
}