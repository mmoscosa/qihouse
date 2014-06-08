<div class="partners form col-md-8">
<?php 
	echo $this->Form->create('Partner', array(
												'inputDefaults' => array(
													'div' => 'form-group',
													'label' => false,
													'wrapInput' => false,
													'class' => 'form-control'
												),
												'type'	=>	'file'
										)
							);
 ?>
	<fieldset>
		<legend><?php echo __('Add Partner'); ?></legend>
	<?php
		echo $this->Form->input('logo', array('type' => 'file', 'label'=>'Logotipo'));
		echo $this->Form->input('nombre', array('label' => 'Nombre'));
		echo $this->Form->input('descripcion', array('label' => 'Descripcion'));
		echo $this->Form->submit('Add', array('div' => 'form-group','class' => 'btn btn-default'));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions col-md-4">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Partners'), array('action' => 'index')); ?></li>
	</ul>
</div>



