<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title', 'is_sales', 'description', 'image_url', 'price', 'count'];
}
