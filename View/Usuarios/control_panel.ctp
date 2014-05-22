<div class="usuarios view">
<h2><?php echo __('Usuario'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usuario['Usuario']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usuario'), array('action' => 'delete', $usuario['Usuario']['id']), null, __('Are you sure you want to delete # %s?', $usuario['Usuario']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalles'), array('controller' => 'detalles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalle'), array('controller' => 'detalles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Detalles'); ?></h3>
	<?php if (!empty($usuario['Detalle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('avatar'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Direccion'); ?></th>
		<th><?php echo __('Rfc'); ?></th>
		<th><?php echo __('Representante'); ?></th>
		<th><?php echo __('Telefono'); ?></th>
		<th><?php echo __('Giro'); ?></th>
		<th><?php echo __('Mas Info'); ?></th>
		<th><?php echo __('Por Que Toma Te'); ?></th>
		<th><?php echo __('Trabajado Anteriormente'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($usuario['Detalle'] as $detalle): ?>
		<tr>
			<td><?php echo $detalle['id']; ?></td>
			<td><?php echo $detalle['usuario_id']; ?></td>
			<td><?php echo $detalle['avatar']; ?></td>
			<td><?php echo $detalle['nombre']; ?></td>
			<td><?php echo $detalle['direccion']; ?></td>
			<td><?php echo $detalle['rfc']; ?></td>
			<td><?php echo $detalle['representante']; ?></td>
			<td><?php echo $detalle['telefono']; ?></td>
			<td><?php echo $detalle['giro']; ?></td>
			<td><?php echo $detalle['mas_info']; ?></td>
			<td><?php echo $detalle['por_que_toma_te']; ?></td>
			<td><?php echo $detalle['trabajado_anteriormente']; ?></td>
			<td><?php echo $detalle['created']; ?></td>
			<td><?php echo $detalle['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'detalles', 'action' => 'view', $detalle['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'detalles', 'action' => 'edit', $detalle['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'detalles', 'action' => 'delete', $detalle['id']), null, __('Are you sure you want to delete # %s?', $detalle['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Detalle'), array('controller' => 'detalles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
