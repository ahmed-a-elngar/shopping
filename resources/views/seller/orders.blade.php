@extends('seller.templates.app')
@section('page_title', 'Shopping | Orders')
@section('page_content')
    <div style="position: fixed; width: 900px; top: 0px; overflow:hidden; background-color: #fff; z-index:1; padding-top:25px;">
        <div class="head-section">
            <h1>Orders</h1>
            <p>
                <span>{{count($orders_items)}}</span> Orders,
            </p>
        </div>
        <div class="tab-container">
            <div class="tab-section">
                <ul>
                    <li class="active"><a href="">All Orders</a></li>
                    <li><a href="">Ready</a></li>
                    <li><a href="">Received</a></li>
                </ul>
            </div>
            <div class="more-section">
                <a id="search_products">
                    <i class="fa fa-search" title="open searching" id="open-search-input"></i>
                    <input id="search-input" type="search" placeholder="enter product name">
                    <i class="fas fa-times" title="close searching" id="close-search-input"></i>
                </a>
                <a href="">
                    <i class="fa fa-th"></i>
                </a>
            </div>
        </div>
        <!-- products table header -->
        <div class="products-head orders-items-head">
            <p>
                order Image
            </p>
            <p>
                order Name
            </p>
            <p>
                order Quantity
            </p>
            <p>
                order Price
            </p>
            <p>
                order Status
            </p>
            <p>
                order Owner
            </p>
        </div>
    </div>
    <div id="products-container">
    @forelse($orders_items as $item)
        <!-- singleproduct -->
            <div class="product order_item">
                <div>
                    <a class="product-img" title="change product photo">
                        <img src="pics/{{$item->picture}}" alt="" srcset="">
                    </a>
                </div>
                <div>
                    <a class="product-name" title="change product name">
                        {{$item->name}}
                    </a>
                </div>
                <div>
                    <a class="product-quantity" title="change product quantity">
                        {{$item->quantity}}
                    </a>
                </div>
                <div>
                    <a class="product-price" title="change product price">
                        <strong>{{$item->total_price * $item->quantity}}</strong>
                    </a>
                </div>
                <div>
                    <a class="product-gendar" title="change product Gendar">
                        {{$item->status}}
                    </a>
                </div>
                <div>
                    <a class="product-gendar" title="change product Gendar">
                        {{$item->order_owner_name}}
                    </a>
                </div>
            </div>
        @empty
            <div class="product" style="text-align: center">No Products</div>
        @endforelse
    </div>
@endsection
@section('js_content_src')
    <script src="{{ asset('js/seller/orders.js') }}"></script>
@endsection