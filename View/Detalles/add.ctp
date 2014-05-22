<style type="text/css">
	#otro_giro{
		display: none;
	}
</style>
<div class="detalles form col-md-8">
<?php echo $this->Form->create('Detalle', array(
												'inputDefaults' => array(
													'div' => 'form-group',
													'label' => false,
													'wrapInput' => false,
													'class' => 'form-control'
												),
												'type'	=>	'file'
										)); ?>
	<fieldset>
		<legend><?php echo __('Add Detalle'); ?></legend>
	<?php
		echo $this->Form->input('nombre', array('label' => 'Nombre'));
		echo $this->Form->input('avatar', array('type' => 'file', 'label' => 'Avatar'));
		echo $this->Form->input('direccion', array('label' => 'Direccion'));
		echo $this->Form->input('telefono', array('label' => 'Telefono'));
		if(!empty($tipo)){
			echo $this->Form->input('giro', array('label' => 'Giro', 'options'=> array(
													                        'Case de Te' => 'Case de Te', 
													                        'Cafeteria'  => 'Cafeteria' , 
													                        'Restaurante' => 'Restaurante',
													                        'SPA' => 'SPA',
													                        'Gimnasio' => 'Gimnasio',
													                        'Otro' => 'Otro',
													                        ), 
													'empty' => 'Favor selecionar',
													'id'=>'giro'));
			echo $this->Form->input('giro.otro', array('label' => '', 'id'=>'otro_giro', 'placeholder'=>'Favor de especificar'));
			echo $this->Form->input('rfc', array('label' => 'RFC'));
			echo $this->Form->input('representante', array('label' => 'Nombre del representante'));
			echo $this->Form->input('trabajado_anteriormente', array('label' => '¿Ha trabajado con nosotros anteriormente?', 'options'=>array(
			                        1=>'Si, me he entrevistado con representantes de Qi House', 
			                        2=>'No, los encontré en internet' , 
			                        3=> 'Fueron recomendados por otra persona'
			                        ), 
				'empty' => 'Favor selecionar'));
		}else{
			echo $this->Form->input('mas_info', array(
								                        'options' => array(
									                        'Actualización sobre todo lo relacionado al mundo del té' => 'Actualización sobre todo lo relacionado al mundo del té', 
									                        'Nuevos lugares para disfrutar del té' => 'Nuevos lugares para disfrutar del té',
									                        'Eventos' => 'Eventos',
									                        'Promociones' => 'Promociones',
									                        'Artículos e investigaciones sobre el té' => 'Artículos e investigaciones sobre el té',
								                        ),
													    'multiple' => 'checkbox',
													    'label' => 'Sobre que le interesa recibir información'
								                )
									);
			echo $this->Form->input('por_que_toma_te', array(
								                        'options' => array(
									                        'Es saludable' =>'Es saludable',
									                        'Es sabroso' =>'Es sabroso',
									                        'Esta de moda' =>'Esta de moda',
									                        'Mis amigos lo toman' =>'Mis amigos lo toman',
									                        'Quiero dejar de tomar café' =>'Quiero dejar de tomar café',
									                        'Me ayuda a tener armonía' =>'Me ayuda a tener armonía',
									                        'Me ayuda cuando tengo resaca' =>'Me ayuda cuando tengo resaca',
									                        'Simplemente me gusta todo lo oriental' =>'Simplemente me gusta todo lo oriental',
									                        'Las tazas y teteras son muy bonitas' =>'Las tazas y teteras son muy bonitas',
								                        ),
													    'multiple' => 'checkbox',
													    'label' => 'Usted toma té porque'
								                )
									);
		}
		echo $this->Form->submit('Finalizar', array('div' => 'form-group','class' => 'btn btn-default'));
	?>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Detalles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>

<script type="text/javascript">
	$('#giro').on('change', function(){
		if(this.value === 'Otro'){
			$('#otro_giro').show();
		}else{
			$('#otro_giro').hide();
		}
	});
</script>
