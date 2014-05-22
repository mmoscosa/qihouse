<div class="detalles view">
<h2><?php echo __('Detalle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($detalle['Usuario']['email'], array('controller' => 'usuarios', 'action' => 'view', $detalle['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Direccion'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['direccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rfc'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['rfc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Representante'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['representante']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['telefono']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Giro'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['giro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mas Info'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['mas_info']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Por Que Toma Te'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['por_que_toma_te']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Trabajado Anteriormente'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['trabajado_anteriormente']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($detalle['Detalle']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Detalle'), array('action' => 'edit', $detalle['Detalle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Detalle'), array('action' => 'delete', $detalle['Detalle']['id']), null, __('Are you sure you want to delete # %s?', $detalle['Detalle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Detalles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Detalle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
