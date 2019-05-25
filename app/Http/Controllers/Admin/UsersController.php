<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Mail\UserEmailVerification;

use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

use Auth;

use App\Model\User;

class UsersController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function list(Request $request)
    {
        /* check permission */
        if($this->checkPermission('users','list') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }

        $orWhere = array();
        $where[] = ['user_type', '=', 'C'];
        // search confitions
        if($request->search != null){
            $orWhere[] = ['email', 'LIKE', '%'.$request->search.'%'];
            $orWhere[] = ['first_name', 'LIKE', '%'.$request->search.'%'];
            $orWhere[] = ['last_name', 'LIKE', '%'.$request->search.'%'];
            $orWhere[] = ['mobile', 'LIKE', '%'.$request->search.'%'];

            // When searching with full name
            if(strpos($request->search, ' ') !== false){
                $exploded_search = explode(' ', $request->search);
                $orWhere[] = ['first_name', 'LIKE', '%'.$exploded_search[0].'%'];
                $orWhere[] = ['last_name', 'LIKE', '%'.$exploded_search[1].'%'];
            }
        }
        $users = User::where($where)
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
        return view('admin.user.list', ['users' => $users, 'request' => $request]);
    }

    /**
     * Add users.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        /* check permission */
        if($this->checkPermission('users','add') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        $users = new User;
        if($request->isMethod('PUT')){
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
            ]);
            if($request->email_verified == null || $request->email_verified != 'Y'){
                Mail::to($request->email)->queue(new UserEmailVerification());
            }
            if($request->mobile == null){
                $request->offsetSet('mobile', '');
            }
            if($users->create(array_merge($request->except(['_method', '_token']), ['created_by' => Auth::guard('admin')->user()->id, 'password' => '12345']))){
                $request->session()->flash('alert-success', 'User successfully added.');
                return redirect($request->query('redirect'));
            }else{
                $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back()->with($request->except(['_method', '_token']));
            }
        }
        return view('admin.user.add', ['users' => $users]);
    }

    /**
     * Edit users.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null, Request $request)
    {
        /* check permission */
        if($this->checkPermission('users','edit') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
        $users = User::find($id);
        if($request->isMethod('PUT')){
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
            ]);
            if($request->mobile == null){
                $request->offsetSet('mobile', '');
            }
            if($users->update($request->except(['_method', '_token', 'redirect']))){
                $request->session()->flash('alert-success', 'User successfully updated.');
                if($request->query('redirect') != null){
                    return redirect($request->query('redirect'));
                }else{
                    return redirect()->route('admin.user.list');
                }
            }else{
                $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
                return redirect()->back()->with($request->except(['_method', '_token']));
            }
        }
        return view('admin.user.edit', ['users' => $users]);
    }

    /**
     * View user Detail.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($id = null, Request $request)
    {
        /* check permission */
        if($this->checkPermission('users','view') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }

        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
        $users = User::find($id);
        return view('admin.user.view', ['users' => $users]);
    }

    /* Change password section */
    public function changePassword(Request $request)
	{
        $user_data = Auth::guard('admin')->user();        
        if ($request->isMethod('post')) {
            $validator = \Validator::make($request->all(), [
                'password' => 'required|min:5',
                'confirm_password' => 'required|same:password',
            ]);            
            if ($validator->fails()){
                $request->session()->flash('alert-danger', 'There was an unexpected error. Try again!');
                return redirect()->back();
            }
            if(!Hash::check($request->old_password, $user_data->password)){
                $request->session()->flash('alert-danger', 'Old password does not match.');
                return redirect()->back();
            }else{
                $request->password = Hash::make($request->password);

                if($user_data){
                    $user_data->password = $request->password;
                    $user_data->save();

                    $request->session()->flash('alert-success', 'Password updated successfully.');
                    return redirect()->back()->with($request->except(['_method', '_token']));
                }else{
                    $request->session()->flash('alert-danger', 'There was an unexpected error. Try again!');
                    return redirect()->back();
                }  
            }
        }
        return view('admin.user.change_password', ['user_data' => $user_data]);
    }

    /**
     * delete users.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete($id = null, Request $request)
    {
        /* check permission */
        if($this->checkPermission('users','delete') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
        if(User::where(['id' => $id, 'user_type' => 'C'])->delete()){
            $request->session()->flash('alert-success', 'User successfully deleted.');
            return redirect()->route('admin.user.list');
        }else{
            $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
            return redirect()->back();
        }
    }

    /**
     * change user status - block or unblock.
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
        if(User::where(['id' => $id, 'user_type' => 'C'])->update(['is_block' => $block])){
            $request->session()->flash('alert-success', 'User successfully '.$blockText);
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
            return redirect()->back();
        }
    }
}
