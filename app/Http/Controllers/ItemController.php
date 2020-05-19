<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class ItemController extends BaseController
{
    /**
     * Отдаем данные по всем
     */
    public function list() {
        dd('list');
    }
    
    /**
     * Отдаем данные по конкретной записи
     */
    public function get(int $id) {
        dd('get - ' . $id);
    }
}
