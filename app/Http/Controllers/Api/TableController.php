<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function getTables()
    {
        $tables = Table::all();
        return response([
            'tables' => $tables
        ], 200);
    }
}
