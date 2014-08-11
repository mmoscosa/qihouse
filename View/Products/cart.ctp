<?php 
    echo $this->Html->css('cart.css');
?>
<div id="cart">
<div class="col-sm-12 col-md-10 col-md-offset-1">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th class="text-center">Precio/gr</th>
                <th class="text-center">Total</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($products)): ?>
            <?php foreach ($products as $key => $product): ?>
                <?php if(!is_array($product)){continue;} ?>
                <tr class="products">
                    <td class="col-md-5">
                    <div class="media">
                        <a class="thumbnail pull-left" href="#"> 
                            <?php echo $this->Html->image('/files/product/photo/'.$product['Product']['id'].'/mini_'.$product['Product']['photo'], array('class'=>'media-object')); ?>
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#"><?php echo $product['Product']['name']; ?></a></h4>
                            <h5 class="media-heading"> Categoria <a href="/bazar/<?php echo $product['Subcategory']['subcategory'] ?>"><?php echo $product['Category']['category'] ?>, <?php echo $product['Subcategory']['subcategory'] ?></a></h5>
                        </div>
                    </div></td>
                    <td class="col-md-2" style="text-align: center">
                        <?php 
                                echo $this->Form->input('cantidad', array(
                                            'options' => array($cantidadesArray),
                                            'selected' => $product['Cantidad'],
                                            'label'=>'',
                                            'class' => 'form-control',
                                            'disabled' => 'true',
                                            'id'=>'quantity',
                                            'empty' => 'Favor de elegir'
                                )); 

                                echo $this->Html->link('Modificar', array('action'=>'modifyProduct', $product['Product']['id']), array('data-toggle'=>"modal", 'data-target'=>"#myModal"));
                        ?>

                    </td>
                    <td class="col-md-2 text-center"><strong><?php echo $this->Number->currency($product['Product']['price'], 'USD'); ?></strong></td>
                    <td class="col-md-2 text-center"><strong><?php $subTotal = $product['Product']['price'] * $product['Cantidad']; echo $this->Number->currency($subTotal, 'USD');?></strong></td>
                    <td class="col-md-1">
                    <?php 
                        echo $this->Html->link(
                                                    '<span class="glyphicon glyphicon-remove"></span> Quitar',
                                                    array(
                                                            'action' => 'removeFromCart',
                                                            $product['Product']['id'],
                                                          ),
                                                    array(
                                                            'class'=> 'btn btn-default btn-sm',
                                                            'escape' => false
                                                          )
                                                 );
                    ?>
                    </td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5>Subtotal</h5></td>
                    <td class="text-right"><h5><strong><?php echo $this->Number->currency($products['Subtotal'], 'USD'); ?></strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h5 class="envios" data-toggle="modal" data-target="#enviosInfo">Costo estimado de envio <i class="fa fa-question-circle"></i></h5> </td>
                    <td class="text-right"><h5><strong><?php echo $this->Number->currency($products['Shipping'], 'USD'); ?></strong></h5></td>
                </tr>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td><h3>Total</h3></td>
                    <td class="text-right"><h3><strong><?php $total = $products['Subtotal'] + $products['Shipping']; echo $this->Number->currency($total, 'USD');?></strong></h3></td>
                </tr>
        <?php endif; ?>
                <tr>
                    <td>   </td>
                    <td>   </td>
                    <td>   </td>
                    <td>
                    <button type="button" class="btn btn-default" id="continue-shopping">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Continuar Comprando
                    </button></td>
                    <td>
                    <?php if(!empty($products)): ?>
                        <a href="/checkout" type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </a></td>
                    <?php endif; ?>
                </tr>
        </tbody>
    </table>
    <?php if(!empty($products)): ?>
        <div id="emptyCart">
            <?php 
                echo $this->Html->link(
                                        '<i class="fa fa-shopping-cart"></i> Vaciar Carrito de Compras',
                                        array(
                                                'action' => 'emptyCart'
                                              ),
                                        array(
                                                'class'=> 'btn btn-danger btn-sm',
                                                'id' => 'emptyCart',
                                                'escape' => false
                                              )
                                       );
            ?>
        </div>
    <?php endif; ?>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="enviosInfo" tabindex="-1" role="dialog" aria-labelledby="enviosInfoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="enviosInfoLabel">Envios - info.</h4>
      </div>
      <div class="modal-body">
        <ol>
          <li>Por el momento hemos establecido pedidos mínimos de $600.00 MXN, lo cual incluye el envío sin costo dentro de la Republica Mexicana, con tiempo estimado de entrega entre 3 y 4 días.</li>
          <li>Para ordenes fuera de México, el pedido mínimo sería de $1,000.00 MXN. Con tiempo estimado de entrega de 8-10 días en caso de que requiera la entrega en menos días, le podemos ofrecer el envío exprés con costo extra, dependiendo de el lugar de entrega.</li>
          <li>Para rastrear su orden, se les proporcionará el numero de guía en cuanto su paquete haya sido enviado.</li>
          <li>En caso de que exista alguna duda, siempre puede escribirnos para consultar sobre su orden.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Regresar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $('#continue-shopping').click(function(){
        window.location.href = '/bazar'
        return false;
    });
    //$( "tr.products:last" ).animate({backgroundColor: '#47a447'}).delay('50').animate({backgroundColor: '#fff'});
    
</script>
