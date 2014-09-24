<?php echo $this->Form->create('Address'); ?>
	<?php
		//echo $this->Form->input('usuario_id');
		if ($loggedUser) {
			echo $this->Form->input('usuario_id', array('value'=>$loggedUser['Usuario']['id'], 'type'=>'hidden'));
		}
	?>

		<div class="form-group">
            <div class="col-sm-12">
            	<?php $options = array('1'=>'Direccion de Envio', '2'=>'Direccion de Cobro') ?>
				<?php echo $this->Form->input('type', array(
                                            'options' => array($options),
                                            'empty' => 'Favor de elegir',
                                            'required' => true,
                                            'class' => 'form-control',
                                            'label' => 'Tipo de Direccion'
                                ));?>
			</div>
		</div>
		<div class="form-group">
            <div class="col-sm-12">
				<?php echo $this->Form->input('address_1', array('class' => 'form-control', 'label'=>'Direccion - Linea 1'));?>
			</div>
		</div>
		<div class="form-group">
            <div class="col-sm-12">
				<?php echo $this->Form->input('address_2', array('class' => 'form-control', 'label'=>'Colonia'));?>
			</div>
		</div>
		<div class="form-group">
            <div class="col-sm-6">
				<?php echo $this->Form->input('city', array('class' => 'form-control', 'label'=>'Ciudad'));?>
			</div>
		</div>
		<div class="form-group">
            <div class="col-sm-6">
				<?php echo $this->Form->input('state', array('class' => 'form-control', 'label'=>'Estado'));?>
			</div>
		</div>
		<div class="form-group">
            <div class="col-sm-6">
				<?php echo $this->Form->input('phone_number', array('class' => 'form-control', 'label'=>'Telefono'));?>
			</div>
		</div>
		<div class="form-group">
            <div class="col-sm-6">
				<?php echo $this->Form->input('country_code', array(
                                            'options' => array($countries),
                                            'empty' => 'Favor de elegir',
                                            'required' => true,
                                            'class' => 'form-control',
                                            'label' => 'Pais' 
                                ));?>
            </div>
		</div>
		<div class="form-group">
            <div class="col-sm-6 col-sm-offset-6">
				<?php echo $this->Form->input('postal_code', array('class' => 'form-control', 'label'=>'Codigo Postal'));?>
			</div>
		</div>
		<div class="form-group">
            <div class="col-sm-12">
            	<div class="pull-right">
					<?php echo $this->Form->button('Guardar', array('class' => 'btn btn-primary',));?>
				</div>
			</div>
		</div>
	
<?php echo $this->Form->end(); ?>
