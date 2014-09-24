$(document).ready(function() {
    OpenPay.setId('mzm1aurrzxczskubhhyk');
    OpenPay.setApiKey('pk_86b5d01cf3c747ec9ce4da0e9805e53a');
    OpenPay.setSandboxMode(false);

    var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");

    $('#pay-button').on('click', function(event) {
       var cardnumber, expiry, cardnumberOpenpay, expiryMonthOpenpay, expiryYearOpenpay;
       event.preventDefault();

       cardnumber = $("#cardplaceholder").val();
       expiry = $('#expiry').val();
       expiry = expiry.split('/');

       cardnumberOpenpay = $('#cardnumberOpenpay');
       expiryMonthOpenpay = $('#expiryMonthOpenpay');
       expiryYearOpenpay = $('#expiryYearOpenpay');

       cardnumberOpenpay.val(cardnumber.replace(/ /g,''));
       expiryMonthOpenpay.val(expiry[0].replace(/ /g,''));
       expiryYearOpenpay.val(expiry[1].replace(/ /g,''));
       if(expiryYearOpenpay.val().length > 2){
        expiryYearOpenpay.val(expiryYearOpenpay.val().substr(2));
       }

       $("#pay-button").prop( "disabled", true);
       OpenPay.token.extractFormAndCreate('payment-form', success_callbak, error_callbak);                
	});

  $('#pay-button-store').on('click', function(event) {
    event.preventDefault();
    $('#payment-form').submit();
  });

  $('#pay-button-bank').on('click', function(event) {
    event.preventDefault();
    $('#payment-form').submit();
  });

	var success_callbak = function(response) {
      var token_id = response.data.id;
      $('#token_id').val(token_id);
      $('#payment-form').submit();
	};

	var error_callbak = function(response) {
     var desc = response.data.description != undefined ? 
        response.data.description : response.message;
     	alert("ERROR [" + response.status + "] " + desc);
     	$("#pay-button").prop("disabled", false);
	};
});

