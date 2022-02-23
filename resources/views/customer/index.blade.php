@extends('customer.templates.header')
@section('page_title', 'shopping | Home')

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
<div class="products-container">
    <!-- offers -->
    <div class="offer-container">
        <!-- main -->
        <div class="main-offer">
            <div class="offer-details">
                <h1>collection 2022</h1>
                <h3>Nice shirt</h3>
                <a>shop now</a>
            </div>
            <div class="offer-pic">
                <img src="pics/girl2.png" alt="">
            </div>
        </div>
        <div class="side-offer">
        </div>
    </div>
    <!-- products "top rated" -->
    <!-- top rated tag -->
    <div class="products-tag">
        <h1>Top Rated</h1>
        <h1 class="product-rate" title="5 stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </h1>
    </div>
    <div class="products-section big">
        <!-- single product -->
        <div class="product">
            <div class="product-img">
                <a title="product details">
                    <span class="product-new">new</span>
                    <img src="pics/13.jpeg" alt="">
                </a>
            </div>
            <div class="product-details">
                <h1 class="product-name" title="product name">product name</h1>
                <h1 class="product-price" title="product price">
                    <strong>$15</strong>
                </h1>
                <h1 class="product-brand-name" title="seller/brand name">seller name</h1>
                <div class="add-to-cart">
                    <a title="Add to cart">
                        <i class="fa fa-cart-plus"></i>
                    </a>
                </div>
            </div>
            <!-- <a href="#" class="add-to-cart">
                <i class="fa fa-cart-plus"></i>
            </a> -->
            <!-- <div class="product-more">
                <h1 class="product-desc">
                    this is an product
                </h1>
            </div> -->
        </div>
        <!-- single product -->
        <div class="product">
            <div class="product-img">
                <a title="product details">
                    <span class="product-sale">sale</span>
                    <img src="pics/gallery2.jpg" alt="">
                </a>
            </div>
            <div class="product-details">
                <h1 class="product-name" title="product name">product name</h1>
                <h1 class="product-price">
                    <strong title="product price before sale" class="price-before-sale">$20 | </strong>
                    <strong title="product price after sale">$15</strong>
                </h1>
                <h1 class="product-brand-name" title="seller/brand name">seller name</h1>
                <div class="add-to-cart">
                    <a title="Add to cart">
                        <i class="fa fa-cart-plus"></i>
                    </a>
                </div>
            </div>
            <!-- <a href="#" class="add-to-cart">
                <i class="fa fa-cart-plus"></i>
            </a> -->
            <!-- <div class="product-more">
                <h1 class="product-desc">
                    this is an product
                </h1>
            </div> -->
        </div>
        <!-- single product -->
        <div class="product">
            <div class="product-img">
                <a title="product details">
                    <img src="pics/product6.jpg" alt="">
                </a>
            </div>
            <div class="product-details">
                <h1 class="product-name" title="product name">product name</h1>
                <h1 class="product-price" title="product price">
                    <strong>$15</strong>
                </h1>
                <h1 class="product-brand-name" title="seller/brand name">seller name</h1>
                <div class="add-to-cart">
                    <a title="Add to cart">
                        <i class="fa fa-cart-plus"></i>
                    </a>
                </div>
            </div>
            <!-- <a href="#" class="add-to-cart">
                <i class="fa fa-cart-plus"></i>
            </a> -->
            <!-- <div class="product-more">
                <h1 class="product-desc">
                    this is an product
                </h1>
            </div> -->
        </div>
        <!-- single product -->
        <div class="product">
            <div class="product-img">
                <a title="product details">
                    <img src="pics/product2.jpg" alt="">
                </a>
            </div>
            <div class="product-details">
                <h1 class="product-name" title="product name">product name</h1>
                <h1 class="product-price" title="product price">
                    <strong>$15</strong>
                </h1>
                <h1 class="product-brand-name" title="seller/brand name">seller name</h1>
                <div class="add-to-cart">
                    <a title="Add to cart">
                        <i class="fa fa-cart-plus"></i>
                    </a>
                </div>
            </div>
            <!-- <a href="#" class="add-to-cart">
                <i class="fa fa-cart-plus"></i>
            </a> -->
            <!-- <div class="product-more">
                <h1 class="product-desc">
                    this is an product
                </h1>
            </div> -->
        </div>
        <!-- single product -->
        <div class="product">
            <div class="product-img">
                <a title="product details">
                    <img src="pics/c2.jpeg" alt="">
                </a>
            </div>
            <div class="product-details">
                <h1 class="product-name" title="product name">product name</h1>
                <h1 class="product-price" title="product price">
                    <strong>$15</strong>
                </h1>
                <h1 class="product-brand-name" title="seller/brand name">seller name</h1>
                <div class="add-to-cart">
                    <a title="Add to cart">
                        <i class="fa fa-cart-plus"></i>
                    </a>
                </div>
            </div>
            <!-- <a href="#" class="add-to-cart">
                <i class="fa fa-cart-plus"></i>
            </a> -->
            <!-- <div class="product-more">
                <h1 class="product-desc">
                    this is an product
                </h1>
            </div> -->
        </div>
    </div>
    <!-- brands -->
    <div class="brands-container">
        <a href="">
            <img src="pics/brands/1.png"></img>
        </a>
        <a href="">
            <img src="pics/brands/2.png"></img>
        </a>
        <a href="">
            <img src="pics/brands/3.png"></img>
        </a>
        <a href="">
            <img src="pics/brands/4.png"></img>
        </a>
        <a href="">
            <img src="pics/brands/5.png"></img>
        </a>
    </div>
    <!-- testimonial -->
    <div class="product-test-cont">
        <!-- customer testi -->
        <div class="product-testi">
            <div class="product-pic">
                <img src="pics/s1.jpeg" alt="">
            </div>
            <div class="product-testi-det">
                <div class="testi-desc">
                    <p>
                        " was good one "
                    </p>
                </div>
                <div class="testi-customer">
                    <h3 class="customer-name">
                        customer name
                    </h3>
                </div>
            </div>
        </div>
        <!-- customer testi -->
        <div class="product-testi">
            <div class="product-pic">
                <img src="pics/d1.jpeg" alt="">
            </div>
            <div class="product-testi-det">
                <div class="testi-desc">
                    <p>
                        " was good one "
                    </p>
                </div>
                <div class="testi-customer">
                    <h3 class="customer-name">
                        customer name
                    </h3>
                </div>
            </div>
        </div>
        <!-- customer testi -->
        <div class="product-testi">
            <div class="product-pic">
                <img src="pics/s2.jpeg" alt="">
            </div>
            <div class="product-testi-det">
                <div class="testi-desc">
                    <p>
                        " was good one "
                    </p>
                </div>
                <div class="testi-customer">
                    <h3 class="customer-name">
                        customer name
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js_content_src')
    @parent
@endsection