<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Presenters\ItemPresenter;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ItemController extends BaseController
{
    /**
     * Отдаем данные по всем товарам
     */
    public function list() {
        $items = Item::query()
            ->orderByDesc('id')
            ->paginate(25)
            ->map(function ($q) {
                return ItemPresenter::present($q);
            });
        return response()->json($items);
    }

    /**
     * Отдаем данные по конкретному товару
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(int $id) {
        $item = Item::find($id);
        $item = ItemPresenter::present($item);
        return response()->json($item);
    }

    /**
     * Создаем новый товар или обновляем существующий
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $item = Item::updateOrCreate(['id' => $request->get('id', 0)], $request->all());
        return response()->json(['status' => 'success', 'id' => $item->id]);
    }

    /**
     * Удаляем запись
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request)
    {
        try {
            Item::query()->findOrFail($request->get('id'))->delete();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Товар не найден']);
        }
        return response()->json(['success' => true]);
    }
}
