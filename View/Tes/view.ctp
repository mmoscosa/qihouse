<div class="tes view">
<h2><?php echo __('Te'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($te['Te']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($te['Te']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre Original'); ?></dt>
		<dd>
			<?php echo h($te['Te']['nombre_original']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Foto'); ?></dt>
		<dd>
			<?php echo h($te['Te']['foto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($te['Te']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($te['Te']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($te['Te']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Te'), array('action' => 'edit', $te['Te']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Te'), array('action' => 'delete', $te['Te']['id']), null, __('Are you sure you want to delete # %s?', $te['Te']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Te'), array('action' => 'add')); ?> </li>
	</ul>
</div>
