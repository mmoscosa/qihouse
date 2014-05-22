<div class="detalles form">
<?php echo $this->Form->create('Detalle'); ?>
	<fieldset>
		<legend><?php echo __('Edit Detalle'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('usuario_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('direccion');
		echo $this->Form->input('rfc');
		echo $this->Form->input('representante');
		echo $this->Form->input('telefono');
		echo $this->Form->input('giro');
		echo $this->Form->input('mas_info');
		echo $this->Form->input('por_que_toma_te');
		echo $this->Form->input('trabajado_anteriormente');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Detalle.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Detalle.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Detalles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
