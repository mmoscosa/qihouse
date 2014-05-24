$(function() {
    var fullWidth, mapa;
    fullWidth  =   $( window ).width();
    mapa       =   $('#mapa');

    mapa.css({
        'position': 'absolute',
        'left': 0
    }).width(fullWidth);

});

