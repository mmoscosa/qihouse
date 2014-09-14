<?php 
    echo $this->Html->css('control-panel.css');
    echo $this->Html->script('control-panel');
?>
<div class="row user-menu-container square">
        <div class="col-md-7 user-details">
            <div class="row coralbg">
                <div class="col-md-6 no-pad">
                    <div class="user-pad">
                        
                    </div>
                </div>
                <div class="col-md-6 no-pad">
                    <div class="user-image">
                        <img src="https://farm6.staticflickr.com/5497/10782839973_f26d1a88d9_c.jpg" class="img-responsive thumbnail">
                    </div>
                </div>
            </div>
            <div class="row overview">
                <div class="col-md-12">
                </div>
               <!--  <div class="col-md-4 user-pad text-center">
                    <h3>FOLLOWERS</h3>
                    <h4>2,784</h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>FOLLOWING</h3>
                    <h4>456</h4>
                </div>
                <div class="col-md-4 user-pad text-center">
                    <h3>APPRECIATIONS</h3>
                    <h4>4,901</h4>
                </div> -->
            </div>
        </div>
        <div class="col-md-1 user-menu-btns">
            <div class="btn-group-vertical square" id="responsive">
                <a href="#" class="btn btn-block btn-default active">
                  <i class="fa fa-bell-o fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-clock-o fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-book fa-3x"></i>
                </a>
                <a href="#" class="btn btn-default">
                  <i class="fa fa-envelope fa-3x"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4 user-menu user-pad">
            <div class="user-menu-content active">
                <h3>Nuevo en Qi House</h3>
                <div class="panel">
                    <div class="panel-body">
                      <p>Qi house te da la bienvenida a tu panel de usuario. Aqui podras: </p>
                      <dl>
                        <dt>Ver y Agregar</dt>
                          <dd>Direcciones de envio y de cobro</dd>
                        <dt>Historial de tus ordenes</dt>
                        <dt>Enterarte de las promociones exclusivas que Qi House tiene para ti</dt>
                        <dt>Un sistema de contacto preferencial solo para ti</dt>
                      </dl>
                      <p>Estamos trabajando para ofrecerte una mejor experiencia, no dudes en contactarnos con tus sugerencias y comentarios.</p>
                    </div>
                </div>
            </div>
            <div class="user-menu-content">
                <h3>Tus Compras Recientes</h3>
                <div class="panel">
                  <div class="panel-body">
                    <table class="table table-bordered table-hover">
                            <tbody>
                              <?php foreach ($usuario['Order'] as $key => $order): ?>
                                  <tr>
                                    <td><?php echo $this->Number->currency($order['total']); ?></td>
                                    <td><?php echo $this->Time->format($order['created'], '%B %e, %Y %H:%M '); ?></td>
                                    <td><?php echo $this->Html->link('ver', array('controller'=>'orders', 'action'=>'view', $order['id'])) ?></td>
                                  </tr>
                              <?php endforeach ?>
                            </tbody>
                        </table>
                  </div>
                </div>
            </div>
            <div class="user-menu-content">
                <h3>Tus Direcciones</h3>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="active"><a href="#all" role="tab" data-toggle="tab">Todas</a></li>
                  <li><a href="#shipping" role="tab" data-toggle="tab">De Envios</a></li>
                  <li><a href="#billing" role="tab" data-toggle="tab">De Cobro</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="all">
                        <table class="table table-bordered table-hover">
                            <tbody>
                              <?php foreach ($usuario['Address'] as $key => $address): ?>
                                    <tr>
                                    <td><?php echo substr($address['address_1'], 0, 40); ?></td>
                                  </tr>
                              <?php endforeach ?>
                            </tbody>
                        </table>
                  </div>
                  <div class="tab-pane" id="shipping">
                      <table class="table table-bordered table-hover">
                            <tbody>
                              <?php foreach ($usuario['Address'] as $key => $address): ?>
                                  <?php if($address['type'] == 1): ?>
                                  <tr>
                                    <td><?php echo substr($address['address_1'], 0, 40); ?></td>
                                  </tr>
                                    <?php endif; ?>
                              <?php endforeach ?>
                            </tbody>
                        </table>
                  </div>
                  <div class="tab-pane" id="billing">
                      <table class="table table-bordered table-hover">
                            <tbody>
                              <?php foreach ($usuario['Address'] as $key => $address): ?>
                                    <?php if($address['type'] == 2): ?>
                                  <tr>
                                    <td><?php echo substr($address['address_1'], 0, 40); ?></td>
                                  </tr>
                                    <?php endif; ?>
                              <?php endforeach ?>
                            </tbody>
                        </table>
                  </div>
                </div>
                <button class="btn btn-default pull-right" id="agregarDireccion">
                    <i class="fa fa-book"></i> Agregar
                </button>
            </div>
            <div class="user-menu-content">
                <h3>Contacto preferente</h3>
                <?php echo $this->Form->create('Contacto', array(
                                        'url' => array(
                                                       'controller' => 'Pages', 
                                                       'action' => 'contacto_vip'
                                                       ),
                        'inputDefaults' => array(
                                'div' => 'form-group',
                                'label' => false,
                                'wrapInput' => false,
                                'class' => 'form-control'
                                )
                    )); ?>
                  <?php echo $this->Form->input('mensaje', array('label' => 'Mensaje', 'type'=>'textarea')); ?>
                  <?php echo $this->Form->submit('Enviar', array('div' => 'form-group','class' => 'btn btn-default pull-right')); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>

    <div id="placeholder"></div>
