<?php 
    echo $this->Html->css('galeria-te/component');
    echo $this->Html->css('galeria-te');
    
    echo $this->Html->script('galeria-te/modernizr.custom');
    echo $this->Html->script('galeria-te/classie');
    echo $this->Html->script('galeria-te/helper');
 	echo $this->Html->script('galeria-te/grid3d');
 	echo $this->Html->script('galeria-te/mmoscosa-galeria');
 ?>

<div class="well parallax">
	<div id="quote">
		<p>Se bebé te para olvidar el ruido del mundo</p>
		<span>T'ien Yihrng</span>
	</div>
</div>
<section class="grid3d vertical" id="grid3d">
	<div class="grid-wrap">
		<div class="grid">
			<?php foreach ($tes as $te): ?>
				<figure>
					<?php echo $this->Html->image('/files/te/foto/'.$te['Te']['id'].'/thumb_'.$te['Te']['foto']); ?>
				</figure>
			<?php endforeach; ?>
		</div>
	</div><!-- /grid-wrap -->
	<div class="content">
		<?php foreach ($tes as $te): ?>
			<div>
				<h1 class="midwayHorizontal midway">
					<?php echo $te['Te']['nombre']; ?>
					<span><?php echo $te['Te']['nombre_original']; ?></span>
				</h1>
				<div class="dummy-img">
					<?php echo $this->Html->image('/files/te/foto/'.$te['Te']['id'].'/'.$te['Te']['foto']); ?>
				</div>
				<p class="dummy-text">
					<?php echo $te['Te']['descripcion']; ?>
				</p>
			</div>
		<?php endforeach; ?>
		<span class="loading"></span>
		<span class="icon close-content"><i class="fa fa-times"></i></span>
	</div>
</section>

<script>
	new grid3D( document.getElementById( 'grid3d' ) );
</script>
