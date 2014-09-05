$(document).ready(function() {
    var selector, selectedOption, card, store, bank, same_address, billing_address;
    selector        = $('#ProductPaymentMethod');
    card            = $('#method_card');
    store           = $('#method_store');
    bank            = $('#method_bank');
    same_address    = $('#ProductSameShipping');
    billing_address = $('#billing_address');

    function hideOptions () {
      card.hide();
      store.hide();
      bank.hide();
    }
    hideOptions();

    same_address.change(function(){
      if($(this).is(":checked")) {
        billing_address.hide();
      }else{
        billing_address.show();
      }
    });
    selector.change(function(){
      selectedOption = $(this).val();
      if(selectedOption === 'card'){
        hideOptions();
        card.show();
      }
      if(selectedOption === 'store'){
        hideOptions();
        store.show();
      }
      if(selectedOption === 'bank'){
        hideOptions();
        bank.show();
      }

      if(selectedOption === ''){
        hideOptions();
      }
    });
});

