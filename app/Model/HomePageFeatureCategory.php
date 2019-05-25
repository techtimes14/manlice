<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HomePageFeatureCategory extends Model
{
    protected $table = 'home_page_feature_categories';

    protected $guarded = [];

    public function category(){
    	return $this->belongsTo('App\Model\Category');
    }

}
