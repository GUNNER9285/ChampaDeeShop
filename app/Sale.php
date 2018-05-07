<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sales";
    protected $fillable = [
        'bill_id', 'product_id', 'amount', 'totalprice'
    ];
    public $timestamps = true;


}
