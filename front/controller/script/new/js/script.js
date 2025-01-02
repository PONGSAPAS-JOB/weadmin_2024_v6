var path = $("base").attr("href");
$(document).ready(function () {
    // console.log('test');
    $('.nav-item ').removeClass('active');
    $('.nav-product').addClass('active');

    // ## check nav group active
    $('.group-slick').removeClass('active');
    let item_active = $('.item-group').data('id');
    $('.item-group-'+item_active).addClass('active');
    
});
