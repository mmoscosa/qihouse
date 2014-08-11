<?php 
    echo $this->Html->css('control-panel.css');
    echo $this->Html->script('control-panel');
?>
<div class="row user-menu-container square">
        <div class="col-md-7 user-details">
            <div class="row coralbg white">
                <div class="col-md-6 no-pad">
                    <div class="user-pad">
                        <h3>Hola <?php echo $usuario['Detalle']['nombre']; ?>,</h3>
                        <h4 class="white">
                            <i class="fa fa-check-circle-o"></i>
                            <?php //echo $usuario['Detalle']['city']; ?>, 
                            <?php //echo $usuario['Detalle']['state']; ?>
                        </h4>
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
                    <h4>Perfil completo</h4>
                    <div class=" user-pad text-center">
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                    </div>
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
                  <i class="fa fa-credit-card fa-3x"></i>
                </a>
            </div>
        </div>
        <div class="col-md-4 user-menu user-pad">
            <div class="user-menu-content active">
                <h3>Nuevo en Qi House</h3>
            </div>
            <div class="user-menu-content">
                <h3>Tus Compras Recientes</h3>
            </div>
            <div class="user-menu-content">
                <h3>Tus Direcciones</h3>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li class="active"><a href="#all" role="tab" data-toggle="tab">Todas</a></li>
                  <li><a href="#shipping" role="tab" data-toggle="tab">De Envios</a></li>
                  <li><a href="#billing" role="tab" data-toggle="tab">De Tarjetas</a></li>
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
                                  <?php if($address['type'] != 1): ?>
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
                                    <?php if($address['type'] == 1): ?>
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
                <h3>Tus Metodos de Pago</h3>
                <button class="btn btn-default pull-right" id="agregarCard">
                    <i class="fa fa-credit-card"></i> Agregar
                </button>
            </div>
        </div>
    </div>

    <div id="placeholder">
        <?php if ($loggedUser['Usuario']['tipo'] == 1): ?>
          <div class="col-md-6 col-md-offset-3">
            <p>Estimado <?php echo $loggedUser['Detalle']['nombre'].' '.$loggedUser['Detalle']['apellido']; ?></p>
            <p>Estamos trabajando en el sistema de compras en línea para nuestros clientes corporativos. Por el momento pueden hacer sus pedidos enviándonos un correo electrónico con la lista de productos que deseen, nosotros le enviaremos la factura y hacemos la entrega después de haber recibido el pago correspondiente.</p>
          </div>
        <?php endif; ?>
    </div>

