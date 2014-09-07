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
            
        </div>
    </div>
     <div class="Data payment row">
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
        <div class="col-xs-6">
            <a href="http://www.openpay.mx/bancos.html" target="_blank" class="midway-horizontal">
                <img src="/img/openpay/spei.gif">
            </a>
        </div>
    </div>
    <div class="DT-margin"></div>
    <div class="Data row">
        <div class="col-xs-12">
            <h3>Datos para transferencia electrónica</h3>
        </div>
    </div>
    <div class="Table-Data row">
        <div class="col-xs-12">
            <table class="table table-bordered">
                <body>
                    <tr class="active">
                        <td>Nombre del banco:</td>
                        <td><?php echo "SIST TRANSF Y PAGOS (".$openpayDetails->serializableData['payment_method']->bank.")"; ?></td>
                    </tr>
                    <tr class="active">
                        <td>CLABE:</td>
                        <td><?php echo $openpayDetails->serializableData['payment_method']->clabe; ?></td>
                    </tr>
                    <tr class="active">
                        <td>Referencia numérica:</td>
                        <td><?php echo $openpayDetails->serializableData['payment_method']->name; ?></td>
                    </tr>
                    <tr class="active">
                        <td>Concepto de pago:</td>
                        <td><?php echo $openpayDetails->serializableData['payment_method']->name; ?></td>
                    </tr>
                </body>
            </table>    
        </div>
    </div>
    <div class="DT-margin row"></div>
     <div>
        <div class="col-xs-12">
            <p>Si tienes dudas comunicate a <strong>Qi House</strong> al correo <strong>ventas@qihouse.mx</strong>. Tambien puedes llamar al teléfono <strong>01 800 681 8161</strong> en un horario de 8am a 9pm de lunes a domingo</p>
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
