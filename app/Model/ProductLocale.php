<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductLocale extends Model
{
    protected $table = 'product_locale';
	
	public $timestamps = false;

    protected $guarded = [];
    
}