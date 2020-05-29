<?php


namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;


class CategoryController extends BaseController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $categories = Category::query()->orderByDesc('id')->paginate(25);
        return response()->json($categories);
    }

    /**
     * Отдаем данные по конкретной категории
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $id)
    {
        $item = Category::find($id);
        return response()->json($item);
    }

    public function delete(Request $request)
    {
        $category = Category::query()->find($request->get('id'));
        if ($category) {
            $category->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['error' => 'Категория не найдена']);
    }

    public function create(Request $request)
    {
        $category = Category::updateOrCreate(['id' => $request->get('id', 0)], $request->all());
        return response()->json(['status' => 'success', 'id' => $category->id]);
    }
}
