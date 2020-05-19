<?php


namespace App\Presenters;


use Illuminate\Database\Eloquent\Model;

interface PresenterInterface
{
    public static function present(Model $model);
}
