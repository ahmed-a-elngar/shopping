<?php

namespace App\Http\Controllers;


use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use App\Models\Stock;
use App\Models\Target;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\String_;

class ProductController extends Controller
{
    // seller
    static function new_product()
    {
        $categories = Category::all();
        $targets = Target::all();
        $colors = Color::all();
        $sizes = Size::all();
        return view('seller.new', compact('categories', 'targets', 'colors', 'sizes'));
    }
    static function index()
    {
        $products = Product::where('owner', Auth::id())->orderBy('updated_at', 'desc')->get();
        $categories = Category::all();
        $targets = Target::all();
        $stocks_ids = array();
        foreach ($products as $product)
        {
            array_push($stocks_ids, $product->stock);
        }
        $stocks = Stock::whereIn('id', $stocks_ids)->get();
        return view('seller.index', compact('products', 'categories', 'targets' ,'stocks'));
    }
    function create()
    {
        $product = $this->prepareSavingObj(request());
        $product->save();
        return redirect()->route('products');
    }
    function edit($id)
    {
        $categories = Category::all();
        $targets = Target::all();
        $colors = Color::all();
        $sizes = Size::all();
        $product = Product::where('id', $id)->get();
        $stock = Stock::where('id', $product[0]->stock)->get();
        return view('seller.edit', compact('categories', 'id', 'product', 'targets', 'colors', 'sizes', 'stock'));
    }
    function update($id)
    {
        $product = $this->prepareUpdatingObj(\request());
        Product::where('id', $id)->update($product);
        return redirect()->route('index');
    }
    function prepareSavingObj(Request $request)
    {

        // upload & prepare image
        $img_name = $request->product_image->getClientOriginalName();
        $request->product_image->move(public_path('pics'), $img_name);

        // create the new product
        $product = new Product();
        $product->name =  $request->product_name;
        $product->picture = $img_name;
        $product->description =  $request->product_desc;
        $product->price =  $request->product_price;
        $product->total_price =  $request->product_total_price;
        $product->owner = Auth::id();
        // make a stock
        $stock = new Stock();
        $stock->quantity =  $request->product_quantity;
        $stock->color = (Color::where('value', $request->product_color)->get())[0]->id;
        $stock->size = (Size::where('name', $request->product_size)->get())[0]->id;;
        $stock->save();
        // store product stock
        $product->stock = $stock->id;
        $product->category = (Category::where([
            ['target', (Target::where('name', $request->product_target)->get())[0]->id],
            ['name',  $request->product_category]
        ])->get())[0]->id;
        $product->brand = 1;

        return $product;
    }
    function prepareUpdatingObj(Request $request)
    {
        // create the new product array
        $product = array();

        if ($request->hasFile('product_image'))
        {
            // upload & prepare image
            $img_name = $request->product_image->getClientOriginalName();
            $request->product_image->move(public_path('pics'), $img_name);
            $product['picture'] = $img_name;
        }

        // prepare sizes
        $sizes = '';
        foreach ($request->product_size as $size)
        {
            $sizes .= $size . ',';
        }

        $product['name'] = $request->product_name;
        $product['description'] = $request->product_desc;
        $product['price'] = $request->product_price;
        $product['total_price'] = $request->product_total_price;
        $product['quantity'] = $request->product_quantity;
        $product['colors'] = $request->product_colors;
        $product['sizes'] = $sizes;
        $product['owner'] = Auth::id();
        $product['category'] = (Category::where([
            ['target',$request->product_target],
            ['name', $request->product_category]
        ])->get())[0]->id;
        $product['brand'] = 1;

        return $product;
    }
    function delete($id)
    {
        $stock_id = Product::where('id', $id)->get()[0]->stock;
        Product::find($id)->delete();
        Stock::find($stock_id)->delete();
    }
    function search($input)
    {
        $reasult = Product::where([['name','LIKE', "%".$input."%"],['owner','=', Auth::id()]])->orderBy('updated_at', 'desc')->paginate(3);
        $categories = Category::all();
        $targets = Target::all();
        $stocks_ids = array();
        foreach ($reasult as $product)
        {
            array_push($stocks_ids, $product->stock);
        }
        $stocks = Stock::whereIn('id', $stocks_ids)->get();
        return [$reasult, $categories, $targets, $stocks];
    }
    // customer
    function view($gendar)
    {
        $target_details = Target::where('name', strtolower($gendar))->first();
        if($target_details)
        {
            $sellers = User::where('role', 'seller')->get();
            $categories = Category::where('target', $target_details->id)->get();
            $brands = Brand::all();
            $colors = Color::all();
            $sizes = Size::all();
            $choices = array();
            foreach ($categories as $category)
            {
                array_push($choices, $category->id);
            }
            $products = Product::whereIn('category', $choices)->paginate(24);
            return view('customer.products', compact('products', 'categories', 'sellers', 'brands', 'colors', 'sizes'));
        }
        else
            return 'error';

    }
    function details($product_id)
    {
        $product = Product::where('id', $product_id)->get()[0];
        $seller = User::where('id', $product->owner)->get()[0];
        $stock = Stock::where('id', $product->stock)->first();
        $stock_quantity = $stock->quantity;
        $stock_color = Color::where('id', $stock->color)->first();
        $stock_size = Size::where('id', $stock->size)->first();
        return [$product, $seller, $stock_quantity, $stock_color, $stock_size];
    }
    function cart()
    {
        if (session()->has('cart'))
        {
            $products = Product::leftJoin('stocks', 'products.stock', '=', 'stocks.id')
                ->leftJoin('colors', 'stocks.color', '=', 'colors.id')
                ->leftJoin('sizes', 'stocks.size', '=', 'sizes.id')
                ->leftJoin('users', 'products.owner', '=', 'users.id')
                ->whereIn('products.id', session('cart'))
                        ->get(['products.*', 'stocks.color', 'stocks.size', 'stocks.quantity','colors.value as color_value', 'sizes.name as product_size',
                            'users.name as owner_name']);
        }
        else{
            $products = array();
        }
        return view('customer.checkout', compact('products'));
    }
    function filter($gendar, $filter_options)
    {
        // $gendar is an random category id will be used to detect products type[men, women]
        $filter_options = preg_split('/,/', $filter_options);
        $products = $this->filterCategory($filter_options[0], $gendar);
        $products = $this->filterBrand($products, $filter_options[1]);
        $products = $this->filterColor($products, $filter_options[2]);
        $products = $this->filterSize($products, $filter_options[3]);
        $products = $this->filterPrice($products, $filter_options[4], $filter_options[5]);
        // sellers ids
        foreach ($products as $product)
        {
            $product->owner_name = User::find($product->owner)->first()->name;
        }
        return $products;
    }
    function filterCategory($category_id, $gendar)
    {
        if($category_id != 0)
        {
            $products = Product::where('category', $category_id)->get();
        }
        else
        {
            $target = Category::where('id', $gendar)->first()->target;
            $categories = Category::where('target', $target)->get();
            $categories_ids = array();
            foreach ($categories as $category)
            {
                array_push($categories_ids, $category->id);
            }
            $products = Product::whereIn('category', $categories_ids)->get();
        }
        return $products;
    }
    function filterBrand($products, $brand_id)
    {
        if ($brand_id != 0)
        {
            $results = array();
            foreach ($products as $product)
            {
                if ($product->brand == $brand_id)
                    array_push($results, $product);
            }
            return $results;
        }
        return $products;
    }
    function filterColor($products, $color_id)
    {
        if ($color_id != 0)
        {
            $results = array();
            foreach ($products as $product)
            {
                if (Stock::where('id', $product->stock)->first()->color == $color_id)
                    array_push($results, $product);
            }
            return $results;
        }
        return $products;
    }
    function filterSize($products, $size_id)
    {
        if ($size_id != 0)
        {
            $results = array();
            foreach ($products as $product)
            {
                if (Stock::where('id', $product->stock)->first()->size == $size_id)
                    array_push($results, $product);
            }
            return $results;
        }
        return $products;
    }
    function filterPrice($products, $min_price, $max_price)
    {
        $results = array();
        foreach ($products as $product)
        {
            if ($product->total_price <= $max_price && $product->total_price >= $min_price)
                array_push($results, $product);
        }
        return $results;
    }

}
