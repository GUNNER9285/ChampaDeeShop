<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    protected $fillable = [
        'img1', 'img2', 'img3', 'title', 'description', 'price', 'quantity', 'category_id', 'type', 'size', 'color', 'sex'
    ];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
