<?php
    echo $this->Html->css('//cdnjs.cloudflare.com/ajax/libs/card/0.0.2/css/card.min.css');
    echo $this->Html->css('checkout.css');
?>

<?php 
    if (!empty($loggedUser)): 
        $shippingAddresses = array();
        $billingAddresses = array();
        foreach($addresses as $address): 
            $temp = array();
            $temp[$address['Address']['id']] =  $address['Address']['address_1'].', '.$address['Address']['state'].' - '.$address['Address']['country_code'];
            if($address['Address']['type'] == 1){
                array_push($billingAddresses, $temp);
            }else{
                array_push($shippingAddresses, $temp);
            }
        endforeach; 
    endif; 
?>
<div class="container" id="payment-container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-container active">
                <form action="" role="form">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Direccion de envio</h2>
                            <div class="col-md-12">
                            <?php if (!empty($loggedUser)): ?>
                                <?php
                                    echo $this->Form->input('cantidad', array(
                                                    'options' => array($shippingAddresses),
                                                    'label'=>'',
                                                    'class' => 'form-control',
                                                    'id'=>'shippingAddress',
                                                    'empty' => 'Favor de elegir'
                                    ));
                                ?>
                            <?php endif; ?>
                            <div id="#shippingForm">
                                <?php echo $this->Form->input('address.line1', array("class"=>"form-control", "placeholder"=>"Direccion", "type"=>"text",'label'=>'Direccion')); ?>
                                <?php echo $this->Form->input('address.line2', array("class"=>"form-control", "type"=>"text", 'label'=>'')); ?>
                                </div>
                        </div>
                                <div class="col-md-6">
                                    <?php echo $this->Form->input('address.state', array("class"=>"form-control", "placeholder"=>"Estado", "type"=>"text", 'label'=>'Estado')); ?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $this->Form->input('address.city', array("class"=>"form-control", "placeholder"=>"Ciudad", "type"=>"text", 'label'=>'Ciudad')); ?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $this->Form->input('address.postal_code', array("class"=>"form-control", "placeholder"=>"00000", "type"=>"text", 'label'=>'Codigo Postal')); ?>
                                </div>
                                <div class="col-md-6">
                                    <?php echo $this->Form->input('address.country', array(
                                                    'options' => array($countries),
                                                    'label'=>'',
                                                    'class' => 'form-control',
                                                    'id'=>'quantity',
                                                    'empty' => 'Favor de elegir'
                                        ));
                                    ?>
                                </div>
                                <div class="col-md-12">
                                <?php echo $this->Form->input('telephone', array("class"=>"form-control", "placeholder"=>"33 31 10 10 10", "type"=>"text", 'label'=>'Telefono')); ?>
                                <div class="pull-right">
                                    <?php echo $this->Form->input('save_shippipng', array("type"=>"checkbox", 'label'=>'Guardar a mis Direcciones de envio')); ?>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                        </div>
                    </div>
                    <hr/>
                    <div class="row cardInputs">
                        <div class="col-md-7">
                            <div class="col-md-12">
                            <?php if (!empty($loggedUser)): ?>
                                <?php
                                    // echo $this->Form->input('cantidad', array(
                                    //                 'options' => array($billingAddresses),
                                    //                 'label'=>'',
                                    //                 'class' => 'form-control',
                                    //                 'id'=>'quantity',
                                    //                 'empty' => 'Favor de elegir'
                                    // ));
                                ?>
                            <?php endif; ?>
                                <?php if(!empty($loggedUser)): ?>
                                    <?php $params = array("class"=>"form-control", "placeholder"=>"Full Name", "type"=>"text", "name"=>"name", 'value'=>$loggedUser['Detalle']['nombre'].' '.$loggedUser['Detalle']['apellido']); ?>
                                <?php else: ?>
                                    <?php $params = array("class"=>"form-control", "placeholder"=>"Full Name", "type"=>"text", "name"=>"name"); ?>
                                <?php endif; ?>
                                <?php echo $this->Form->input('number', array("class"=>"form-control", "placeholder"=>"Card number", "type"=>"text", "name"=>"number")); ?>
                                <?php echo $this->Form->input('name', $params); ?>
                                <?php echo $this->Form->input('expiry', array("class"=>"form-control", "placeholder"=>"MM/YY", "type"=>"text", "name"=>"expiry")); ?>
                                <?php echo $this->Form->input('cvc', array("class"=>"form-control", "placeholder"=>"CVC", "type"=>"text", "name"=>"cvc")); ?>
                                <div class="pull-right">
                                    <?php echo $this->Form->input('save_card', array("type"=>"checkbox", 'label'=>'Guardar tarjeta')); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card-wrapper"></div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-md-7">
                                <div id="billing_address">
                            <h2>Direccion de Cobro</h2>
                            <div class="col-md-12" >
                                    <?php if (!empty($loggedUser)): ?>
                                        <?php
                                            echo $this->Form->input('cantidad', array(
                                                            'options' => array($billingAddresses),
                                                            'label'=>'',
                                                            'class' => 'form-control',
                                                            'id'=>'quantity',
                                                            'empty' => 'Favor de elegir'
                                            ));
                                        ?>
                                    <?php endif; ?>
                                    <?php echo $this->Form->input('address.line1', array("class"=>"form-control", "placeholder"=>"Direccion", "type"=>"text",'label'=>'Direccion')); ?>
                                    <?php echo $this->Form->input('address.line2', array("class"=>"form-control", "type"=>"text", 'label'=>'')); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address.state', array("class"=>"form-control", "placeholder"=>"Estado", "type"=>"text", 'label'=>'Estado')); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address.city', array("class"=>"form-control", "placeholder"=>"Ciudad", "type"=>"text", 'label'=>'Ciudad')); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address.postal_code', array("class"=>"form-control", "placeholder"=>"00000", "type"=>"text", 'label'=>'Codigo Postal')); ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo $this->Form->input('address.country', array(
                                                        'options' => array($countries),
                                                        'label'=>'',
                                                        'class' => 'form-control',
                                                        'id'=>'quantity',
                                                        'empty' => 'Favor de elegir'
                                            ));
                                        ?>
                                    </div>
                                    <div class="col-md-12">
                                    <?php echo $this->Form->input('telephone', array("class"=>"form-control", "placeholder"=>"33 31 10 10 10", "type"=>"text", 'label'=>'Telefono')); ?>
                                        <div class="pull-right">
                                            <?php echo $this->Form->input('save_billing', array("type"=>"checkbox", 'label'=>'Guardar a mis Direcciones de cobro')); ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-5">
                            <div class="checkbox">
                                <?php echo $this->Form->input('same_address', array('id'=>'same_address',"type"=>"checkbox", 'label'=>'Mi Direccion es igual a la Direccion de envio')); ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php
    echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/card/0.0.2/js/card.min.js', array('inline' => false));
?>

<script>
    $('.cardInputs').card({
        container: $('.card-wrapper')
    })
    $('#shippingAddress').change(function () {
       // $
    });
    $('#same_address').change(function() {
       if($(this).is(":checked")) {
          //'checked' event code
          $("#billing_address").slideUp();
          return;
       }
       //'unchecked' event code
       $("#billing_address").slideDown();
    });
</script>
