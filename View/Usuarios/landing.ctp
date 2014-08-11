<?php 
	echo $this->Html->css('membresia'); 
	echo $this->Html->script('galeria-te/mmoscosa-galeria');
	echo $this->Html->script('membresia');
?>
<div id="membresia">
	<div class="well parallax">
		<?php echo $this->Html->image('membresia/platos.png', array()); ?>
		<div id="quote">
			<p>No existe problema tan grave o tan grande que no se reduzca con una buena taza de té</p>
			<span>Bernard-Paul</span>
		</div>
	</div>
	<div class="row" id="tazas">
		<div class="col-md-12">
			<h3>Agradecemos su interés por ser parte de nuestro club y de los beneficios que se adquieren.</h3>
		</div>
		<div class="col-md-6 tipo-membresia" id="personal">
			<h1>Particular</h1>
			<p>
				<ul>
					<li>
						<i class="fa fa-bullseye"></i> 
						biblioteca personal del té
					</li>
					<li>
						<i class="fa fa-bullseye"></i> 
						acceso directo a tienda en línea
					</li>
					<li>
						<i class="fa fa-bullseye"></i> 
						invitaciones a eventos exclusivos
					</li>
					<li>
						<i class="fa fa-bullseye"></i> 
						actualizaciones sobre noticias de té en México
					</li>
					<li>
						<i class="fa fa-bullseye"></i> 
						cursos en línea y soporte personalizado
					</li>
					<li>
						<i class="fa fa-bullseye"></i> 
						muestras gratis de té para los embajadores del té
					</li>
					<li>
						<i class="fa fa-bullseye"></i> 
						acceso a comentarios y reseñas
					</li>
				</ul>
			</p>
			<?php echo $this->Html->image('membresia/taza.png', array('alt'=>'qihouse tazas', 'class'=>'tacita' ,'url'=>array(
			                              'controller'	=>	'usuarios',
			                              'action'		=>	'register'
			))); ?>
		</div>
		<div class="col-md-6 tipo-membresia" id="negocio">
			<h1>Negocio</h1>
			<p>
				<ul>
					<li>
						<i class="fa fa-bullseye"></i> 
						Sistema de compra en línea con historial de compras y actualización de estado
					</li>
					<li>
						<i class="fa fa-bullseye"></i> 
						Acceso a información del mercado
					</li>
					<li>
						<i class="fa fa-bullseye"></i> 
						Acceso a promociones y productos nuevos 
					</li>
					<li>
						<i class="fa fa-bullseye"></i> 
						Encuestas en línea para la comunidad
					</li>
					<li>
						<i class="fa fa-bullseye"></i> 
						Capacitación y degustaciones
					</li>
					<li>
						<i class="fa fa-bullseye"></i> 
						Acceso a materiales de promoción gratis
					</li>
				</ul>
			</p>
			<?php echo $this->Html->image('membresia/tazas.png', array('alt'=>'qihouse tazas', 'url'=>array(
			                              'controller'	=>	'usuarios',
			                              'action'		=>	'register',
			                              '1'
			))); ?>
		</div>
	</div>
	<div class="divider parallax">

	</div>
</div>
