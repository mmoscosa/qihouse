function headSpace(){var t=0,a=$("#navbar-top");$(window).scroll(function(d){var o=$(window).scrollTop();o>t?o>=300&&a.css("opacity","0"):(a.css("opacity","1"),o+$(window).height()==$(document).height()&&a.css("opacity","0")),t=o})}function getBlog(){$("#posts").rss("http://blog.qihouse.com.mx/rss/",{limit:3,effect:"slideFastSynced",outputMode:"json_xml",layoutTemplate:"<div class='feed-container'>{entries}</div>",entryTemplate:'<div class="post-container col-md-4"><a href="{url}" class="blog-address"><img class="post-image" src="{teaserImageUrl}" /></a><div class="post-title">{title}</div><div class="row"><div class="col-md-2 well post-date"><div class="post-day post-day-{index}"></div><div class="post-month post-month-{index}"></div><div class="post-date-{index}">{date}</div></div><div class="col-md-9"><div class="post-body">{shortBody}</div></div></div></div>'},function t(){date1=$("div.post-date-0").text(),date2=$("div.post-date-1").text(),date3=$("div.post-date-2").text(),dateArray1=date1.split(" "),dateArray2=date2.split(" "),dateArray3=date3.split(" "),month1=dateArray1[2],month2=dateArray2[2],month3=dateArray3[2],day1=dateArray1[1],day2=dateArray2[1],day3=dateArray3[1],$("div.post-day-0").text(day1),$("div.post-day-1").text(day2),$("div.post-day-2").text(day3),$("div.post-month-0").text(month1),$("div.post-month-1").text(month2),$("div.post-month-2").text(month3),$("div.post-date-0").hide(),$("div.post-date-1").hide(),$("div.post-date-2").hide(),$(".post-image").hover(function(){}),$("a[href^='http://teadreamshouse.com']").each(function(){this.href=this.href.replace(/^http:\/\/beta\.stackoverflow\.com/,"http://stackoverflow.com")})})}$(function(){var t,a,d,o;t=$("#logo"),a=window.location.pathname,d=$(window).width(),o=$("#navbar-top"),o.width(d),$(".tooltip-social").tooltip(),"/"!==a&&(t.transition({opacity:1}),headSpace(),getBlog())});