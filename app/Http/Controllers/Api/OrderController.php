<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function orderFood(Request $request)
    {
        try {
            $menu = Menu::find($request->menu_id);
            $table_id = $request->table_id;
            $table_name = $request->table_name;
            $sale = Sale::where('table_id', $table_id)->where('sale_status', 'unpaid')->first();

            if (!$sale) {
                $user = Auth::user();
                $sale = new Sale();
                $sale->table_id = $table_id;
                $sale->table_name = $table_name;
                $sale->user_id = $user->id;
                $sale->user_name = $user->name;
                $sale->total_price = 0; // initialize total_price
                $sale->save();
                $sale_id = $sale->id;

                $table = Table::find($table_id);
                $table->status = "unavailable";
                $table->save();
            } else {
                $sale_id = $sale->id;
                $table = Table::find($table_id); // Bu satırı ekledik
            }

            $saleDetail = new SaleDetail();
            $saleDetail->sale_id = $sale_id;
            $saleDetail->menu_id = $menu->id;
            $saleDetail->menu_name = $menu->name;
            $saleDetail->menu_price = $menu->price;
            $saleDetail->quantity = $request->quantity;
            $saleDetail->save();

            $sale->total_price = $sale->total_price + ($request->quantity * $menu->price);
            $sale->save();

            return response()->json([
                'message' => 'Order placed successfully',
                'sale_id' => $sale_id,
                'total_price' => $sale->total_price,
                'table_status' => $table->status
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }
    public function getOrdersByTable($table_id)
    {
        $orders = Sale::where('table_id', $table_id)
            ->where('sale_status', 'unpaid')
            ->with('saleDetails')
            ->get();

        return response()->json($orders);
    }
}
