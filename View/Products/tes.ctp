<?php 
    echo $this->Html->css('galeria-te/component');
    echo $this->Html->css('galeria-te');
    
    echo $this->Html->script('galeria-te/modernizr.custom');
    echo $this->Html->script('galeria-te/classie');
    echo $this->Html->script('galeria-te/helper');
    echo $this->Html->script('galeria-te/grid3d');
    echo $this->Html->script('galeria-te/mmoscosa-galeria');
    echo $this->Html->script('galeria-te/mmoscosa-bazar');    
 ?>

<div class="well parallax">
    <div id="quote">
        <p>Se bebe té para olvidar el ruido del mundo</p>
        <span>T'ien Yiheng</span>
    </div>
</div>
<section class="grid3d vertical" id="grid3d">
    <div class="grid-wrap">
        <div class="btn-group">
          <a href="/bazar/"
             class="btn btn-default 
             <?php $active = (strpos($title_for_layout,'-')) ? null : 'active' ; echo $active;?>"
            >
                Todos
            </a>
          <a href="/bazar/blanco"
             class="btn btn-default 
             <?php $active = (strpos($title_for_layout,'blanco')) ? 'active' : null ; echo $active;?>"
            >
                Blanco
            </a>
          <!-- <a href="/bazar/amarillo"
             class="btn btn-default 
             <?php $active = (strpos($title_for_layout,'amarillo')) ? 'active' : null ; echo $active;?>"
             disabled = true
            >
                Amarillo
            </a> -->
          <a href="/bazar/verde"
             class="btn btn-default 
             <?php $active = (strpos($title_for_layout,'verde')) ? 'active' : null ; echo $active;?>"
            >
                Verde
            </a>
          <a href="/bazar/oolong"
             class="btn btn-default 
             <?php $active = (strpos($title_for_layout,'oolong')) ? 'active' : null ; echo $active;?>"
            >
                Oolong
            </a>
          <a href="/bazar/rojo"
             class="btn btn-default 
             <?php $active = (strpos($title_for_layout,'rojo')) ? 'active' : null ; echo $active;?>"
            >
                Rojo
            </a>
          <a href="/bazar/tizana"
             class="btn btn-default 
             <?php $active = (strpos($title_for_layout,'tizana')) ? 'active' : null ; echo $active;?>"
            >
                Tizana
            </a>
          <a href="/bazar/puerh"
             class="btn btn-default 
             <?php $active = (strpos($title_for_layout,'puerh')) ? 'active' : null ; echo $active;?>"
            >
                Pu erh
            </a>
        </div>
        <div class="sets-y-mas">
          <!-- <button class="btn btn-default">Sets</button> -->
        </div>
        <div class="pull-right">
          <button class="btn btn-default" data-toggle="modal" data-target="#comofunciona">Como Funciona <i class="fa fa-question-circle"></i></button>
        </div>
        <div class="grid">
            <?php foreach ($tes as $key => $te): ?>
                <figure class="figure" title="<?php echo $te['Product']['name']; ?>" id="<?php echo $te['Product']['id']; ?>">
                    <?php echo $this->Html->image('/files/product/photo/'.$te['Product']['id'].'/thumb_'.$te['Product']['photo']); ?>
                    <h4>
                        <?php echo $te['Product']['name']; ?>
                    </h4>
                </figure>
            <?php endforeach; ?>
        </div>
    </div><!-- /grid-wrap -->
    <div class="content">
        <?php foreach ($tes as $te): ?>
            <div id="<?php echo $te['Product']['id'] ?>">
                <!-- <div class="shop-actions" id="<?php echo $te['Product']['id'] ?>">
                         <div class="list-group">
                            <span href="#" class="list-group-item active comprar-menu-button">
                                <?php echo __('<i class="fa fa-shopping-cart"></i>'); ?>
                            </span>
                        </div>
                        <div class="cartplaceholder"></div>
                </div> -->
                <h1 class="midwayHorizontal midway">
                    <?php echo $te['Product']['name']; ?>
                    <span><?php echo $te['Product']['original_name']; ?></span>
                </h1>
                <div class="dummy-img">
                    <?php echo $this->Html->image('/files/product/photo/'.$te['Product']['id'].'/xVga_'.$te['Product']['photo']); ?>
                </div>
                <div class="dummy-text">
                    <?php echo $this->Form->create('Product', array('action'=>'addToCart', 'inputDefaults' => array(
                                                    'div' => 'form-group',
                                                    'label' => false,
                                                    'wrapInput' => false,
                                                    'class' => 'form-control'))); ?>
                        <?php echo $this->Form->input('id', array('value'=>$te['Product']['id'], 'hidden'=>true)); ?>
                        <?php echo $this->Form->input('cantidad', array(
                                            'options' => array($cantidadesArray),
                                            'empty' => 'Comprar: Favor de elegir cantidad',
                                            'required' => true
                                )); 
                        ?>
                        <?php echo $this->Form->submit('Agregar a carrito', array('class'=>'btn btn-default pull-right', 'escape'=>false)); ?>
                    <?php echo $this->Form->end(); ?>
                    </br>
                    <hr/>
                    <strong>Información</strong>
                    </br>
                    <?php echo $this->Markdown->transform($te['Product']['description']); ?>
                    <hr/>
                    <?php echo $this->Form->create('Product', array('action'=>'addToCart', 'inputDefaults' => array(
                                                    'div' => 'form-group',
                                                    'label' => false,
                                                    'wrapInput' => false,
                                                    'class' => 'form-control'))); ?>
                        <?php echo $this->Form->input('id', array('value'=>$te['Product']['id'], 'hidden'=>true)); ?>
                        <?php echo $this->Form->input('cantidad', array(
                                            'options' => array($cantidadesArray),
                                            'empty' => 'Comprar: Favor de elegir cantidad',
                                            'required' => true
                                )); 
                        ?>
                        <?php echo $this->Form->submit('Agregar a carrito', array('class'=>'btn btn-default pull-right', 'escape'=>false)); ?>
                    <?php echo $this->Form->end(); ?>

                    <?php if (!empty($loggedUser)): ?>
                        <iframe width="100%"  frameborder="0" height="350px" id="iframe" src="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/products/comments/'.$te['Product']['id']; ?>"></iframe>
                    <?php endif ?>
                </div>

            </div>
        <?php endforeach; ?>
        <span class="loading"></span>
        <span class="icon close-content"><i class="fa fa-times"></i></span>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="comofunciona" tabindex="-1" role="dialog" aria-labelledby="comofuncionaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="comofuncionaLabel">Como Funciona</h4>
      </div>
      <div class="modal-body">
        <ol>
          <li>Tan pronto termine de hacer su selección y efectúe su pago, nosotros recibimos su orden. Nos toma un día hábil para procesar y enviar su pedido. De esta manera, la mayoría de las veces usted podrá disfrutar su té en 3 o 4 días hábiles.</li>
          <li>Usualmente tratamos de incluir bonitos regalos en su paquete, como muestras de té o utensilios para servirlo, así que no se asuste si encuentra algo que no ordenó.</li>
          <li>Usted recibirá una confirmación de su orden vía correo electrónico con numero de guía para que pueda rastrear su pedido.</li>
          <li>En caso de que no se encuentre completamente satisfecho con su pedido, lo cual seria muy raro, por favor, asegúrese de contactarnos a clientes@qihouse.mx y nosotros le responderemos inmediatamente.</li>
        </ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Regresar</button>
      </div>
    </div>
  </div>
