<?php 
    echo $this->Html->css('openpay/pago.css');
    echo $this->Html->css('//cdn.jsdelivr.net/bootstrap/3.1.1/css/bootstrap.min.css');
    echo $this->Html->css('openpay/mmoscosa.css');
    echo $this->Html->script('//cdn.jsdelivr.net/jquery/2.1.0/jquery.min.js');
    echo $this->Html->script('midway.min');
    //pr($openpayDetails);
?>
<div class="container">
    <div class="products card">
        <div class="page midway-horizontal">
            <div class="header row">
                <div class="logo col-xs-6">
                    <?php echo $this->Html->image('logo.png'); ?>
                </div>
            </div>
            <div class="info row">
                <div class="col-xs-6 invoice-recipient">
                    <?php foreach ($order['Address'] as $key => $address):?>
                        <?php if($address['type'] == 2){continue;} ?>
                        <dl>
                            <dt><?php echo $address['recipient']; ?></dt>
                            <dd><?php echo $address['address_1'].' '.$address['address_2']; ?></dd>
                            <dd><?php echo $address['city'].' '.$address['state']; ?></dd>
                            <dd><?php echo $address['postal_code'].' '.$address['country_code']; ?></dd>
                        </dl>
                    <?php endforeach; ?>
                </div>
                <div class="col-xs-6">
                    <h2 class="pull-right">Total: <?php echo $this->Number->currency($order['Order']['total']); ?></h2>
                </div>
            </div>
            <div class="details row">
                <table class="table">
                    <thead>
                        <tr class="active">
                            <td class="col-xs-6">Producto</td>
                            <td class="col-xs-3">Cantidad</td>
                            <td class="col-xs-3">Subtotal</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order['Product'] as $key => $product): ?>
                            <tr>
                                <td>
                                    <?php echo $product['name']; ?>
                                    <small>(<?php echo $product['original_name']; ?>)</small>
                                </td>
                                <td><?php echo $this->Number->format($product['OrdersProduct']['quantity'], array('places' => 0, 'before' => '',))." gr"; ?></td>
                                <td><?php echo $this->Number->currency($product['OrdersProduct']['subtotal']); ?></td>
                            </tr>
                        <?php endforeach ?>
                        <td colspan="2"><strong class="pull-right">Envio:</strong></td>
                        <td>
                            <?php if($order['Order']['total'] > 600): ?>
                                <strong>$0.00</strong>
                            <?php else: ?>
                                <strong>$40.00</strong>
                            <?php endif; ?>
                        </td>
                    </tbody>
                </table>
                <p>Una vez realizado el pago, <strong>Qi House</strong> se comunicara contigo dentro de las 24 horas siguientes al pago. De no obtener respuesta, favor comunicate al correo ventas@qihouse.mx.</p>   
            </div>
    </div>
</div>
<div class="actions">
    <ul>
        <li><button href="#" onclick="printForm()" class="btn btn-info">Imprimir</button></li>
        <li><button href="#" onclick="continueQiHouse()" class="btn btn-primary">Continuar a Qi House</button></li>
    </ul>
</div>

<script>
function printForm() {
    window.print();
}
function continueQiHouse() {
    window.location.href = "/membresia";
}
</script>
