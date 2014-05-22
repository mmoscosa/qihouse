<div class="usuarios form col-md-8">
<?php echo $this->Form->create('Usuario', array(
												'inputDefaults' => array(
													'div' => 'form-group',
													'label' => false,
													'wrapInput' => false,
													'class' => 'form-control'
												),
										)); ?>
	<fieldset>
		<legend><?php echo __('Registrar'); ?></legend>
	<?php
		echo $this->Form->input('email', array('label' => 'Correo electronico'));
		echo $this->Form->input('password', array('label' => 'Contraseña'));
		echo $this->Form->submit('Siguiente', array('div' => 'form-group','class' => 'btn btn-default'));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
