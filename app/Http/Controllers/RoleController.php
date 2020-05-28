<?php


namespace App\Http\Controllers;


use App\Models\Role;
use App\Presenters\RolePresenter;
use Illuminate\Http\Request;

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

    /**
     * Отдаем данные по конкретной роли
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $id)
    {
        $item = Role::find($id);
        return response()->json($item);
    }

    public function delete(Request $request)
    {
        $role = Role::query()->find($request->get('id'));
        if ($role->exists()) {
            $role->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['error' => 'Роль не найдена']);
    }

    public function create(Request $request)
    {
        if ($request->filled('id')) {

        }
        $role = Role::updateOrCreate(['id' => $request->get('id', 0)], $request->all());
        return response()->json(['status' => 'success', 'id' => $role->id]);
    }
}
