<?php
$txt_busqueda = filter_input(INPUT_POST,'txt_busqueda',FILTER_SANITIZE_STRING);
?>

<fieldset >
    <legend>Registros</legend>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <input class="form-control" type="text" name="txt_busqueda" id="id_txt_busqueda" placeholder="digite aqui su busqueda" value="<?php echo $txt_busqueda; ?>"/>
            </div>
        </div>
        <div class="col">
            <button type="button" class="btn btn-secondary" onclick="abrirPagina('list/registro.list.php', 'contenido_registro', '&txt_busqueda=' + $('#id_txt_busqueda').val());">Buscar</button>
        </div>
    </div>
</fieldset>
<br/>
<div id="contenido_registro"><?php require "./registro.list.php";?></div>