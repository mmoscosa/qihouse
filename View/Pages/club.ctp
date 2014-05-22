<?php 
    echo $this->Html->css('club');
    echo $this->Html->script('galeria-te/mmoscosa-galeria');
?>
<div id="club-header" class="row">
	<h1>¿Eres Nuevo en el té?</h1>
</div>

<div class="parallax well" id="key">
	

</div>
<div class="parallax well" id="unete">
	<div class="midway-horizontal">
		<h1>Nuestro Club</h1>
		<p>Nos gusta atender a los miembros de nuestro club y compartir nuestros conocimientos con ellos. Si le interesa saber mas acerca de los beneficios de ser socio…</p>
		<a href="/membresia">unete ahora</a>
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
