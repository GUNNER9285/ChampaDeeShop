<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";
    protected $fillable = [
        'status', 'amount', 'user_id', 'imgPath', 'address', 'trackNo'
    ];
    public $timestamps = true;

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
