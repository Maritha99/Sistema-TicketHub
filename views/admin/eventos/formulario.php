<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/>
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.css" rel="stylesheet"/>


<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Evento</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre Evento</label>
        <input
            type="text"
            class="formulario__input"
            id="nombre"
            name="nombre"
            placeholder="Nombre Evento"
            value="<?php echo $evento->nombre; ?>"
        >
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <textarea
            class="formulario__input"
            id="descripcion"
            name="descripcion"
            placeholder="Descripción Evento"
            rows="8"
        ><?php echo $evento->descripcion; ?></textarea>
    </div>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoría o Tipo de Evento</label>
        <select
            class="formulario__select"
            id="categoria"
            name="categoria_id"
        >
            <option value="">- Seleccionar -</option>
            <?php foreach($categorias as $categoria) { ?>  <!---LLama a todas las categorias de la bdd-->
                <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected' : '' ?> value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
            <?php } ?>
        </select>
    </div>    

    <div class="formulario__campo">  
        <label for="fechahora" class="formulario__label">Fecha</label>
        <div class="input-group date" id="datetime" >
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>  <!--Por mientas--->
            </span>
            <input
                type="text"
                class="formulario__input"
                name="fechahora"
                placeholder="Ingresar Fecha"
                value="<?php echo $evento->fechahora; ?>"
            >
        </div>
    </div>


    <div class="formulario__campo">
        <label for="hora" class="formulario__label">Hora</label>
        <div class="input-group clockpicker"  data-twelvehour="true" data-autoclose="false" data-donetext="Guardar">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
            </span>
            <input type="text"
                class="formulario__input"
                id="hora"
                name="hora"
                placeholder="Ingresar la hora"
                value="<?php echo $evento->hora; ?>"
            
            >
        </div>
    </div>


</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información Extra</legend>

    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente</label>
        <input
            type="text"
            class="formulario__input"
            id="ponentes"
            placeholder="Buscar Ponente"
        >
        <ul id="listado-ponentes" class="listado-ponentes"></ul>

        <input type="hidden" name="ponente_id" value="<?php echo $evento->ponente_id; ?>">
    </div>

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Lugares Disponibles</label>
        <input
            type="number"
            min="1"
            class="formulario__input"
            id="disponibles"
            name="disponibles"
            placeholder="Ej. 20"
            value="<?php echo $evento->disponibles; ?>"
        >
    </div>

</fieldset>

<!-- jQuery and Bootstrap scripts -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1r"></script>
<script type="text/javascript"src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script type="text/javascript" src="https://weareoutman.github.io/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>--->




<script type="text/javascript">
$('.clockpicker').clockpicker()
    .find('input').change(function(){
        console.log(this.value);
    });

if (something) {
    // Manual operations (after clockpicker is initialized).
    $('#demo-input').clockpicker('show') // Or hide, remove ...
            .clockpicker('toggleView', 'minutes');
}
</script> <!--hasta aqui es el reloj--->
<!--Comienza el calendario--->
<script type="text/javascript">
    $(function () {
             $('#datetime').datepicker({
                format: 'yyyy-mm-dd',
                orientation: 'auto left',
                forceParse: 'false',
                autoclose: 'true',
                todayHighlight: 'true',
                toggleActive: 'true',
                startDate: '-3d'

            });
    });
</script> <!--hasta aqui es el calendario--->
