<div class="tes form">
<?php echo $this->Form->create('Te'); ?>
	<fieldset>
		<legend><?php echo __('Edit Te'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('nombre_original');
		echo $this->Form->input('foto');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Te.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Te.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tes'), array('action' => 'index')); ?></li>
	</ul>
</div>
