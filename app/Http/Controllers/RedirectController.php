<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectController extends Controller
{
    //
    function index()
    {
        if (! session()->has('cart'))
            session()->put('cart', array());
        return Auth::user()->role == 'seller' ? ProductController::index() : view('customer.index');
    }
    function new_product()
    {
        return Auth::user()->role == 'seller'? ProductController::new_product() : "";
    }
    function out()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
