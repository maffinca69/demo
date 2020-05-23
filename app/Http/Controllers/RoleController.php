<?php


namespace App\Http\Controllers;


use App\Models\Role;
use App\Presenters\RolePresenter;
use function foo\func;

class RoleController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $roles = Role::query()->paginate(7)->map(function ($model) {
            return RolePresenter::present($model);
        });
        return response()->json($roles);
    }
}
