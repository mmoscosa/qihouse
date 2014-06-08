<div class="extras form">
<?php echo $this->Form->create('Extra'); ?>
	<fieldset>
		<legend><?php echo __('Add Extra'); ?></legend>
	<?php
		echo $this->Form->input('titulo');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Extras'), array('action' => 'index')); ?></li>
	</ul>
</div>
