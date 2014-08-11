<?php 
    echo $this->Html->css('club');
    echo $this->Html->script('galeria-te/mmoscosa-galeria');
?>
<div id="club-header" class="row">
	<h1>¿Eres Nuevo en el té?</h1>
</div>

<div class="parallax well" id="key">
	<div >
		<ul>
			<li>
				<div class="default-key one">
					<?php echo $this->Html->image('club/hoja-icono.png'); ?>
					<p>Calidad incomparable en hoja suelta de té</p>
				</div>
				<div class="active-key one">
					
				</div>
			</li>
			<li id="test">
				<div class="default-key two">
					<?php echo $this->Html->image('club/tetera-icono.png'); ?>
					<p>Tradiciones milenarias fusionadas con la vida moderna</p>
				</div>
				<div class="active-key two">
					
				</div>
			</li>
			<li>
				<div class="default-key three">
					<?php echo $this->Html->image('club/monos-icono.png'); ?>
					<p>Acercando a las personas – debería haber menos soledad</p>
				</div>
				<div class="active-key three">
					
				</div>
			</li>
			<li>
				<div class="default-key four">
					<?php echo $this->Html->image('club/yinyan-icono.png'); ?>
					<p>Proporcionando un poco mas de armonía para el mundo</p>
				</div>
				<div class="active-key four">
					
				</div>
			</li>
		</ul>
	</div>	
</div>

<div class="parallax well" id="unete">
	<div class="midway-horizontal">
		<h1>Nuestro Club</h1>
		<p>Nos gusta atender a los miembros de nuestro club y compartir nuestros conocimientos con ellos. Si le interesa saber mas acerca de los beneficios de ser socio…</p>
		<a href="/membresia">unete ahora</a>
	</div>
</div>
<!-- 
<div class="row" id="extras">
	<div class="col-md-12">
		<h1 class="midway-horizontal">Extras</h1>
		<div class="row">
			<div class="col-md-5">
				<?php echo $this->Html->image('club/dragon.png'); ?>
			</div>
			<div class="col-md-3">
				<div class="row">
					<div class="col-md-12">
						<?php echo $this->Html->image('club/video1.png'); ?>
					</div>
					<div class="col-md-12"></div>
				</div>
			</div>
			<div class="col-md-4"> 
				<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-6"></div>
					<div class="col-md-12"><?php echo $this->Html->image('club/video1.png'); ?></div>
					<div class="col-md-6"></div>
					<div class="col-md-6"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="parallax well" id="clientes">
	<h1 class="midway-horizontal">Nuestros Clientes</h1>
	
	<ul class="midway-horizontal">
		<?php foreach ($partners as $key => $partner): ?>
			<li>
				<?php echo $this->Html->image('/files/partner/logo/'.$partner['Partner']['id'].'/carousel_'.$partner['Partner']['logo'], array('alt'=>'qihouse partners', 'url'=>array('controller'=>'partners', 'action'=>'view', $partner['Partner']['id']))); ?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>
 -->
