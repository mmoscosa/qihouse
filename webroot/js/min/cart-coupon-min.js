$(document).ready(function(){var o={};document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g,function(){function n(o){return decodeURIComponent(o.split("+").join(" "))}o[n(arguments[1])]=n(arguments[2])});var n,e;n=$("#productCoupon"),e=$("#ProductCouponForm"),o.referal&&(n.val(o.referal),e.submit())});