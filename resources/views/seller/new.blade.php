@extends('seller.templates.app')
@section('page_title', 'Shopping | New Product')

@section('page_content')
    <div style="position: fixed; width: 900px; top: 0px; overflow:hidden; background-color: #fff; z-index:1; padding-top:25px;">
        <div class="head-section">
            <h1>New Product</h1>
            <a id="add-product" class="new-product" title="Add This Product">
                Add
            </a>
        </div>
        <div class="tab-container">
        </div>
    </div>
    <form id="new-product-form" action="../public/new" method="POST" enctype="multipart/form-data" type="multipart/form-data" class="new-product" style="margin-top: 98px;">
        @include('seller.templates.product_form')
    </form>
@endsection

@section('js_content_src')
    <script src="{{ asset('js/seller/new_product.js') }}"></script>
@endsection