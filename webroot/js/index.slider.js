$(function() {
    var slides, body, logo;
    slides              =    $('#slides');
    body                =    $('body');
    logo                =    $('#logo');

    slides.superslides({
    });
    $('#video-slide1')[0].play();
    $('.navbar').addClass('video');
    
    $('.slides-pagination a').addClass('slide-nav');
    
    function animateSlide1 () {
        logo.delay(400).transition({ opacity: 0 });
        $('.navbar').addClass('video');
    }

    function animateSlide2 () {
        logo.transition({ opacity: 0 }).transition({ opacity: 0.9 });
        $('#tea1').delay(500).transition({ y: 500, easing: 'easeInBack', duration: 600});
        $('#tea2').delay(500).transition({ y: 460, easing: 'easeInBack', duration: 400});
        $('#tea3').delay(500).transition({ y: 513, easing: 'easeInBack', duration: 750});
        $('#slide2-contatiner .hideit h1').transition({ y: 120});
        $('#slide2-contatiner #slide2-blurb').transition({ y: 490 });
        $('#slide2-contatiner .hideit').delay(1200).transition({ opacity: 0.9 });
        $('.navbar').removeClass('video');
    }

    function animateSlide3 () {
        logo.transition({ opacity: 0 }).transition({ opacity: 0.9 });
        $('#tigre').delay(500).transition({ y: 430, easing: 'easeInBack', duration: 600});
        $('#tetera').delay(500).transition({ y: 430, easing: 'easeInBack', duration: 400});
        $('#slide3-contatiner .hideit h1').transition({ y: 120});
        $('#slide3-contatiner #slide3-blurb').transition({ y: 490 });
        $('#slide3-contatiner .hideit').delay(1200).transition({ opacity: 0.9 });
        $('.navbar').removeClass('video');
    }

    function animateSlide4 () {
        logo.transition({ opacity: 0 }).transition({ opacity: 0.9 });
        $('#boxes').delay(500).transition({ y: 430, easing: 'easeInBack', duration: 400});
        $('#slide4-contatiner .hideit h1').transition({ y: 120});
        $('#slide4-contatiner #slide4-blurb').transition({ y: 490 });
        $('#slide4-contatiner .hideit').delay(1200).transition({ opacity: 0.9 });
        $('.navbar').removeClass('video');
    }
    
    function triggerAnimations () { 
        if(sessionStorage['current-slide'] === "0"){
            animateSlide1();  
        }
        if(sessionStorage['current-slide'] === "1"){
            
            animateSlide2();  
        }
        if(sessionStorage['current-slide'] === "2"){
            animateSlide3();  
        }
        if(sessionStorage['current-slide'] === "3"){
            animateSlide4();  
        }
    }
        
    $( document ).on( "click", 'a.slide-nav', function() {
        triggerAnimations();

    });
});

