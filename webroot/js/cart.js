function formatCurrency(total) {
    var neg = false;
    if(total < 0) {
        neg = true;
        total = Math.abs(total);
    }
    return (neg ? "-$" : '$') + parseFloat(total, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString();
}

function readUpdatedCookie(){
    $.ajax({
      url: "/products/readCookie",
      type: "GET",
      complete: function(){
            
      }
    });
}
$('.comprar-menu-button').click(function(){
    var shopActions;
    shopActions = $('.shop-actions');
    if (shopActions.css('marginRight') === '0px') {
        shopActions.animate({
            marginRight: '-255px'
        });
    } else {
        shopActions.animate({
            marginRight: '0px'
        });
    }
});
$('.cantidad-te').change(function(){
    var value, product, precio, cantidadEspecial, subtotal;
    value = $(this).val();
    product = $(this).parent().parent();
    precio = $(this).parent().parent().next().next().children();
    cantidadEspecial =product.next();
    if (value === 'mayoreo') {
        cantidadEspecial.show();
        precio.children().html('especifique cantidad');
        cantidadEspecial.children('.input-group').keyup(function(){
            //var value = String.fromCharCode(e.keyCode);
        });
        precio.children().html('Favor de contactarse con <a href="mailto:ventas@qihouse.mx"> nosotros</a>.');
    }else{
        cantidadEspecial.hide();
        subtotal = precio.attr('id') * value;
        precio.children().html(formatCurrency(subtotal) + ' MXN');
    }
});

$('.btn').click(function(){
    var cantidad, id;
    cantidad = $('.cantidad-te').val();
    id = $(this).attr('id');

    $.ajax({
      url: "/products/processCart",
      type: "POST",
      data: {id : id, cantidad: cantidad},
      beforeSend: function(){
           $('.cantidad-te').slideToggle();
           $('.btn').slideToggle();
      },
      complete: function(){
            var cookie = readUpdatedCookie();
            $.each(cookie, function(index, val) {
                console.log(val.category);
            });
      }
    });
    
    return false;
});

