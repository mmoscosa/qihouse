<div class="tes form">
<?php echo $this->Form->create('Te', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Te'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('nombre_original');
		echo $this->Form->input('foto', array('type' => 'file'));
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tes'), array('action' => 'index')); ?></li>
	</ul>
</div>
