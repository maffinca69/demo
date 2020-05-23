<?php


namespace App\Presenters;


use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class RolePresenter implements PresenterInterface
{

    /**
     * @param Model $model
     * @return array
     */
    public static function present(Model $model)
    {
        return [
            'id' => $model->id,
            'name' => Role::ROLES[$model->name],
            'description' => $model->description
        ];
    }
}