</div>
<script>
    $('.figure').click(function(){
        setTimeout(function() {
            var id, actions, view, subcategories, pathname, url, inSubCategory, uniqueUrl;
            
            pathname = window.location.pathname;
            url = pathname.split("/");
            view = $('.show').eq(1);
            id = $('.show').eq(1).attr('id');
            
            subcategories = <?php echo $subcategories; ?>;
            
            inSubCategory = findSubcateory(subcategories, url);
            
            if(inSubCategory != false){
              uniqueUrl = '/bazar/'+inSubCategory+'/unique/'+id
            }else{
              uniqueUrl = '/bazar/unique/'+id
            }

            actions = view.children('.shop-actions').children('.cartplaceholder');
            actions.load('/products/addToCart/'+id+' #content', function(){
                $.getScript( "/js/cart.js" );
            });
            var stateObj = { foo: id };
            history.pushState(stateObj, "Qi House: Bazar", uniqueUrl);
        }, 1500);
    });

    new grid3D( document.getElementById( 'grid3d' ) );
</script>

<?php if (!empty($loggedUser)): ?>
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?2XZfvzMBUn6axgwpnvtCfq3bdUELfgmb';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->


<script type="text/javascript">
   $zopim(function() {
    $zopim.livechat.setName('<?php echo $loggedUser["Detalle"]["nombre"]." ".$loggedUser["Detalle"]["apellido"]; ?>');
    $zopim.livechat.setEmail('<?php echo $loggedUser["Usuario"]["email"]; ?>');
  });
</script>


<?php endif; ?>
