function Midway(){var i=$(".midway-horizontal"),t=$(".midway-vertical");i.each(function(){$(this).css("marginLeft",-$(this).outerWidth()/2)}),t.each(function(){$(this).css("marginTop",-$(this).outerHeight()/2)}),i.css({display:"inline",position:"absolute",left:"50%"}),t.css({display:"inline",position:"absolute",top:"50%"})}$(window).load(function(){Midway(),$(window).on("resize",Midway),Midway()});