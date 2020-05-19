<?php

namespace App\Http\Controllers;


use App\Presenters\UserPresenter;
use App\User;
use Laravel\Lumen\Routing\Controller as BaseController;

class UserController extends BaseController
{
    /**
     * Отдаем данные по всем
     */
    public function list() {
        $all = User::all()->map(function ($model) {
            return UserPresenter::present($model);
        });
        return response()->json($all);
    }
}
