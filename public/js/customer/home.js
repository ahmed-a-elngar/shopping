// display search container (input + reasults)
$('#search-icon').click(function(){
    $('.search-container').css('display', 'block');
    $('body').css('overflow', 'hidden');
});
// hide search container (input + reasults)
$('.search-container .exit').click(function(){
    $('.search-container').css('display', 'none');
    $('body').css('overflow', 'auto');
});
// hide product details container (input + reasults)
$('.product-details-cont .exit').click(function(){
    $('.product-details-cont').css('display', 'none');
});
