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
          <div class="form-group">
            <div class="col-sm-12">
              <?php 
                echo $this->Form->input('Shipping.receipient', 
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
                echo $this->Form->input('Shipping.addres_1', 
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
                echo $this->Form->input('Shipping.addres_2', 
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
                echo $this->Form->input('Shipping.cp', 
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
            <?php echo $this->Form->input('save_shipping', array('label'=>'Guardar esta direccion para futuras compras', 'type'=>'checkbox')); ?>
          </div>
        </div>
    <?php endif; ?>
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
                  echo $this->Form->input('Billing.addres_1', 
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
                  echo $this->Form->input('Billing.addres_2', 
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
                  echo $this->Form->input('Billing.cp', 
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
        <?php if (!empty($loggedUser)): ?>
          <div class="form-group">
            <div class="col-sm-12">
              <?php echo $this->Form->input('same_shipping', array('label'=>'Utilizar la misma direccion de envio', 'type'=>'checkbox')); ?>
              <?php echo $this->Form->input('save_billing', array('label'=>'Guardar esta direccion para futuras compras', 'type'=>'checkbox')); ?>
            </div>
          </div>
        <?php endif; ?>
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
