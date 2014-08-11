<div class="addresses form">
<?php echo $this->Form->create('Card', array('inputDefaults' => array(
													'div' => 'form-group',
													'label' => false,
													'wrapInput' => false,
													'class' => 'form-control'))); ?>
	<fieldset>
		<legend><?php echo __('Add Card'); ?></legend>
	<?php
		echo $this->Form->input('holder_name');
		echo $this->Form->input('address_id');
		echo $this->Form->input('card_number');
		echo $this->Form->input('cvv2');
		echo $this->Form->input('expiration_month');
		echo $this->Form->input('expiration_year');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
