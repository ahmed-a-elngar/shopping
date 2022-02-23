@extends('seller.templates.app')
@section('page_title', 'Shopping | Home')
@section('page_content')
    <div style="position: fixed; width: 900px; top: 0px; overflow:hidden; background-color: #fff; z-index:1; padding-top:25px;">
        <div class="head-section">
            <h1>Products</h1>
            <a href="{{route('new_product')}}" class="new-product" title="Add New Product">
                New Product
            </a>
            <p>
                <span>{{count($products)}}</span> products,
            </p>
        </div>
        <div class="tab-container">
            <div class="tab-section">
                <ul>
                    <li class="active"><a href="">All Products</a></li>
                    <li><a href="">Ordered</a></li>
                    <li><a href="">new</a></li>
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
        <div class="products-head">
            <p>
                product Image
            </p>
            <p>
                product Name
            </p>
            <p>
                product Quantity
            </p>
            <p>
                product Price
            </p>
            <p>
                product Category
            </p>
            <p>
                product Target
            </p>
            <p>
                product Actions
            </p>
        </div>
    </div>
    <div id="products-container">
        @forelse($products as $product)
            <!-- singleproduct -->
            <div class="product">
                <div>
                    <a class="product-img" title="change product photo">
                        <img src="pics/{{$product->picture}}" alt="" srcset="">
                    </a>
                </div>
                <div>
                    <a class="product-name" title="change product name">
                        {{$product->name}}
                    </a>
                </div>
                <div>
                    <a class="product-quantity" title="change product quantity">
                        @foreach($stocks as $stock)
                            @if($stock->id == $product->stock)
                                {{$stock->quantity}}
                            @endif
                        @endforeach
                    </a>
                </div>
                <div>
                    <a class="product-price" title="change product price">
                            <strong>{{$product->total_price}}</strong>
                    </a>
                </div>
                @foreach($categories as $caategory)
                    @if($caategory->id == $product->category)
                        @php($category_details = $caategory)
                        @break
                    @endif
                @endforeach
                <div>
                    <a class="product-category" title="change product category">
                        <strong>{{$category_details->name}}</strong>
                    </a>
                </div>
                <div>
                    <a class="product-gendar" title="change product Gendar">
                        @foreach($targets as $target)
                            @if($target->id == $category_details->target)
                                {{$target->name}}
                            @endif
                        @endforeach
                    </a>
                </div>
                <!-- </div> -->
                <div class="more">
                    <a href="../public/edit/{{$product->id}}" id="edit_product" title="edit product">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a class="delete_product" title="delete product" data="{{$product->id}}">
                        <i class="fa fa-trash"></i>
                    </a>
                </div>
            </div>
        @empty
            <div class="product" style="text-align: center">No Products</div>
        @endforelse
    </div>
@endsection
@section('js_content_src')
    <script src="{{ asset('js/seller/products.js') }}"></script>
@endsection