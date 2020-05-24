<?php

namespace App\Http\Controllers;


use App\Models\Item;
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
    public function list()
    {
        $all = User::all()->map(function ($model) {
            return UserPresenter::present($model);
        });
        return response()->json($all);
    }

    /**
     * Отдаем данные по конкретному пользователю
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $id) {
        $item = Item::find($id);
        return response()->json($item);
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        try {
            $user = User::query()->findOrFail($request->get('id'));
            $role = Role::query()->find($request->get('role_id', 2))->first();
            $user->role()->associate($role)->save();
            $user->update([
                'login' => $request->get('login', ''),
                'password' => Hash::make($request->get('password', ''))
            ]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Пользователь не найден']);
        }
    }

    /**
     * Удаляем пользователя
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            User::query()->findOrFail($request->get('id'))->delete();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Пользователь не найден']);
        }
        return response()->json(['success' => true]);
    }
}
