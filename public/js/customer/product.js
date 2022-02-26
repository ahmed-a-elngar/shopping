// show product details
$(document).on('click', '.product-img .product-details',function () {
    product_id = $(this).attr('data-value');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '../products/details/'+product_id,
        data: {
            product_id: product_id
        },
        success:function (data) {
            if (data)
            {
                content = createProductDetails(data[0], data[1], data[2], data[3], data[4]);
                $(document.body).append(content);
                $(document.body).css('overflow', 'hidden');
            }
        },
    });
});
// create product details
function createProductDetails(product, seller, product_quantity, product_color, product_size) {

    product_details = "<!-- product details -->\n" +
        "<div class=\"product-details-cont\">\n" +
        "    <!-- single product -->\n" +
        "    <div class=\"product\">\n" +
        "        <div class=\"product-img\">\n" +
        "            <a title=\"product details\">\n" +
        "                <span class=\"product-new\">new</span>\n" +
        "                <img src='../pics/"+product['picture']+"' alt=\"\">\n" +
        "            </a>\n" +
        "        </div>\n" +
        "        <div class=\"product-details\">\n" +
        "            <h1 class=\"product-name\" title=\"product name\">"+product['name']+"</h1>\n" +
        "            <h1 class=\"product-brand-name\" title=\"seller/brand name\">"+seller['name']+"</h1>\n" +
        "            <h1 title=\"product price\">\n$" +
                     product['total_price'] +
        "            </h1>\n" +
        "            <!-- product description -->\n" +
        "            <p class=\"product-desc\">\n" +
                     product['description'] +
        "            </p>\n" +
        "            <!-- quantity -->\n" +
        "            <div class=\"product-quantity\">\n" +
        "                <h1>\n" +
        "                Quantity:\n" +
        "                </h1>\n" +
        "                <input type=\"number\" name=\"\" id=\"\" min=\"1\" max='"+product_quantity+"' value='1'>\n" +
        "            </div>\n" +
        "            <!-- total price -->\n" +
        "            <div class=\"total-price\">\n" +
        "                <h1>\n" +
        "                    Total price:\n" +
        "                </h1>\n" +
        "                <h1 class=\"product-price\" title=\"product price\">\n" +
        "                    <strong>$"+product['total_price']+"</strong>\n" +
        "                </h1>\n" +
        "            </div>\n" +
        "            <!-- color section -->\n" +
        "            <h1 class=\"pad-5\">\n" +
        "                Colors:\n" +
        "            </h1>\n" +
        "            <div class=\"colors-section\">\n" +
        "                <a class=\"active\">\n" +
        "                    <i class=\"fas fa-circle\" style='color: #"+ product_color['value']+"'></i>\n" +
        "                </a>\n" +
        "            </div>\n" +
        "            <!-- size -->\n" +
        "            <div class=\"product-size\">\n" +
        "               <h1 class=\"pad-8\">Size:</h1>\n" +
        "               <input type=\"text\" value='"+product_size['name']+"' disabled>\n" +
        "            </div>\n" +
        "            <a title=\"Add to cart\" class=\"add-to-cart add-me-to-cart\" data-value='"+ product['id']+"'>\n" +
        "                Add to cart\n" +
        "            </a>\n" +
        "        </div>\n" +
        "    </div>\n" +
        "    <!-- close product details -->\n" +
        "    <div class=\"exit\">\n" +
        "        <i class=\"fa fa-times\"></i>\n" +
        "    </div>\n" +
        "</div>";

    return product_details;
}
// delete product details
$(document).on('click','.product-details-cont .exit', function () {
   $('.product-details-cont').remove();
   $(document.body).css('overflow', 'auto');
});
// filter products
$('.filter-section').on('change', function () {
    filter = [];
    filter.push(parseInt($('#type-filter').val()));
    filter.push(parseInt($('#brand-filter').val()));
    filter.push(parseInt($('#color-filter').val()));
    filter.push(parseInt($('#size-filter').val()));
    filter.push(parseInt($('#price-min-filter').val()));
    filter.push(parseInt($('#price-max-filter').val()));
    // any category to detect gendar
    gendar = parseInt($($('#type-filter option')[1]).val());

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: gendar+'/filter/'+filter,
        data: {
            gendar: gendar,
            filter: filter
        },
        success:function (data) {
            $('.product').remove();
            createProducts(data);
        },
    });
});
function createProducts(products) {
    for (let i = 0; i < products.length; i++) {
        createSingleProduct(products[i]);
    }
}
function createSingleProduct(product_details) {
    product =
        '                        <div class="product">\n' +
        '                            <div class="product-img">\n' +
        '                                <a title="product details" class="product-details" data-value="'+product_details['id']+'">\n' +
        '                                    <img src="../pics/'+product_details['picture']+'" alt="">\n' +
        '                                </a>\n' +
        '                            </div>\n' +
        '                            <div class="product-details">\n' +
        '                                <h1 class="product-name" title="product name">'+product_details['name']+'</h1>\n' +
        '                                <h1 class="product-price" title="product price">\n' +
        '                                    <strong>$'+product_details['total_price']+'</strong>\n' +
        '                                </h1>\n' +
        '                                <h1 class="product-brand-name" title="seller/brand name">'+product_details['owner_name']+'</h1>\n' +
        '                                <div class="add-to-cart">\n' +
        '                                    <a title="Add to cart" class="add-me-to-cart" data-value="'+product_details['id']+'">\n' +
        '                                        <i class="fa fa-cart-plus"></i>\n' +
        '                                    </a>\n' +
        '                                </div>\n' +
        '                            </div>\n' +
        '                        </div>\n';
    $('.products-section').append(product);

}
