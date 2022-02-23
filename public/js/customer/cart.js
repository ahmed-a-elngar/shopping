$(document.body).on('click', '.add-me-to-cart',function () {
   product_id = $(this).attr('data-value');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '../products/cart/push/'+product_id,
        data: {
            product_id: product_id
        },
    });
});
$(document.body).on('click', '.remove-me-from-cart',function () {
    product_id = $(this).attr('data-value');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: '../public/products/cart/push/'+product_id,
        data: {
            product_id: product_id
        },
        success:function () {
            $('tr[data-value="'+product_id+'"]').remove();
            updateBill();
        },
    });
});
$(document.body).on('click', '#enqueue-order',function () {
    // collect products quantity
    products_quantity = document.getElementsByClassName('product-quantity');
    quantity_arr = [];
    for (let i = 0; i < sub_totals_elements.length; i++) {
        quantity_arr.push(parseInt(products_quantity[i].value));
    }
    // send
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $.ajax({
        type: 'POST',
        url: 'cart/submit/'+quantity_arr,
        data:{
            quantities: quantity_arr
        },
        success:function (urlLink) {
            window.location.href = urlLink;
        }
    });
});
// calculate sub-total & total
$('.product-quantity').on('change', function () {
    sub_total_val = $(this).val().trim() * $(this).parentsUntil('tbody').children('td').children('.product-price').text().trim();
    $(this).parentsUntil('tbody').children('td').children('.sub-total').text(sub_total_val);
    updateBill();
});
// calculate cart-bill when load
$(document).ready(function () {
    updateBill();
});
//calculate subtotals
function subTotals() {
    sub_totals_elements = document.getElementsByClassName('sub-total');
    sub_totals = 0;
    for (let i = 0; i < sub_totals_elements.length; i++) {
        sub_totals += parseInt(sub_totals_elements[i].innerText.trim());
    }
}
function updateBill() {
    subTotals();
    $('.cart-total p').html('<span>$</span>'+sub_totals);
    $('.tax-amount p').html('<span>$</span>'+sub_totals_elements.length);
    $('.order-total p').html('<span>$</span>'+(sub_totals + sub_totals_elements.length));
}
