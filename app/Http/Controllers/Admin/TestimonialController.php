<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Auth;

use App\Model\Testimonial;

class TestimonialController extends CommonController
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
        if($this->checkPermission('testimonial','list') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
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
                                        ->paginate(20);
        return view('admin.testimonial.list', ['testimonial' => $testimonial, 'request' => $request]);
    }

    /**
     * Add Testimonial.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        /* check permission */
        if($this->checkPermission('testimonial','add') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        $testimonial = new Testimonial;
        if($request->isMethod('PUT')){
            $request->validate([
                'title' => 'required',
                'content' => 'required'
            ]);
            if($testimonial->create(array_merge($request->except(['_method', '_token']), ['created_by' => Auth::guard('admin')->user()->id]))){
                $request->session()->flash('alert-success', 'Testimonial successfully added.');
                return redirect()->route('admin.testimonial.list');
            }else{
                $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back()->with($request->except(['_method', '_token']));
            }
        }
        return view('admin.testimonial.add', ['testimonial' => $testimonial]);
    }

    /**
     * Edit Testimonial.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null, Request $request)
    {
        /* check permission */
        if($this->checkPermission('testimonial','edit') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
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
            if($testimonial->update($request->except(['_method', '_token', 'redirect']))){
                $request->session()->flash('alert-success', 'Testimonial successfully updated.');
                if($request->query('redirect') != null){
                    return redirect($request->query('redirect'));
                }else{
                    return redirect()->route('admin.testimonial.list');
                }
            }else{
                $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back()->with($request->except(['_method', '_token']));
            }
        }
        return view('admin.testimonial.edit', ['testimonial' => $testimonial]);
    }

    /**
     * Delete cms.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id = null, Request $request)
    {
        /* check permission */
        if($this->checkPermission('testimonial','delete') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
        if(Testimonial::where(['id' => $id])->delete()){
            $request->session()->flash('alert-success', 'Testimonial successfully deleted.');
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
            return redirect()->back();
        }
    }

    /**
     * Change cms status - block or unblock.
     *
     * @return \Illuminate\Http\Response
     */
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
            $request->session()->flash('alert-success', 'Testimonial successfully '.$blockText);
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
            return redirect()->back();
        }
    }
}
