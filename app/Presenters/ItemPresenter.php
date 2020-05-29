<?php


namespace App\Presenters;


use Illuminate\Database\Eloquent\Model;

class ItemPresenter implements PresenterInterface
{

    public static function present(Model $model)
    {
        $category = $model->category;
        return [
            'id' => $model->id,
            'title' => $model->title,
            'description' => $model->description,
            'price' => $model->price,
            'image_url' => $model->image_url,
            'count' => $model->count,
            'is_sales' => $model->is_sales,
            'category' => $category
        ];
    }
}
