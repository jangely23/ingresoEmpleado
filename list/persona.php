<?php
$txt_busqueda = filter_input(INPUT_POST, "txt_busqueda", FILTER_SANITIZE_STRING);
?>

<fieldset >
    <legend>Personas</legend>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <input class="form-control" type="text" name="txt_busqueda" id="id_txt_busqueda" placeholder="digite aqui su busqueda" value="<?php echo $txt_busqueda; ?>"/>

            </div>
        </div>
        <div class="col">

            <button type="button" class="btn btn-secondary" onclick="abrirPagina('list/persona.list.php', 'contenido_persona', '&txt_busqueda=' + $('#id_txt_busqueda').val());">Buscar</button>
        </div>
    </div>
</fieldset>
<br/>
<div id="contenido_persona"><?php require "persona.list.php"; ?></div>

