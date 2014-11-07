$(document).ready(function() {
    var selector, selectedOption, card, store, bank, same_address, billing_address, save_billing, productSavedShippingAddress, shipping_address, saved_shipping_address, save_shipping, productSavedBillingAddress, saved_billing_address, paypal;
    selector                        = $('#ProductPaymentMethod');
    card                            = $('#method_card');
    store                           = $('#method_store');
    bank                            = $('#method_bank');
    paypal                          = $('#method_paypal');
    same_address                    = $('#ProductSameShipping');
    billing_address                 = $('#billing_address');
    productSavedShippingAddress     = $('#ProductSavedShippingAddress');
    productSavedBillingAddress      = $('#ProductSavedBillingAddress');
    save_billing                    = $('#save_billing');
    shipping_address                = $('#shipping_address');
    save_shipping                   = $('#save_shipping');
    saved_shipping_address          = $('.address-shipping-hidden');
    saved_billing_address           = $('.address-billing-hidden');

    function hideOptions () {
      card.hide();
      store.hide();
      bank.hide();
      paypal.hide();
    }
    hideOptions();

    productSavedShippingAddress.change(function(){
      if($(this).val() !== ''){
        shipping_address.hide();
        var address;
        address = $(this).val();
        saved_shipping_address.hide();
        $('#shipping_'+address).show();
        save_shipping.hide();
      }else{
        saved_shipping_address.hide();
        shipping_address.show();
        save_shipping.show();
      }
    });

    productSavedBillingAddress.change(function(){
      if($(this).val() !== ''){
        same_address.attr('checked', false);
        billing_address.hide();
        save_billing.hide();
        var address;
        address = $(this).val();
        saved_billing_address.hide();
        $('#billing_'+address).show();
      }else{
        billing_address.show();
        save_billing.show();
      }
    });

    same_address.change(function(){
      if($(this).is(":checked")) {
        productSavedBillingAddress.val('');
        saved_billing_address.hide();
        billing_address.hide();
        save_billing.hide();
        $('#BillingAddress1').val('parseley');
        $('#BillingCity').val('parseley');
        $('#BillingState').val('parseley');
        $('#BillingPostalCode').val('parseley');
        $('#BillingCountryCode').val('MX');
      }else{
        billing_address.show();
        save_billing.show();
      }
    });
    selector.change(function(){
      selectedOption = $(this).val();
      if(selectedOption === 'card'){
        $('#BillingAddress1').val('');
        $('#BillingCity').val('');
        $('#BillingState').val('');
        $('#BillingPostalCode').val('');
        $('#BillingCountryCode').val('');
        hideOptions();
        card.show();
      }
      if(selectedOption === 'store'){
        $('#BillingAddress1').val('parseley');
        $('#BillingCity').val('parseley');
        $('#BillingState').val('parseley');
        $('#BillingPostalCode').val('parseley');
        $('#BillingCountryCode').val('MX');
        hideOptions();
        store.show();
      }
      if(selectedOption === 'bank'){
        $('#BillingAddress1').val('parseley');
        $('#BillingCity').val('parseley');
        $('#BillingState').val('parseley');
        $('#BillingPostalCode').val('parseley');
        $('#BillingCountryCode').val('MX');
        hideOptions();
        bank.show();
      }

      if(selectedOption === 'paypal'){
        $('#BillingAddress1').val('parseley');
        $('#BillingCity').val('parseley');
        $('#BillingState').val('parseley');
        $('#BillingPostalCode').val('parseley');
        $('#BillingCountryCode').val('MX');
        hideOptions();
        paypal.show();
      }

      if(selectedOption === ''){
        hideOptions();
      }
    });
});

