<?php

namespace App\Http\Controllers;

use App\Models\Order_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    //
    function view()
    {
        $user_id = Auth::id();
        $orders_items = Order_Item::leftJoin('products', 'order__items.product', '=', 'products.id')
            ->leftJoin('orders', 'order__items.order', '=', 'orders.id')
            ->leftJoin('users', 'orders.user', '=', 'users.id')
            ->where('products.owner', $user_id)
            ->get(['products.id', 'products.name', 'products.picture', 'products.owner','products.total_price',
                'order__items.quantity','order__items.order', 'orders.user as order_owner','orders.status', 'users.name as order_owner_name']);
        return view('seller.orders', compact('orders_items'));
    }
}