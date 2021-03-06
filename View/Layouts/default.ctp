<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
	
	<!-- keywords for the site, separated by commas     -->
	<meta name="keywords" content="Tea, China, Mexico, Store, News">

	<!-- Description of the Site -->
	<meta name="description" content="QiHouse - Tea with a whole different twist">
	<link href="/img/icons/favicon.ico" rel="shortcut icon" type="image/x-icon">
	
		<?php echo $this->Seo->title('Qi House: '.$title_for_layout); ?>
	
	<?php
		echo $this->Html->charset();
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('//cdn.jsdelivr.net/bootstrap/3.1.1/css/bootstrap.min.css');
		echo $this->Html->css('//cdn.jsdelivr.net/fontawesome/4.1/css/font-awesome.min.css');
		echo $this->Html->css('main');

		echo $this->Html->script('//cdn.jsdelivr.net/jquery/2.1.0/jquery.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.1/modernizr.min.js');

		echo $this->Html->script('//cdn.jsdelivr.net/bootstrap/3.1.1/js/bootstrap.min.js');
		echo $this->Html->script('//cdn.jsdelivr.net/isotope/2.0.0/isotope.pkgd.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.9/jquery.transit.min.js');
		echo $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/howler/1.1.17/howler.min.js');
		
		echo $this->Html->script('midway.min');
		echo $this->Html->script('currency');
		echo $this->Html->script('jquery.rss.js');
		
		
		echo $this->Html->script('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<?php echo $this->Seo->metaTags(); ?>
	<?php echo $this->Seo->canonical(); ?>
	<!-- Custom Styles -->
	
	<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="container">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar-top">
			<div class="container">
				<div class="row">
					<div class="col-md-2 pull-left">
						<?php echo $this->Html->image('logo.png', array('alt'=>'qihouse logo', 'id'=>'logo', 'url'=>'http://'.$_SERVER['HTTP_HOST'])); ?>
					</div>
					<div class="col-md-10">
						<div class="row">
							<div class="pull-right col-md-3 doble-renglon">
								<div class="row">
						          <ul class="nav navbar-nav social">
						          		<li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Instagram"><a href="http://instagram.com/qihouse"><i class="fa fa-instagram"></i> </a></li>
							            <li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Twitter"><a href="https://twitter.com/qihouse"><i class="fa fa-twitter"></i> </a></li>
							            <li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Facebook"><a href="https://www.facebook.com/qihouse.mx"><i class="fa fa-facebook"></i> </a></li>
							            <li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><a href="http://www.pinterest.com/qihouse/"><i class="fa fa-pinterest"></i> </a></li>
						            	<li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Carrito de Compras">
								            <?php 
								            	echo $this->Html->link(
								            	                       '<i class="fa fa-shopping-cart"></i>', 
								            	                       array(
								            	                        		'controller'=>'products',
								            	                        		'action'=>'cart'
								            	                             ),
								            	                       array(
								            	                             'escape' => false
								            	                             )
								            	                    	); 
							            	?>
						            	</li>
						          </ul>
								</div>
								<div class="row">
									<ul class="nav navbar-nav pull-right">
										<?php if (!empty($loggedUser)): ?>
											<li><?php echo $this->Html->link('Mi Qi House', array('controller'=>'Usuarios', 'action'=>'control_panel', $loggedUser['Usuario']['id'])); ?></li>
											<li><?php echo $this->Html->link('Logout', array('controller'=>'Usuarios', 'action'=>'logout')); ?></li>
										<?php else: ?>	
								            <li><?php echo $this->Html->link('Login', '#',array('id'=>'login_button')); ?></li>
								            <li><?php echo $this->Html->link('Registrarse', array('controller'=>'Usuarios', 'action'=>'landing')); ?></li>
										<?php endif; ?>
						          </ul>
								</div>
							</div>
							<div class="col-md-9 menu-principal">
								<ul class="nav navbar-nav pull-right">
						            <li>
						            	<a <?php echo ($title_for_layout == 'Club del Te' ? 'class="active"' : '') ?> href="/club">Club del 
						            		té
						            	</a>
						            </li>
						            <?php if (empty($loggedUser)): ?>
							            <li>
							            	<a <?php echo ($title_for_layout == 'Membresia' ? 'class="active"' : '') ?> href="/membresia">
							            		Membresia
							            	</a>
							            </li>
						            <?php endif ?>
						            <li>
						            	<a <?php echo ( strpos($title_for_layout, 'Galeria del Te') ? 'class="active"' : '') ?> href="/bazar">
						            		Bazar
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
		<div id="content" class="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		<div class="container" id="blog">
			<div class="row">
				<div class="col-md-12">
					<h2 class="midway-horizontal">Ultimos Posts</h2>
					<hr/>
					<div id="posts">
					</div>
				</div>
			</div>
		</div>
		<!--Footer-->
		<div class="footer navbar navbar-default navbar-bottom">
		    <div class="container">
		     	<div class="row">
		     		<!--Nosotros-->
		     		<div class="col-md-4">
		     			<h1>Nosotros</h1>
		     			<p>Qi House fue fundada en 2013 cuándo un grupo de aficionados al té llegó a México y descubrieron que, a pesar del gran auge de té en el mundo, muchos bebedores de té en México no han tenido la oportunidad de disfrutar de una bebida verdaderamente aromática debido a la ausencia de té de hoja suelta de buena calidad.</p>
		     			<div class="social-nav">
			     			<ul class="nav navbar-nav social">
				          		<li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Instagram"><a href="http://instagram.com/qihouse"><i class="fa fa-instagram"></i> </a></li>
					            <li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Twitter"><a href="https://twitter.com/qihouse"><i class="fa fa-twitter"></i> </a></li>
					            <li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Facebook"><a href="https://www.facebook.com/qihouse.mx"><i class="fa fa-facebook"></i> </a></li>
					            <li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><a href="http://www.pinterest.com/qihouse/"><i class="fa fa-pinterest"></i> </a></li>
				          </ul>
		     			</div>
		     		</div>
		     		<!--Direccion-->
		     		<div class="col-md-4" id="tipos_footer">
		     			<h1>Tes</h1>
		     			<div class="row">
		     				<div class="col-md-6"> 
		     					<ul>
		     						<li><a href="/bazar/blanco"><i id="blanco" class="fa fa-leaf"></i> Blanco</a></li>
		     						<!-- <li><a href="/bazar/amarillo" class="disabled"><i id="amarillo" class="fa fa-leaf"></i> Amarillo</a></li> -->
		     						<li><a href="/bazar/verde"><i id="verde" class="fa fa-leaf"></i> Verde</a></li>
		     						<li><a href="/bazar/oolong"><i id="oolong" class="fa fa-leaf"></i> Oolong</a></li>
		     					</ul>
		     				</div>
		     				<div class="col-md-6"> 
		     					<ul>
		     						<li><a href="/bazar/rojo"><i id="rojo" class="fa fa-leaf"></i> Rojo</a></li>
		     						<!-- <li><a href="/bazar/negro" class="disabled"><i id="negro" class="fa fa-leaf"></i> Negro</a></li> -->
		     						<li><a href="/bazar/puerh"><i id="puerh" class="fa fa-leaf"></i> Pu erh</a></li>
		     					</ul>
		     				</div>
		     			</div>
		     		</div>
		     		<!--Subscribete-->
		     		<div class="col-md-4">
		     			<h1>Suscribete</h1>
		     			<?php echo $this->Form->create('Page', array(
												'inputDefaults' => array(
													'div' => 'form-group',
													'label' => false,
													'wrapInput' => false,
													'class' => 'form-control'
												),
										)); ?>
						<?php echo $this->Form->input('email', array('type' => 'email', 'label'=>'', 'placeholder'=>'Correo electronico')); ?>
						<?php echo $this->Form->end(); ?>
		     		</div>
		     	</div>
		    </div>
		</div>
		<!--Footer Content-->
     	<div class="navbar navbar-default navbar-bottom bottom-footer">
     		<div class="container">
	     		<div class="row">
		     		<div class="col-md-4"><?php echo date('Y'); ?> © Todos los derechos reservados Qi House</div>
		     		<div class="col-md-8">
						<ul class="nav navbar-nav pull-right">
				            <li><a href="/">Home</a></li>
				            <li><a href="/club">Club del té</a></li>
				            <?php if (empty($loggedUser)): ?>
				            	<li><a href="/membresia">Membresia</a></li>
				        	<?php endif; ?>
				            <li><a href="/bazar">Bazar</a></li>
				            <li><a href="/contacto">Contacto</a></li>
			          </ul>
		     		</div>
	     		</div>
		     	<!--SQL Debug Only-->
				<div class="row">
					<?php //echo $this->element('sql_dump'); ?>
				</div>
     		</div>
     	</div>
		<!--End Footer-->
	</div>

	 <div id="loginContent" style="display: none; min-width: 300px;">
	     <?php echo $this->Form->create('Usuario', array(
	                                    		'url' => array(
	                                    		               'action'=>'login'
	                                    		               ),
												'inputDefaults' => array(
													'div' => 'form-group',
													'label' => false,
													'wrapInput' => false,
													'class' => 'form-control'
												),
										)); ?>
		  
		  <?php 
		  	echo $this->Form->input('email', array('label' => 'Correo electronico'));
			echo $this->Form->input('password', array('label' => 'Contraseña'));
		  	echo $this->Form->submit('Entrar', array('div' => 'form-group','class' => 'btn btn-default pull-right')); 
		  ?>
		<?php echo $this->Form->end(); ?>
	</div>  
	<style type="text/css">
	  	.popover{
		    width:350px;
		    height:200px;    
		}
	</style>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-51494851-1', 'qihouse.mx');
	  ga('send', 'pageview');
	  <?php echo $this->Seo->getABTestJS(); ?>
	  
	  $("#login_button").popover({
	  	placement : 'bottom',
        html : true, 
        content: function() {
          return $('#loginContent').html();
        }
    	});
	</script>
</body>
</html>
