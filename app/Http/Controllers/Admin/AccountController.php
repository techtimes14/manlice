<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Auth;

use App\Model\Setting;
use App\Model\SearchKeyword;

use Analytics;

use Spatie\Analytics\Period;

class AccountController extends CommonController
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
     * Show the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        return view('admin.account.dashboard');
    }

    public function fetchMostVisitedPages($period = 1){
        $analyticsData = Analytics::fetchMostVisitedPages(Period::days($period));
        dd($analyticsData);
    }

    /**
     * Show the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function settings(Request $request)
    {
        /* check permission */
        if($this->checkPermission('Account','settings') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        $settings = Setting::first();
        $hasRecord = true;
        if($settings == null){
            $settings = new Setting;
            $hasRecord = false;
        }
        if($this->hasInput($request)){
            if($hasRecord){
                if($settings->update($request->except(['_method', '_token']))){
                    $request->session()->flash('alert-success', 'Settings successfully updated.');
                    return redirect()->back()->with($request->except(['_method', '_token']));
                }else{
                    $request->session()->flash('alert-danger', 'Unable to update the settings!');
                    return redirect()->back()->with($request->except(['_method', '_token']));
                }
            }else{
                if($settings->create($request->except(['_method', '_token']))){
                    $request->session()->flash('alert-success', 'Settings successfully saved.');
                    return redirect()->back()->with($request->except(['_method', '_token']));
                }else{
                    $request->session()->flash('alert-danger', 'Unable to save the settings!');
                    return redirect()->back()->with($request->except(['_method', '_token']));
                }
            }
        }
        return view('admin.account.settings')->with('settings', $settings);
    }
    
    public function searchKeyword(Request $request){
         if($this->checkPermission('Account','searchKeyword') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        $orWhere = array();
        $where = [];
        // search confitions
        if($request->search != null){
            $orWhere[] = ['search_key', 'LIKE', '%'.$request->search.'%'];
        }
        $searchKeywords = SearchKeyword::where($where)
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
                            $query->orderBy('count', 'desc');
                        })
                        ->paginate(20);
        return view('admin.account.searchKeyword', ['searchKeywords' => $searchKeywords, 'request' => $request]);
    }
    /**
     * Delete addon.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchKeyDelete($id = null, Request $request)
    {
        /* check permission */
        if($this->checkPermission('Account','searchKeyword') == false){
            $request->session()->flash('alert-danger', "You don't have permissions to access this page.");
            return redirect()->route('admin.dashboard');
            exit;
        }
        if($id == null){
            return redirect()->route('admin.dashboard');
        }
        $id = base64_decode($id);
        if($data = SearchKeyword::find($id)){
            $data->delete();
            $request->session()->flash('alert-success', 'Search Keyword successfully deleted.');
            return redirect()->back();
        }else{
            $request->session()->flash('alert-danger', 'Sorry! There was an unexpected error. Try again!');
            return redirect()->back();
        }
    }
}
