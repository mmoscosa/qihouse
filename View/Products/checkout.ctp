<?php 
    echo $this->Html->css('checkout');
    echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/card/0.0.2/css/card.min.css');
    echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/card/0.0.2/js/card.min.js');
    echo $this->Html->script('https://openpay.s3.amazonaws.com/openpay.v1.min.js');
    echo $this->Html->script('https://openpay.s3.amazonaws.com/openpay-data.v1.min.js');
    echo $this->Html->script('checkout');
    echo $this->Html->script('qihouse_openpay');
?>

<div id="payment-container" class="row">
  <?php echo $this->Form->create(array('action'=>'checkout', 'id'=>'payment-form')); ?>
    <h2>Direccion de envio</h2>
    <div class="col-md-8">
      <!-- Text input-->
          <?php 
            echo $this->Form->input('Shipping.id', 
                                      array(
                                              'type'=>'hidden',
                                              'class' => 'form-control',
                                              'placeholder'=> 'Direccion'
                                            )
                                    ); 
          ?>
          <div class="form-group">
            <div class="col-sm-12">
              <?php 
                echo $this->Form->input('Shipping.recipient', 
                                          array(
                                                  'type'=>'text',
                                                  'class' => 'form-control',
                                                  'placeholder'=> 'Nombre de Destinatario'
                                                )
                                        ); 
              ?>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-12">
              <?php 
                echo $this->Form->input('Shipping.address_1', 
                                          array(
                                                  'type'=>'text',
                                                  'class' => 'form-control',
                                                  'placeholder'=> 'Direccion'
                                                )
                                        ); 
              ?>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-12">
              <?php 
                echo $this->Form->input('Shipping.address_2', 
                                          array(
                                                  'type'=>'text',
                                                  'class' => 'form-control',
                                                  'placeholder'=> ''
                                                )
                                        ); 
              ?>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-12">
              <?php 
                echo $this->Form->input('Shipping.city', 
                                          array(
                                                  'type'=>'text',
                                                  'class' => 'form-control',
                                                  'placeholder'=> 'Ciudad'
                                                )
                                        ); 
              ?>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-6">
              <?php 
                echo $this->Form->input('Shipping.state', 
                                          array(
                                                  'type'=>'text',
                                                  'class' => 'form-control',
                                                  'placeholder'=> 'Estado'
                                                )
                                        ); 
              ?>
            </div>

            <div class="col-sm-6">
              <?php 
                echo $this->Form->input('Shipping.postal_code', 
                                          array(
                                                  'type'=>'text',
                                                  'class' => 'form-control',
                                                  'placeholder'=> 'Codigo Postal'
                                                )
                                        ); 
              ?>
            </div>
          </div>



          <!-- Text input-->
          <div class="form-group">
            <div class="col-sm-12">
              <?php 
                echo $this->Form->input('Shipping.country_code', array(
                                            'options' => array($countries),
                                            'empty' => 'Favor de elegir Pais',
                                            'class' => 'form-control',
                                            'required' => true
                                ));
              ?>
            </div>
          </div>
    </div>
    <div class="col-md-4">
      <?php if (!empty($loggedUser)): ?>
        <div class="form-group">
          <div class="col-sm-12">
            <?php //echo $this->Form->input('save_shipping', array('label'=>'Guardar esta direccion para futuras compras', 'type'=>'checkbox')); ?>
          </div>
        </div>
    <?php endif; ?>
    <table class="table table-bordered table-hover">
      <thead>
        <th>Resumen de Compra</th>
      </thead>
      <?php if(!empty($products)): ?>
        <?php foreach ($products as $key => $product): ?>
          <?php if(!is_array($product)){continue;} ?>
            <tr>
             <td>
                <?php echo $product['Product']['name']." ( ".$product['Cantidad']."gr )"; ?>
                <span class="pull-right">
                  <small>
                    <?php echo $this->Number->currency($product['Cantidad']*$product['Product']['price']); ?>    
                  </small>
                </span>
              </td>
            </tr>
        <?php endforeach; ?>
         <tr>
          <td>
           <p class="pull-right"><?php echo "Subtotal ".$this->Number->currency($products['Subtotal']); ?></p>
          </td>
        </tr>
         <tr>
          <td>
           <p class="pull-right"><?php echo "Envio ".$this->Number->currency($products['Shipping']); ?></p>
          </td>
        </tr>
         <tr>
          <td>
            <p class="pull-right">
              <strong>
                <?php echo "Total ".$this->Number->currency($products['Subtotal']+$products['Shipping']); ?>
              </strong>
            </p>
          </td>
        </tr>
      <?php endif; ?>
    </table>
    </div>
    <div class="col-md-8" id="select_payment">
      <div class="form-group">
          <div class="col-sm-12">
            <?php 
              $payment_method = array('card'=>'Tarjeta de Credito', 'store'=>'Tienda de Conveniencia', 'bank'=>'Banco');
              echo $this->Form->input('payment_method', array(
                                        'options' => array($payment_method),
                                        'empty' => 'Favor de elegir',
                                        'required' => true,
                                        'class' => 'form-control',
                                        'label' => 'Metodo de pago'
                                  ));
            ?>
          </div>
        </div>
    </div>
    <div class="col-md-4">
      
    </div>
    <div id="method_card">
      <div class="col-md-8">
        <?php 
            echo $this->Form->input('token_id', array('type'=>'hidden', 'id'=>'token_id', 'name'=>'token_id')); 
          ?>
          <?php 
            echo $this->Form->input('description', 
                                      array(
                                              'type'=>'hidden',
                                              'id'=>'description', 
                                              'name'=>'description',
                                              'class' => 'form-control',
                                              'value'=>'Qi House (qihouse.mx) Ventas en linea'
                                            )
                                    ); 
          ?>
          <?php 
            echo $this->Form->input('amount', 
                                    array(
                                            'type'=>'hidden', 
                                            'id'=>'amount', 
                                            'name'=>'amount', 
                                            'class' => 'form-control',
                                            'value'=> $products['Shipping'] + $products['Subtotal']
                                          )
                                    ); 
          ?>
          <div class="form-group">
            <div class="col-sm-12">
              <?php 
                echo $this->Form->input('numero_de_tarjeta', 
                                          array(
                                                  'type'=>'text',
                                                  'id'=>'cardplaceholder', 
                                                  'name'=>'number',
                                                  'class' => 'form-control',
                                                )
                                        ); 
              ?>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
              <?php
                echo $this->Form->input('nombre', 
                                          array(
                                                  'type'=>'text',
                                                  'id'=>'holder_name', 
                                                  'name'=>'name',
                                                  'data-openpay-card' => 'holder_name',
                                                  'class' => 'form-control',
                                                )
                                        ); 
                ?>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
              <?php
                echo $this->Form->input('cvc', 
                                          array(
                                                  'type'=>'text',
                                                  'id'=>'cvc', 
                                                  'name'=>'cvc',
                                                  'data-openpay-card' => 'cvv2',
                                                  'class' => 'form-control',
                                                )
                                        ); 
                ?>
                </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6">
              <?php
                echo $this->Form->input('fecha_expiracion', 
                                          array(
                                                  'type'=>'text',
                                                  'id'=>'expiry', 
                                                  'name'=>'expiry',
                                                  'class' => 'form-control',
                                                )
                                        ); 
              ?>
              </div>
            </div>

            <hr>

            <input type="hidden" size="16" name="card_number" id="cardnumberOpenpay" autocomplete="off" 
              data-openpay-card="card_number" />
            <input type="hidden" size="2" id="expiryMonthOpenpay" 
              data-openpay-card="expiration_month" />
            <input type="hidden" size="2" id="expiryYearOpenpay" 
              data-openpay-card="expiration_year" />          

            <div id="billing_address">
              <div class="form-group">
              <div class="col-sm-12">
                <?php 
                  echo $this->Form->input('Billing.address_1', 
                                            array(
                                                    'type'=>'text',
                                                    'class' => 'form-control',
                                                    'placeholder'=> 'Direccion'
                                                  )
                                          ); 
                ?>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <div class="col-sm-12">
                <?php 
                  echo $this->Form->input('Billing.address_2', 
                                            array(
                                                    'type'=>'text',
                                                    'class' => 'form-control',
                                                    'placeholder'=> ''
                                                  )
                                          ); 
                ?>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <div class="col-sm-12">
                <?php 
                  echo $this->Form->input('Billing.city', 
                                            array(
                                                    'type'=>'text',
                                                    'class' => 'form-control',
                                                    'placeholder'=> 'Ciudad'
                                                  )
                                          ); 
                ?>
              </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
              <div class="col-sm-6">
                <?php 
                  echo $this->Form->input('Billing.state', 
                                            array(
                                                    'type'=>'text',
                                                    'class' => 'form-control',
                                                    'placeholder'=> 'Estado'
                                                  )
                                          ); 
                ?>
              </div>

              <div class="col-sm-6">
                <?php 
                  echo $this->Form->input('Billing.postal_code', 
                                            array(
                                                    'type'=>'text',
                                                    'class' => 'form-control',
                                                    'placeholder'=> 'Codigo Postal'
                                                  )
                                          ); 
                ?>
              </div>
            </div>



            <!-- Text input-->
            <div class="form-group">
              <div class="col-sm-12">
                <?php 
                  echo $this->Form->input('Billing.country_code', array(
                                              'options' => array($countries),
                                              'empty' => 'Favor de elegir Pais',
                                              'class' => 'form-control',
                                              'required' => true
                                  ));
                ?>
              </div>
            </div>
          </div>
          <input type="submit" id="pay-button" class="btn btn-primary pull-right" value="Pagar"/>
      </div>
      <div class="col-md-4">
        <div class="card-wrapper"></div>
          <div class="form-group">
            <div class="col-sm-12">
              <?php echo $this->Form->input('same_shipping', array('label'=>'Utilizar la misma direccion de envio', 'type'=>'checkbox')); ?>
              <?php if (!empty($loggedUser)): ?>
                <?php //echo $this->Form->input('save_billing', array('label'=>'Guardar esta direccion para futuras compras', 'type'=>'checkbox')); ?>
              <?php endif; ?>
            </div>
          </div>
      </div>
    </div>
    <div id="method_store">
      <div class="col-md-8">
        <input type="submit" id="pay-button-store" class="btn btn-primary pull-right" value="Pagar en Tienda"/>
      </div>
      <div class="col-md-4">
        
      </div>
    </div>
    <div id="method_bank">
      <div class="col-md-8">
        <input type="submit" id="pay-button-bank" class="btn btn-primary pull-right" value="Deposito en Banco"/>
      </div>
      <div class="col-md-4">
      
      </div>
    </div>
  <?php echo $this->Form->end(); ?>
</div>



<script type="text/javascript">
  $('#payment-form').card({ 
        container: $('.card-wrapper'),
      });
</script>
