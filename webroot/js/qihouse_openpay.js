$(document).ready(function() {
    OpenPay.setId('mb82o6czp2sc6k7j5trk');
    OpenPay.setApiKey('pk_cd15aed8af9746588af5bbaa355fc84d');
    OpenPay.setSandboxMode(true);

    $('#pay-button').on('click', function(event) {
       event.preventDefault();
       $("#pay-button").prop( "disabled", true);
       OpenPay.token.extractFormAndCreate('payment-form', success_callbak, error_callbak);                
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

