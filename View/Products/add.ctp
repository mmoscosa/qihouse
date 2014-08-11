<?php 
    echo $this->Html->css('galeria-te/add');
    echo $this->Html->script('galeria-te/add');
 ?>
<div class="products form">
<?php echo $this->Form->create('Product', array('type' => 'file', 'inputDefaults' => array(
													'div' => 'form-group',
													'label' => false,
													'wrapInput' => false,
													'class' => 'form-control'))); ?>
	<fieldset class="col-md-8">
		<legend><?php echo __('Agregar Producto'); ?></legend>
	<?php
		echo $this->Form->input('name', array('label' => 'Nombre', 'placeholder'=>'Nombre del producto'));
		echo $this->Form->input('original_name', array('label' => 'Nombre original', 'placeholder'=>'Nombre en ingles o chino'));
	?>

	<!-- image-preview-filename input [CUT FROM HERE]-->
    <div class="input-group image-preview">
        <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
        <span class="input-group-btn">
            <!-- image-preview-clear button -->
            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                <span class="glyphicon glyphicon-remove"></span> Clear
            </button>
            <!-- image-preview-input -->
            <div class="btn btn-default image-preview-input">
                <span class="glyphicon glyphicon-folder-open"></span>
                <span class="image-preview-input-title">Browse</span>
                <input type="file" accept="image/png, image/jpeg, image/gif" name="data[Product][photo]"/> <!-- rename it -->
            </div>
        </span>
    </div><!-- /input-group image-preview [TO HERE]--> 
	
	<?php
		echo $this->Form->input('description', array('label' => 'Descripcion', 'placeholder'=>'Formato Markdown'));
	?>
	<small class="pull-right">Description parsed with <a href="http://daringfireball.net/projects/markdown/syntax" target="_blank">Markdown</a></small>
	<?php
		echo $this->Form->input('category_id', array('label' => 'Categories'));
		echo $this->Form->input('subcategory_id', array('label' => 'Sub categoria'));
		echo $this->Form->input('price', array('label' => 'Precio a publico', 'placeholder'=>'200.00'));
		echo $this->Form->input('stock', array('label' => 'Inventario (gr)', 'placeholder'=>'300'));
		echo $this->Form->submit('Agregar', array('div' => 'form-group','class' => 'btn btn-info pull-right'));
	?>

	</fieldset>

	
<?php echo $this->Form->end(); ?>
</div>
<div class="actions col-md-4">
<div class="list-group">
    <span href="#" class="list-group-item active">
        <?php echo __('Actions'); ?>
    </span>
    <?php echo $this->Html->link('<i class="fa fa-list"></i> Ver Productos', array('action' => 'index'), array('escape' => false, 'class'=>'list-group-item')); ?>
    <?php echo $this->Html->link('<i class="fa fa-suitcase"></i> Ver Pedidos', array('controller' => 'orders', 'action' => 'index'), array('escape' => false, 'class'=>'list-group-item')); ?>
</div>        
</div>
