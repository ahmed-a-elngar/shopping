    // for edit product form
// show selected color
$(document).ready(function () {
    color_val = $('#product_color').val();
    $('#selected-color').css('color', '#'+color_val);
});

    // for new product form
// change product color
$('#product_color').on('change', function () {
    color_val = $(this).val();
    $('#selected-color').css('color', '#'+color_val);
});
// change categories
$('#product_targets').change(function(){
    cats = document.getElementsByClassName('product_categories');
    for (let i = 0; i < cats.length; i++) {
        cats[i].style.display = 'none';
    }
    selected_target = $(this).val();
    $('.product_categories[data-target="'+selected_target+'"]').css('display', 'block');
});

// upload product image
$('#upload_product_image').click(function(){
    $('#product_image').click();
});
$('#product_image').on('change', function(){
    $('#upload_product_image img').attr('src', window.URL.createObjectURL(
        $(this).prop('files')[0]
    ));
});
// check form inputs before submitting
function checkInputs()
{
    if ($('#product_name').val().trim().length > 0)
    {
        if ($('#product_desc').val().trim().length > 0)
        {
            if ($('#product_price').val() > 0)
            {
                if ($('#product_total_price').val() > 0)
                {
                    if($('#add-product').text().trim() == 'Add')    // check new form
                    {
                        if ($('#product_image').val().trim())
                        {
                            return true;
                        }
                        else{
                            $('#upload_product_image').after('<p class="input-missed"> please, choose product image </p>');
                        }
                    }
                    else{   // check update form
                        return true;
                    }
                }
            }
        }
        else
        {
            $('#product_desc').after('<p class="input-missed"> please, enter product Description </p>');
        }
    }
    else{
        $('#product_name').after('<p class="input-missed"> please, enter product name </p>');
    }
    return false;
}
// add color input field before submitting
function addColorInput()
{
    color_val = $('#product_color').val();
    color_input = document.createElement('input');
    color_input.name = 'product_color';
    color_input.id = 'product_color';
    color_input.type = 'text';
    color_input.style.visibility = 'hidden';
    $('#new-product-form').append(color_input);
    $('input#product_color').val(color_val);
}
function addCategoryInput()
{
    category_input = document.createElement('input');
    category_input.name = 'product_category';
    category_input.id = 'product_category';
    category_input.type = 'text';
    category_input.style.visibility = 'hidden';
    $('#new-product-form').append(category_input);
    target = $('#product_targets').val();
    cats = document.getElementsByClassName('product_categories');
    if (target == 'men')
    {
        category = cats[0].value;
    }
    else{
        category = cats[1].value;
    }
    $('#product_category').val(category);
}
function addTargetInput()
{
    target_input = document.createElement('input');
    target_input.name = 'product_target';
    target_input.id = 'product_target';
    target_input.type = 'text';
    target_input.style.visibility = 'hidden';
    $('#new-product-form').append(target_input);
    $('#product_target').val($('#product_targets').val());
}
function addSizeInput()
{
    size_val = $('#product_size').val();
    size_input = document.createElement('input');
    size_input.name = 'product_size';
    size_input.id = 'product_size';
    size_input.type = 'text';
    size_input.style.visibility = 'hidden';
    $('#new-product-form').append(size_input);
    $('input#product_size').val(size_val);
}
// submit new product form
$('#add-product').click(function(){
    // remove all warnings
    $('.input-missed').remove();
    // prepare submitting if sized already choosen
    if(checkInputs())
    {
        addColorInput();
        addCategoryInput();
        addTargetInput();
        addSizeInput();
        // submit form
        $('#new-product-form').submit();
    }
});