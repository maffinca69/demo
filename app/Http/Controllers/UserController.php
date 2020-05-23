<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Presenters\UserPresenter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $login = $request->get('login', '');
        $user = User::query()->where(['login' => $login])->exists();
        if ($user) {
            return response()->json(['error' => 'Такой пользователь уже существует']);
        }
        $user = new User();
        $user->login = $request->get('login', '');
        $user->password = Hash::make($request->get('password', ''));
        $role = Role::query()->find($request->get('role_id'))->first();
        $user->role()->associate($role);
        $user->save();
        return response()->json(['success' => true, 'id' => $user->id]);
    }
}
