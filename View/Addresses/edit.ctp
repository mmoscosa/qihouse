<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<legend><?php echo __('Edit Address'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('type');
		echo $this->Form->input('address_1');
		echo $this->Form->input('address_2');
		echo $this->Form->input('country');
		echo $this->Form->input('state');
		echo $this->Form->input('postcode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Address.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Address.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
