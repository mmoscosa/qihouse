<div id="modifyProdict">
    <h3>Modificar: <?php echo $product['Product']['name'] ?></h3>
    <?php echo $this->Form->create('Product', array('action'=>'modifyProduct', 'inputDefaults' => array(
                                                        'div' => 'form-group',
                                                        'label' => false,
                                                        'wrapInput' => false,
                                                        'class' => 'form-control'))); ?>
        <?php echo $this->Form->input('id', array('value'=>$product['Product']['id'], 'hidden'=>true)); ?>
        <?php echo $this->Form->input('cantidad', array(
                            'options' => array($cantidadesArray),
                            'empty' => 'Favor de elegir',
                            'required' => true
                )); 
        ?>
        <?php echo $this->Form->submit('Modificar', array('class'=>'btn btn-default pull-right', 'escape'=>false)); ?>
    <?php echo $this->Form->end(); ?>
</div>

<style type="text/css">
    #modifyProdict{
        height: 200px;
        padding: 50px 50px 50px 50px;
    }
</style>
