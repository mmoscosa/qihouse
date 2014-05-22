function headSpace () {
    var lastScrollTop = 0;
    var navbar              =   $('#navbar-top');
    $(window).scroll(function(event){
       var st = $(window).scrollTop();
       if (st > lastScrollTop){
           // downscroll code
           if(st >= 300 ){
                navbar.css('opacity', '0');
           }
       } else {
          // upscroll code
          navbar.css('opacity', '1');
           //    if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
           //      navbar.css('opacity', '0.5');
           // }
           //    else 
            if(st + $(window).height() == $(document).height()) {
                navbar.css('opacity', '0');
            }
          
       }
       lastScrollTop = st;
    });
}

function getBlog () {
    $("#posts").rss(
                "http://blog.qihouse.com.mx/rss/",
                 {
                    limit: 3,
                    effect: 'slideFastSynced',
                    outputMode: 'json_xml',
                    layoutTemplate: "<div class='feed-container'>{entries}</div>",
                    entryTemplate: '<div class="post-container col-md-4"><img class="post-image" src="{teaserImageUrl}" /><div class="post-title">{title}</div><div class="row"><div class="col-md-2 well post-date"><div class="post-day post-day-{index}"></div><div class="post-month post-month-{index}"></div><div class="post-date-{index}">{date}</div></div><div class="col-md-9"><div class="post-body">{shortBody}</div></div></div></div>',
                 },
                 function callback() {
                    date1 = $('div.post-date-0').text();
                    date2 = $('div.post-date-1').text();
                    date3 = $('div.post-date-2').text();
                    dateArray1 = date1.split(' ');
                    dateArray2 = date2.split(' ');
                    dateArray3 = date3.split(' ');
                    month1 = dateArray1['2'];
                    month2 = dateArray2['2'];
                    month3 = dateArray3['2'];
                    day1 = dateArray1['1'];
                    day2 = dateArray2['1'];
                    day3 = dateArray3['1'];
                    $('div.post-day-0').text(day1);
                    $('div.post-day-1').text(day2);
                    $('div.post-day-2').text(day3);
                    $('div.post-month-0').text(month1);
                    $('div.post-month-1').text(month2);
                    $('div.post-month-2').text(month3);
                    $('div.post-date-0').hide();
                    $('div.post-date-1').hide();
                    $('div.post-date-2').hide();
                    $('.post-image').hover(function(){
                        
                    });
                 }
            );
}

$(function() {
    var logo, url, fullWidth, navbar;
    logo                =   $('#logo');
    url                 =   window.location.pathname;
    fullWidth           =   $(window).width();
    navbar              =   $('#navbar-top');
    navbar.width(fullWidth);
    $('.tooltip-social').tooltip();
    if(url !== '/'){
        logo.transition({ opacity: 1 });
        headSpace();
        getBlog();
    }
});
