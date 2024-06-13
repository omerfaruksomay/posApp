<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function getMenus($category_id)
    {
        $menus = Menu::where('category_id', $category_id)->get();
        return response([
            'menus' => $menus,
        ], 200);
    }
}
