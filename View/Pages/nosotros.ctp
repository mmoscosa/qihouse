<?php 
    echo $this->Html->css('nosotros');
    echo $this->Html->script('galeria-te/mmoscosa-galeria');
 ?>

<div class="well parallax intro">
	<div id="quote">
		<p>Hay una gran cantidad de poesía y buenos sentimientos en una cajita de té</p>
		<span>TRalph Waldo</span>
	</div>
</div>

<div class="row" id="nosotros">
	<div class="col-md-12" id="intro">
		<h1>¿Quienes Somos?</h1>
		
		<?php echo $this->Html->image('nosotros/quienes-somos.png', array('id'=>'quienes-somos', 'alt'=>'qihouse quienes somos')); ?>
		
		<p>Qi House fue fundada en 2013 cuándo un grupo de aficionados al té llegó a México y descubrieron que, a pesar del gran auge de té en el mundo, muchos bebedores de té   erimentando su segundo nacimiento atrayendo la atención de científicos, nutriólogos y adeptos de la meditación, ya que se siguen descubriendo nuevos beneficios de esta bebida sublime. México apenas está empezando a descubrir las diferentes variedades de té chino, el cuál está conquistando los corazones de los mexicanos a gran velocidad. </p>
		
		<p>Qi House está dedicado a proporcionar tés orientales originales, aromáticos y sorprendentemente deliciosos a todo México , con el fin de promover la cultura de la bebida del té y potenciar el crecimiento de la comunidad de los que aprecian el encanto y beneficios para la salud de una buena taza de té.</p>
	</div>
	<div class="col-md-7">
		<h2>Conocemos nuestros tés y nos complace compartir este conocmiiento.</h2>
		<p>Hablar de té no es tan fácil cuando de calidad se trata, actualmente existen infinidad de ellos. Las tisanas normalmente ocultan los malos aromas o sabores  - sin embargo, cuando se tiene una hoja simple y llana en una taza - todo queda claro como el cristal. Deseamos ser honestos con nuestros clientes - solo ofrecemos tés que traemos personalmente de las provincias chinas, hojas sueltas y frescas de la más alta calidad.</p>
		<p>Conocemos nuestros tés y nos complace compartir este conocimiento, así como responsabilizarnos de lo que ofrecemos. Incluso si alguna vez se ha decepcionado del té - lo invitamos a darle otra oportunidad con nuestro producto.</p>
	</div>
	<div class="col-md-5">
		<?php echo $this->Html->image('nosotros/conocemos.png', array('id'=>'conocemos', 'alt'=>'qihouse quienes somos')); ?>
	</div>
</div>

<div class="well parallax brocheure">
	<a href="/files/descargas/Brochure _B.pdf" target="_blank">
		<i class="fa fa-file midway-horizontal"> Descarga nuestro brocheure</i>
	</a>
</div>
