<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Model\Setting;
use Auth;
use Illuminate\Support\Facades\View;

class CommonController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public $siteSettings;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		$settings = Setting::first();
		View::share('siteSettings', $settings);
    }

    /**
     * check input values
     *
     * @return \Illuminate\Http\Response
     */
    public function hasInput(Request $request)
    {
        if($request->has('_token')) {
            return count($request->all()) > 1;
        } else {
            return count($request->all()) > 0;
        }
    }

    /**
     * add taxonomy
     *
     * @return \Illuminate\Http\Response
     */
    public function addTaxonomy($arr = [])
    {
        if(count($arr) > 0){
            $taxonomy = new Taxonomy;
            $arr['created_by'] = Auth::guard('admin')->user()->id;
            if($data = $taxonomy->create($arr)){
                return $data->id;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * update taxonomy
     *
     * @return \Illuminate\Http\Response
     */
    public function updateTaxonomy($arr = [])
    {
        if(count($arr) > 0){
            $taxonomy = Taxonomy::find($arr['id']);
            $slug = $taxonomy->slug;
            $arr['created_by'] = Auth::guard('admin')->user()->id;
            if($taxonomy->update($arr)){
              if(isset($arr['slug'])){
                //dd($slug . $arr['slug']);
                Menu::where(['url_keyword' => $slug])->update(['url_keyword' => $arr['slug']]);
                SideMenu::where(['url_keyword' => $slug])->update(['url_keyword' => $arr['slug']]);
              }
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function checkPermission($controller,$method){
        //dd(session('permissions.user_type'));
        if(session('permissions.'.strtolower($controller).'.'.strtolower($method)) == 1 || session('permissions.user_type') =='A'){
            return true;
        }else{
            return false;
        }
    }

    public function get_date_time() {
        /*$ip = '103.251.83.170';
        //$ip = '110.142.215.61';
        //$ip = $_SERVER['REMOTE_ADDR'];
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

        if( isset($query) && $query['status'] == 'success' ) {
            date_default_timezone_set($query['timezone']);
            return date('Y-m-d H:i:s');
        }else{
            return date('Y-m-d H:i:s');
        }*/
        return date('Y-m-d H:i:s');
    }

    //Getting IP wise details and current time
    public static function get_time(){
        /*$ip = '103.251.83.170';
        //$ip = '110.142.215.61';
        //$ip = $_SERVER['REMOTE_ADDR'];
        $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

        if( isset($query) && $query['status'] == 'success' ) {
            date_default_timezone_set($query['timezone']);
            return date('H:i');
        }else{
            return date('H:i');
        }*/
        return date('H:i');
    }

}
