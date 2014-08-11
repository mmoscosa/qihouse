<div id="content">	
	<div class="list-group carrito">
	    <span href="#" class="list-group-item comprar-menu">
	        <h3>Agregar al carrito </h3>
	        <?php echo $this->Form->create('Product', array(
	                                       'default' => false, 'inputDefaults' => array(
					                           'div' => 'form-group',
					                           'label' => false,
					                           'wrapInput' => false,
					                           'class' => 'form-control')
				                           )
	        							); 
	        ?>
	        <div class="row">
	            <div class="col-md-12">
	                <?php 
	                    echo $this->Form->input('cantidad', array(
	                                                            'options' => array(
	                                                                                50 => "50gr",
	                                                                                100 => "100gr",
	                                                                                150 => "150gr",
	                                                                                200 => "200gr",
	                                                                                250 => "250gr",
	                                                                                500 => "500gr",
	                                                                                1000 => "1kg",
	                                                                                'mayoreo' => "mayoreo",
	                                                                               ),
	                                                            'empty' => '(Seleccionar)',
	                                                            'class' => 'form-control cantidad-te'
	                                                        ));
	                ?>
	            </div>
	            <div class="col-md-12 mayoreo">
	                <div class="input-group">
	                  <?php echo $this->Form->input('mayoreo', array('label' => '', 'disabled' => true,'placeholder'=>'En construccion' ,'type'=>'number', 'class'=>array('form-control', 'mayoreo-input'))); ?>
	                  <span class="input-group-addon">KG</span>
	                </div>
	            </div>
	            <div class="col-md-12 subtotal">
	                <div id="<?php echo $product['Product']['price']; ?>"><span>$0.00 MXN</span> </div>
	            </div>
	            <div class="col-md-12" id="<?php echo $product['Product']['id']; ?>">
	                </br>
	                <?php   echo $this->Form->submit('Agregar', array('div' => 'form-group','class' => 'btn btn-info col-md-12', 'id'=>$product['Product']['id'])); ?>
	            </div>
	        </div>
	        <?php echo $this->Form->end(); ?>
	        <hr />
	        
	        <h4>Ademas en tu carrito</h4>
	        
	        <div class="ademas-carrito">
	        	
	        </div>
	    </span>
	</div>   
</div>
