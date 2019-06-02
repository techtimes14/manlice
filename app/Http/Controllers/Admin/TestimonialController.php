<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;
use Image;
use App\Model\Testimonial;
use CommonHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TestimonialController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
    *** Show the listing.
    **/
    public function list(Request $request)
    {
        $orWhere = array();
        $where = [];
        // search confitions
        if($request->search != NULL){
            $orWhere[] = ['title', 'LIKE', '%'.$request->search.'%'];
            $orWhere[] = ['content', 'LIKE', '%'.$request->search.'%'];            
        }
        $testimonial = Testimonial::where($where)
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
                                        ->paginate(CommonHelper::ADMIN_TESTIMONIAL_LIMIT);
        return view('admin.testimonial.list', ['testimonial' => $testimonial, 'request' => $request]);
    }

    /**
    *** Add Testimonial.
    **/
    public function add(Request $request)
    {
        $testimonial = new Testimonial;
        if($request->isMethod('PUT')){
            $request->validate([
                'title' 	=> 'required',
				'image' 	=> 'required',
                'content' 	=> 'required'
            ]);
			
			$image	  = Input::file('image');
            $filename = 'manlice-testimonial-'.time().'.'.$image->getClientOriginalExtension();
            $location = public_path('/uploaded/testimonial/'.$filename);
			if(Image::make($image)->save($location)){
				$thumb_location = public_path('/uploaded/testimonial/thumb/'.$filename);
				Image::make($image)->resize(262,262)->save($thumb_location);
				
				if($testimonial->create(['title' => $request->title, 'content' => $request->content, 'image' => $filename])){
                    $request->session()->flash('alert-success', 'Testimonial added successfully');
                    return redirect()->route('admin.testimonial.list');
                }else{
                    $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                    return redirect()->back()->with($request->except(['_method', '_token']));
                }				
			} else {
				$request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back()->with($request->except(['_method', '_token']));
			}
        }
        return view('admin.testimonial.add', ['testimonial' => $testimonial]);
    }

    /**
    *** Edit Testimonial.
    **/
    public function edit($id = null, Request $request)
    {
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id          = base64_decode($id);
        $testimonial = Testimonial::find($id);
        if($request->isMethod('PUT')){
            $request->validate([
                'title'   => 'required',
                'content' => 'required'
            ]);
			
			$filename = $testimonial->image;
            if(Input::file('image') != null){
				$image	  = Input::file('image');
				$filename = 'manlice-testimonial-'.time().'.'.$image->getClientOriginalExtension();
				
				$location = public_path('/uploaded/testimonial/'.$filename);
				if(Image::make($image)->save($location)) {
					$thumb_location = public_path('/uploaded/testimonial/thumb/'.$filename);
					Image::make($image)->resize(262,262)->save($thumb_location);
					
					$largeImage = public_path().'/uploaded/testimonial/'.$testimonial->image;
					$thumbImage = public_path().'/uploaded/testimonial/thumb/'.$testimonial->image;
					@unlink($largeImage);
					@unlink($thumbImage);
				}
			}
			
			if($testimonial->update(['title' => $request->title, 'content' => $request->content, 'image' => $filename])){
                $request->session()->flash('alert-success', 'Testimonial successfully updated.');
                return redirect()->route('admin.testimonial.list');
            }else{
                $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back()->with($request->except(['_method', '_token']));
            }
        }
        return view('admin.testimonial.edit', ['testimonial' => $testimonial]);
    }

    /**
    *** Delete
    **/
    public function delete($id = null, Request $request)
    {
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
		$testimonial = Testimonial::find($id);
		$largeImage = public_path().'/uploaded/testimonial/'.$testimonial->image;
		$thumbImage = public_path().'/uploaded/testimonial/thumb/'.$testimonial->image;
		@unlink($largeImage);
		@unlink($thumbImage);
		
        if(Testimonial::where(['id' => $id])->delete()){
            $request->session()->flash('alert-success', 'Testimonial deleted successfully');
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
            return redirect()->back();
        }
    }

    /**
    *** Change status - block or unblock.
    **/
    public function status($id = null, $status = null, Request $request)
    {
        if($id == null || $status == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
        $block = 'Y';
        $blockText = 'blocked';
        switch($status){
            case 'Y': 
                $block = 'N';
                $blockText = 'unblocked';
                break;
            case 'N':
                $block = 'Y';
                $blockText = 'blocked';
                break;
            default:
                $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back();
        }
        if(Testimonial::where(['id' => $id])->update(['is_block' => $block])){
            $request->session()->flash('alert-success', 'Testimonial '.$blockText.' successfully');
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
            return redirect()->back();
        }
    }
}