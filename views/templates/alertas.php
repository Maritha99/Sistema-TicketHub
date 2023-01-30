<?php          
    foreach($alertas as $key => $alerta) {  //Muestra todas las alertas ..<
        foreach($alerta as $mensaje) {
?>
    <div class="alerta alerta__<?php echo $key; ?>"><?php echo $mensaje; ?></div>   
<?php 
        }
    }
?>
