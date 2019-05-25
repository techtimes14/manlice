<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

use Hash;

use App\Model\AdminPermision;
use App\Model\AdminMenu;

//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends CommonController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function validateData($data){
        if(Auth::validate($data->only('email','password'))) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Show the admin login and check login credentials.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        if($this->hasInput($request)){
            if($this->validateData($request)){
                if (Auth::guard('admin')->attempt(array_merge($request->only('email','password'), ['user_type' => ['A','AG']]))) {

                    $user_id = Auth::guard('admin')->user()->id;
                    $this->put_session($user_id);

                    return redirect()->route('admin.dashboard');
                }else{
                    $request->session()->flash('alert-danger', 'Invalid Credentials!');
                    return redirect()->back()->with($request->only('email'));
                }
            }else{
                $request->session()->flash('alert-danger', 'Invalid Credentials!');
                return redirect()->back()->with($request->only('email'));
            }
        }
        return view('admin.auth.login');
    }

    /* For permission session store */
    public function put_session($user_id = null){
        Session::put('permissions.user_type', Auth::guard('admin')->user()->user_type);
        $permision = AdminPermision::where('user_id',$user_id)->get();
        if(count($permision) >0){
            foreach ($permision as $key => $menus) {
                $k=$menus->admin_menu;
                $controller_method=strtolower($k['controller_name']).'.'.strtolower($k['method_name']);
                Session::put('permissions.'.$controller_method, 1);
            }
        }
    }
                    
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Session::forget('permissions');
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}