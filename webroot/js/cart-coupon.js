$( document ).ready(function() {
  var $_GET = {};

  document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
      function decode(s) {
          return decodeURIComponent(s.split("+").join(" "));
      }

      $_GET[decode(arguments[1])] = decode(arguments[2]);
  });

  var couponInput, couponForm;
  couponInput = $('#productCoupon');
  couponForm  = $('#ProductCouponForm');
  if($_GET.referal){
    couponInput.val($_GET.referal);
    couponForm.submit();
  }
});
