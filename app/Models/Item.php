<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title', 'is_sales', 'description', 'image_url', 'price', 'count', 'category_id'];

    public function getIsSalesAttribute($value) {
        return (boolean) $value;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
