<?php 
	echo $this->Html->css('contacto'); 
	echo $this->Html->script('galeria-te/mmoscosa-galeria');
	echo $this->Html->script('contacto');
?>
<div id="contacto">
	<div class="row" id="top">
		<div class="col-md-6" id="vibora">
			<?php echo $this->Html->image('contacto/bolitas.png');; ?>
		</div>
		<div class="col-md-6">
			<?php echo $this->Form->create('Contacto', array(
			                               		'url' => array(
			                               		               'controller' => 'Pages', 
			                               		               'action' => 'contacto'
			                               		               ),
												'inputDefaults' => array(
																'div' => 'form-group',
																'label' => false,
																'wrapInput' => false,
																'class' => 'form-control'
																)
										)); ?>
				<?php echo $this->Form->input('nombre', array('label' => 'Nombre', 'placeholder'=>'Nombre Completo')); ?>
				<?php echo $this->Form->input('email', array('label' => 'Email', 'placeholder'=>'Dirección de correo electronico', 'type'=>'email')); ?>
				<?php echo $this->Form->input('mensaje', array('label' => 'Mensaje', 'type'=>'textarea')); ?>
				<?php echo $this->Form->submit('Enviar', array('div' => 'form-group','class' => 'btn btn-default pull-right')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
	<div class="well parallax">
	<div id="quote">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119452.68596594383!2d-103.33541314999995!3d20.673791949999966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b18cb52fd39b%3A0xd63d9302bf865750!2sGuadalajara%2C+JAL!5e0!3m2!1sen!2s!4v1400887896797" width="600" height="300" frameborder="0" style="border:0" id="mapa"></iframe>
	</div>
</div>
	<div class="row" id="bottom">
		<div class="col-md-12">
			<h1 class="midway midway-horizontal">No dudes en contactarnos</h1>
			<?php echo $this->Html->image('contacto/te.png', array('class'=>'midway midway-horizontal')); ?>
		</div>
	</div>
</div>
