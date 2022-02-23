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
<!-- cart -->
<div class="main-container">
    <div class="side-section">
        <div class="checkout-bill">
            <div class="cart-total">
                <span>Cart Total</span>
                <p><span>$</span>100</p>
            </div>
            <div class="tax-amount">
                <span>Tax</span>
                <p><span>$</span>100</p>
            </div>
            <div class="shipping-cost">
                <span>Shipping Cost</span>
                <p>Free</p>
            </div>
            <div class="order-total">
                <span>Order Total</span>
                <p style="color: #ee1144;"><span>$</span>100</p>
            </div>
            <a class="payment-btn" id="enqueue-order">
                Paymeny
            </a>
        </div>
    </div>
    <div class="main-section">
        <table class="checkout-table">
            <thead>
                <tr>
                    <th class="col-2">Product</th>
                    <th class="col-2">Details</th>
                    <th class="col-1">Price</th>
                    <th class="col-1">Quantity</th>
                    <th class="col-1">Sub Total</th>
                    <th class="col-1">Remove</th>
                </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr data-value="{{$product->id}}">
                    <td class="col-2">
                        <img src="{{'pics/'.$product->picture}}">
                    </td>
                    <td class="product-details-com col-2">
                        <div class="product-name">
                            <span>Name:</span>
                            <p>{{$product->name}}</p>
                        </div>
                        <div class="product-brand">
                            <span>Supplier:</span>
                            <p>{{$product->owner_name}}</p>
                        </div>
                        <div class="product-color">
                            <span>color:</span>
                            <i class="fas fa-circle" style="color: {{'#'.$product->color_value}}"></i>
                        </div>
                        <div class="product-size">
                            <span>Size:</span>
                            <p>{{$product->product_size}}</p>
                        </div>
                    </td>
                    <td class="col-1">
                        $<span class="product-price">{{$product->total_price}}</span>
                    </td>
                    <td class="col-1">
                        <input type="number" class="product-quantity" min="1" max="{{$product->quantity}}" value="1">
                    </td>
                    <td class="col-1">
                        $<span class="sub-total">{{$product->total_price}}</span>
                    </td>
                    <td class="col-1">
                        <a data-value="{{$product->id}}" class="remove-me-from-cart" title="Remove From Cart">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">
                        your cart is empty
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('js_content_src')
    @parent
    <script src="{{asset('js/customer/product.js')}}"></script>
    <script src="{{asset('js/customer/cart.js')}}"></script>
@endsection