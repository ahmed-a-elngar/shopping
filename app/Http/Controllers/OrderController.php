<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function add($quantities)
    {
        $quantities = preg_split('/,/', $quantities);
        // save order
        $order = new Order();
        $order->user = Auth::id();
        $order->status = 0;
        $order->save();
        // save order items
        $products_ids = session('cart');
        $products = Product::whereIn('id', $products_ids)->get();
        foreach ($products as $index=>$product)
        {
            $order_item = new Order_Item();
            $order_item->product = $product->id;
            $order_item->quantity = $quantities[$index];
            $order_item->order = $order->id;
            $order_item->save();
            // update stock
            $stock = Stock::find($product->stock);
            $stock->quantity -= $order_item->quantity;
            $stock->save();
        }
        session()->put('cart', null);
        return route('index');
    }
}
