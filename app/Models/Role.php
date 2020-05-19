<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\Models
 *
 * @property string $name
 * @property string $description
 */
class Role extends Model
{
    const ROLE_ADMIN = 'admin';
    const ROLE_MANAGER = 'manager';

    const ROLES = [
        'manager' => 'Менеджер',
        'admin' => 'Администратор',
    ];

    public $timestamps = false;

    protected $fillable = ['name', 'description'];
}
