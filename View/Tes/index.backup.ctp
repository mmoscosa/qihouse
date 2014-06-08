<div class="tes index">
	<h2><?php echo __('Tes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre_original'); ?></th>
			<th><?php echo $this->Paginator->sort('foto'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tes as $te): ?>
	<tr>
		<td><?php echo h($te['Te']['id']); ?>&nbsp;</td>
		<td><?php echo h($te['Te']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($te['Te']['nombre_original']); ?>&nbsp;</td>
		<td><?php echo h($te['Te']['foto']); ?>&nbsp;</td>
		<td><?php echo h($te['Te']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($te['Te']['created']); ?>&nbsp;</td>
		<td><?php echo h($te['Te']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $te['Te']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $te['Te']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $te['Te']['id']), null, __('Are you sure you want to delete # %s?', $te['Te']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Te'), array('action' => 'add')); ?></li>
	</ul>
</div>
