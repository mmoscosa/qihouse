<form action="/create_transaction_charge" method="POST" id="payment-form">
        <input type="hidden" name="token_id" id="token_id"/>
        <p>
          <label>Concepto de compra</label>
          <input type="text" size="40" name="description" />
        </p>
        <p>
          <label>Monto</label>
          <input type="text" size="10" name="amount"/>
        </p>
        <fieldset>
          <legend>Datos de la tarjeta</legend>
        <p>
          <label>Nombre</label>
          <input type="text" size="20" autocomplete="off" 
            data-openpay-card="holder_name" />
        </p>
        <p>
          <label>N&uacute;mero</label>
          <input type="text" size="20" autocomplete="off" 
            data-openpay-card="card_number" />
        </p>
        <p>
          <label>CVV2</label>
          <input type="text" size="4" autocomplete="off"
            data-openpay-card="cvv2" />
        </p>
        <p>
          <label>Fecha de expiraci&oacute;n (MM/YY)</label>
          <input type="text" size="2" 
            data-openpay-card="expiration_month" /> / 
          <input type="text" size="2" 
            data-openpay-card="expiration_year" />
        </p>
        </fieldset>
        <input type="submit" id="pay-button" value="Pagar"/>
</form>

