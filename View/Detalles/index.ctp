<div class="detalles index">
	<h2><?php echo __('Detalles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('usuario_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('direccion'); ?></th>
			<th><?php echo $this->Paginator->sort('rfc'); ?></th>
			<th><?php echo $this->Paginator->sort('representante'); ?></th>
			<th><?php echo $this->Paginator->sort('telefono'); ?></th>
			<th><?php echo $this->Paginator->sort('giro'); ?></th>
			<th><?php echo $this->Paginator->sort('mas_info'); ?></th>
			<th><?php echo $this->Paginator->sort('por_que_toma_te'); ?></th>
			<th><?php echo $this->Paginator->sort('trabajado_anteriormente'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($detalles as $detalle): ?>
	<tr>
		<td><?php echo h($detalle['Detalle']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($detalle['Usuario']['email'], array('controller' => 'usuarios', 'action' => 'view', $detalle['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($detalle['Detalle']['nombre']); ?>&nbsp;</td>
		<td><?php echo h($detalle['Detalle']['direccion']); ?>&nbsp;</td>
		<td><?php echo h($detalle['Detalle']['rfc']); ?>&nbsp;</td>
		<td><?php echo h($detalle['Detalle']['representante']); ?>&nbsp;</td>
		<td><?php echo h($detalle['Detalle']['telefono']); ?>&nbsp;</td>
		<td><?php echo h($detalle['Detalle']['giro']); ?>&nbsp;</td>
		<td><?php echo h($detalle['Detalle']['mas_info']); ?>&nbsp;</td>
		<td><?php echo h($detalle['Detalle']['por_que_toma_te']); ?>&nbsp;</td>
		<td><?php echo h($detalle['Detalle']['trabajado_anteriormente']); ?>&nbsp;</td>
		<td><?php echo h($detalle['Detalle']['created']); ?>&nbsp;</td>
		<td><?php echo h($detalle['Detalle']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $detalle['Detalle']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $detalle['Detalle']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $detalle['Detalle']['id']), null, __('Are you sure you want to delete # %s?', $detalle['Detalle']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Detalle'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
