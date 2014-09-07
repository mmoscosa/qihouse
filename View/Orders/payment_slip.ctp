<?php 
    echo $this->Html->css('openpay/pago.css');
    echo $this->Html->css('//cdn.jsdelivr.net/bootstrap/3.1.1/css/bootstrap.min.css');
    echo $this->Html->css('openpay/mmoscosa.css');
    echo $this->Html->script('//cdn.jsdelivr.net/jquery/2.1.0/jquery.min.js');
    echo $this->Html->script('midway.min');
    //pr($openpayDetails);
?>

<div class="page midway midway-horizontal container">
    <div class="logos row">
        <div class="Logo_empresa col-xs-6">
            <?php echo $this->Html->image('logo.png'); ?>
        </div>
        <div class="Logo_paynet col-xs-6">
            <div class="pull-right">
                <div>Servicio a pagar</div>
                <img src="/img/openpay/paynet_logo.png" alt="Logo Paynet">
            </div>
        </div>
    </div>
     <div class="Data payment row">
        <div class="col-xs-6">
            <?php echo $this->Html->image($openpayDetails->payment_method->barcode_url, array('id'=>'barcode')); ?>
            <span><?php echo $openpayDetails->payment_method->reference; ?></span>
            <small class="misc">En caso de que el escáner no sea capaz de leer el código de barras, escribir la referencia tal como se muestra.</small>
        
        </div>
        <div class="col-xs-6">
            <div class="payment_info">
                <h1>Total a pagar</h1>
                <p>
                    <?php echo $this->Number->currency($openpayDetails->serializableData['amount']); ?>
                    <small> MXN</small>
                    <span>+8 pesos por comisión</span>
                </p>
                
            </div>
        </div>
    </div>
    <div class="DT-margin"></div>
    <div class="Data row">
        <div class="col-xs-12">
            <h3>Detalles de la compra</h3>
        </div>
    </div>
    <div class="Table-Data row">
        <div class="col-xs-12">
            <table class="table table-bordered">
                <body>
                    <tr class="active">
                        <td>Descripción</td>
                        <td><?php echo $openpayDetails->serializableData['description']; ?></td>
                    </tr>
                    <tr class="active">
                        <td>Fecha y hora</td>
                        <td><?php echo $this->Time->format($openpayDetails->serializableData['operation_date'], '%B %e, %Y %H:%M %p'); ?></td>
                    </tr>
                </body>
            </table>    
        </div>
    </div>
    <div class="DT-margin row"></div>
     <div>
        <div class="col-xs-6">
            <h3>Como realizar el pago</h3>
            <ol>
                <li>Acude a cualquier tienda afiliada</li>
                <li>Entrega al cajero el código de barras y menciona que realizarás un pago de servicio Paynet</li>
                <li>Realizar el pago en efectivo por <?php echo $this->Number->currency($openpayDetails->serializableData['amount']); ?> MXN (más $8 pesos por comisión)</li>
                <li>Conserva el ticket para cualquier aclaración</li>
            </ol>
            <small>Si tienes dudas comunicate a Qi House al correo ventas@qihouse.mx</small>
        </div>
        <div class="col-xs-6">
            <h3>Instrucciones para el cajero</h3>
            <ol>
                <li>Ingresar al menú de Pago de Servicios</li>
                <li>Seleccionar Paynet</li>
                <li>Escanear el código de barras o ingresar el núm. de referencia</li>
                <li>Ingresa la cantidad total a pagar</li>
                <li>Cobrar al cliente el monto total más la comisión de $8 pesos</li>
                <li>Confirmar la transacción y entregar el ticket al cliente</li>
            </ol>
            <small>Para cualquier duda sobre como cobrar, por favor llamar al teléfono 01 800 300 08 08 en un horario de 8am a 9pm de lunes a domingo</small>
        </div>    
    </div>

    <div class="logos-tiendas">
        <div><img width="50" src="/img/openpay/7eleven.png" alt="7elven"></div>
        <div class="margen2"><img width="90" src="/img/openpay/farmacia_ahorro.png" alt="7elven"></div>
        <div class="mg3"><img width="150" src="/img/openpay/benavides.png" alt="7elven"></div>
        <div class="mg3"><small>¿Quieres pagar en otras tiendas? <br> visita: <a href="http://www.openpay.mx/tiendas" target="_blank">www.openpay.mx/tiendas</a></small></div>
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
