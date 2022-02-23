$('.delete_product').click(function () {
    id = $(this).attr('data');
    container = $(this).parentsUntil('#products-container');
    $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
       }
    });
    $.ajax({
        type: 'POST',
        url: '../public/delete/'+id,
        data: {
            id: id
        },
        success:function () {
            $(container).parentsUntil('#products-container').remove();
        },
        error: function(data, status, error){
            console.log(data);
            console.log(status);
            console.log(error);
        }
    });
});
// filter products
$('#search_products #search-input').on('keydown', function (event) {
    // if press enter
   if (event.keyCode === 13)
   {
       input_value = $(this).val().trim();
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
           }
       });
       $.ajax({
           type: 'POST',
           url: '../public/search/'+input_value,
           data: {
               input_value: input_value
           },
           success:function (data) {
               if (data)
               {
                   content = '';
                   for(index in data[0]['data'])
                   {
                       content += createProduct(data[0]['data'][index], data[1], data[2], data[3]);
                   }
                   // append
                   $('#products-container').html(content);
               }
            },
       });
   }
});
// create a product
function createProduct(product, categories, targets, stocks)
{
    for (category in categories)
    {
        if (categories[category]['id'] == product['category'])
        {
            category_name = categories[category]['name'];
            category_target_id = categories[category]['target'];
            for (target in targets)
            {
                if (targets[target]['id'] == category_target_id)
                {
                    category_target = targets[target]['name'];
                    break;
                }
            }
            break;
        }
    }
    for (stock in stocks)
    {
        if (stocks[stock]['id'] == product['stock'])
        {
            product_quantity = stocks[stock]['quantity'];
            break;
        }
    }
    product = "<div class='product'>" +
        "<div><a class='product-img' title='change product photo'>" +
        "<img src='pics/"+product['picture']+"'></a></div>"+
        "<div>\n" +
        "                    <a class=\"product-name\" title=\"change product name\">\n" +
        product['name'] +
        "                    </a>\n" +
        "                </div>"+
        "                <div>\n" +
        "                    <a class=\"product-quantity\" title=\"change product quantity\">\n" +
        product_quantity +
        "                    </a>\n" +
        "                </div>\n" +
        "                <div>\n" +
        "                    <a class=\"product-price\" title=\"change product price\">\n" +
        "                            <strong>"+product['total_price'] +"</strong>\n" +
        "                    </a>\n" +
        "                </div>"+
        "                <div>\n" +
        "                    <a class=\"product-category\" title=\"change product category\">\n" +
        "                        <strong>"+ category_name +"</strong>\n" +
        "                    </a>\n" +
        "                </div>\n" +
        "                <div>\n" +
        "                    <a class=\"product-gendar\" title=\"change product Gendar\">\n" +
        category_target +
        "                    </a>\n" +
        "                </div>"+
        "                <div class=\"more\">\n" +
        "                    <a href='../public/edit/"+ product['id'] + "' id=\"edit_product\" title=\"edit product\">\n" +
        "                        <i class=\"fa fa-edit\"></i>\n" +
        "                    </a>\n" +
        "                    <a class=\"delete_product\" title=\"delete product\" data='"+ product['id'] +"'>\n" +
        "                        <i class=\"fa fa-trash\"></i>\n" +
        "                    </a>\n" +
        "                </div>"+
        "</div>"
    ;

    return product;
}
$('#search_products #open-search-input').on('click', function () {
    $(this).hide();
    $('#search_products #search-input').show();
    $('#search_products #close-search-input').show();
})
$('#search_products #close-search-input').on('click', function () {
    $(this).hide();
    $('#search_products #search-input').hide();
    $('#search_products #open-search-input').show();
})