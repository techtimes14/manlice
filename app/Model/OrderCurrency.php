<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderCurrency extends Model
{
    protected $table = 'order_currencies';

    protected $guarded = [];

    public $timestamps = false;
}
