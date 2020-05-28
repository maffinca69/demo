<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models
 *
 * @property string $name - deprecation
 * @property string $description
 * @property string $title
 */
class Role extends Model
{
    const ROLE_ADMIN = 'admin';
    const ROLE_MANAGER = 'manager';

    public $timestamps = false;

    protected $fillable = ['title', 'description'];
}
