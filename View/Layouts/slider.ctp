<?php
/**
 *
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 */

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
	
	<!-- keywords for the site, separated by commas     -->
	<meta name="keywords" content="Tea, China, Mexico, Store, News">

	<!-- Description of the Site -->
	<meta name="description" content="QiHouse - Tea with a whole different twist">
	<link href="/img/icons/favicon.ico" rel="shortcut icon" type="image/x-icon">

	<title>
		<?php echo 'Qi House: '.$title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('//cdn.jsdelivr.net/bootstrap/3.1.1/css/bootstrap.min.css');
		echo $this->Html->css('//cdn.jsdelivr.net/fontawesome/4.1/css/font-awesome.min.css');
		echo $this->Html->css('slider-layout');

		echo $this->Html->script('//cdn.jsdelivr.net/jquery/2.1.0/jquery.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.1/modernizr.min.js');

		echo $this->Html->script('//cdn.jsdelivr.net/bootstrap/3.1.1/js/bootstrap.min.js');
		echo $this->Html->script('//cdn.jsdelivr.net/isotope/2.0.0/isotope.pkgd.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.9/jquery.transit.min.js');

		echo $this->Html->script('midway.min');
		echo $this->Html->script('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

	<!-- Custom Styles -->
	
	<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="container">
		<?php echo $this->Html->image('logo.png', array('alt'=>'qihouse logo', 'id'=>'logo')); ?>
		<nav class="navbar navbar-default navbar-slider" role="navigation">
			<div class="container">
				<div class="row">
					<div class="col-md-2 pull-left">
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="col-md-12 menu-principal">
								<ul class="nav navbar-nav pull-right">
						            <li>
						            	<a <?php echo ($title_for_layout == 'Home' ? 'class="active"' : '') ?> href="/">
						            		Home
						            	</a>
						            </li>
						            <li>
						            	<a <?php echo ($title_for_layout == 'Nosotros' ? 'class="active"' : '') ?> href="/nosotros">
						            		Nosotros
						            	</a>
						            </li>
						            <li>
						            	<a <?php echo ($title_for_layout == 'Club del Te' ? 'class="active"' : '') ?> href="/club">Club del 
						            		té
						            	</a>
						            </li>
						            <li>
						            	<a <?php echo ($title_for_layout == 'Membresia' ? 'class="active"' : '') ?> href="/membresia">
						            		Membresia
						            	</a>
						            </li>
						            <li>
						            	<a <?php echo ($title_for_layout == 'Galeria del Te' ? 'class="active"' : '') ?> href="/galeria">
						            		Galeria
						            	</a>
						            </li>
						            <li>
						            	<a <?php echo ($title_for_layout == 'Contacto' ? 'class="active"' : '') ?> href="/contacto">
						            		Contacto
						            	</a>
						            </li>
					          </ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<footer>
		<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation" id="doble-renglon">
			<div class="pull-right col-md-3 doble-renglon">
				<div class="row">
		          <ul class="nav navbar-nav social">
		          		<li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Instagram"><a href="http://instagram.com/qihouse"><i class="fa fa-instagram"></i> </a></li>
			            <li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Twitter"><a href="https://twitter.com/qihouse"><i class="fa fa-twitter"></i> </a></li>
			            <li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Facebook"><a href="https://www.facebook.com/qihouse.mx"><i class="fa fa-facebook"></i> </a></li>
			            <li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><a href="http://www.pinterest.com/qihouse/"><i class="fa fa-pinterest"></i> </a></li>
		          </ul>
				</div>
				<div class="row">
					<ul class="nav navbar-nav pull-right users">
			            <li id="login"><a href="/">Login</a></li>
			            <li><a href="/membresia">Registrarse</a></li>
		          </ul>
				</div>
			</div>
		</nav>
			<p>Qi House <?php echo date('Y'); ?> Todos los derechos Reservados.</p>
		</footer>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
