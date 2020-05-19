<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'description'];

    public function image()
    {
        return $this->belongsToMany(User::class);
    }

}