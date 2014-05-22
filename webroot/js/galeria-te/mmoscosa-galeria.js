$(function() {
    var fullWidth, parallaxContainer;
    fullWidth               =   $( window ).width();
    parallaxContainer       =   $('.parallax');

    parallaxContainer.css({
        'position': 'absolute',
        'left': 0
    }).width(fullWidth);

});

