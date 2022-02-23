@extends('customer.templates.header')
@section('page_title', 'shopping | Products')

@section('page_content')
    <!-- search reasult -->
    <div class="search-container">
        <div class="search-input-cont">
            <input type="search" name="" id="search-input">
        </div>
        <div class="exit">
            <i class="fa fa-times"></i>
        </div>
    </div>
    <div class="main-container">
        <div class="side-section">
            <div class="filter-section" style="overflow: hidden;">
                <!-- product type section -->
                <div class="section-tag">
                    <h1>
                         type
                    </h1>
                </div>
                <div class="type-section">
                    <select id="type-filter">
                        <option value="0">
                            all
                        </option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">
                                {{$category->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- brand name section -->
                <div class="section-tag">
                    <h1>
                        brand
                    </h1>
                </div>
                <div class="type-section">
                    <select id="brand-filter">
                        <option value="0">
                            all
                        </option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}">
                                {{$brand->name}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- color section -->
                <div class="section-tag">
                    <h1>
                        colors
                    </h1>
                </div>
                <div class="type-section">
                    <select id="color-filter">
                        <option value="0">
                            all
                        </option>
                        @foreach($colors as $color)
                            <option value="{{$color->id}}">
                                {{$color->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- product type section -->
                <div class="section-tag">
                    <h1>
                         Size
                    </h1>
                </div>
                <div class="type-section">
                    <select id="size-filter">
                        <option value="0">
                            all
                        </option>
                        @foreach($sizes as $size)
                            <option value="{{$size->id}}">
                                {{$size->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- price section -->
                <div class="section-tag">
                    <h1>
                        price
                    </h1>
                </div>
                <div class="type-section">
                    <div class="price-range">
                        <span>min</span>
                        <input type="number" id="price-min-filter" min="0" value="0">
                    </div>
                    <div class="price-range">
                        <span style="margin-left: 12px;">max</span>
                        <input type="number" id="price-max-filter" min="0" value="50">
                    </div>
                </div>
            </div>
        </div>
        <div class="main-section">
            <!-- products -->
            <div class="products-section big">
                @foreach($products as $product)
                    <!-- single product -->
                        <div class="product">
                            <div class="product-img">
                                <a title="product details" class="product-details" data-value="{{$product->id}}">
                                    <span class="product-new">new</span>
                                    <img src="{{asset('pics/'.$product->picture)}}" alt="">
                                </a>
                            </div>
                            <div class="product-details">
                                <h1 class="product-name" title="product name">{{$product->name}}</h1>
                                <h1 class="product-price" title="product price">
                                    <strong>{{$product->total_price}}</strong>
                                </h1>
                                @foreach($sellers as $seller)
                                    @if($seller->id == $product->owner)
                                        @php($seller_name = $seller->name)
                                    @endif
                                @endforeach
                                <h1 class="product-brand-name" title="seller/brand name">{{$seller_name}}</h1>
                                <div class="add-to-cart">
                                    <a title="Add to cart" class="add-me-to-cart" data-value="{{$product->id}}">
                                        <i class="fa fa-cart-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
@section('js_content_src')
    @parent
    <script src="{{asset('js/customer/product.js')}}"></script>
    <script src="{{asset('js/customer/cart.js')}}"></script>
@endsection