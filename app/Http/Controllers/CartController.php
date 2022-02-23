<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    function push_cart($product_id)
    {
        $found = false;

        if (session()->has('cart'))
        {
            $products = session('cart');
            $ids = array();

            foreach ($products as $index => $product)
            {
                if ($product == $product_id)
                {
                    unset($products[$index]);
                    session()->put('cart', $products);
                    $found = true;
                    break;
                }
            }

        }
        if (!$found)
        {
            session()->push('cart', $product_id);
        }
    }
}
