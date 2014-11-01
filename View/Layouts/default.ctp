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
	<!-- start Mixpanel --><script type="text/javascript">(function(f,b){if(!b.__SV){var a,e,i,g;window.mixpanel=b;b._i=[];b.init=function(a,e,d){function f(b,h){var a=h.split(".");2==a.length&&(b=b[a[0]],h=a[1]);b[h]=function(){b.push([h].concat(Array.prototype.slice.call(arguments,0)))}}var c=b;"undefined"!==typeof d?c=b[d]=[]:d="mixpanel";c.people=c.people||[];c.toString=function(b){var a="mixpanel";"mixpanel"!==d&&(a+="."+d);b||(a+=" (stub)");return a};c.people.toString=function(){return c.toString(1)+".people (stub)"};i="disable track track_pageview track_links track_forms register register_once alias unregister identify name_tag set_config people.set people.set_once people.increment people.append people.track_charge people.clear_charges people.delete_user".split(" ");
for(g=0;g<i.length;g++)f(c,i[g]);b._i.push([a,e,d])};b.__SV=1.2;a=f.createElement("script");a.type="text/javascript";a.async=!0;a.src="//cdn.mxpnl.com/libs/mixpanel-2.2.min.js";e=f.getElementsByTagName("script")[0];e.parentNode.insertBefore(a,e)}})(document,window.mixpanel||[]);
mixpanel.init("45d763bd809097ff89bd36f5d9f181aa");</script><!-- end Mixpanel -->
<script type="text/javascript">
	var _gaq = _gaq || [];

	  _gaq.push(['_setAccount', 'UA-56299839-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
  	</script>
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
							            		Membres&Iacute;a
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
					            <li class="tooltip-social" data-toggle="tooltip" data-placement="bottom" title="Supported by Mixpanel">
					            	<a href="https://mixpanel.com/f/partner"><img src="//cdn.mxpnl.com/site_media/images/partner/badge_light.png" alt="Mobile Analytics" /></a>
					            </li>
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
		     						<li><a href="/bazar/puerh"><i id="puerh" class="fa fa-leaf"></i> Pu erh</a></li>
		     						<li><a href="/bazar/tizana"><i class="fa fa-leaf"></i> Tizana</a></li>
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
						<?php echo $this->Form->input('email', array('type' => 'email', 'label'=>'', 'placeholder'=>'Correo electrónico')); ?>
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
