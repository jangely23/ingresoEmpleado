<?php

require '../conexion/conexion.php';
require '../class/registroDAO.class.php';
require '../class/registroDTO.class.php';
require '../class/personaDAO.class.php';
require '../class/personaDTO.class.php';

$id_registro = filter_input(INPUT_POST,'id_registro',FILTER_SANITIZE_NUMBER_INT)??0;

$registroDTO = new registroDTO();
$registroDTO->cargarPorId($id_registro, $conexion);

$personaDAO = new personaDAO($conexion);
$persona = $personaDAO->getAll($txt_busqueda ='');

?>

<div class="row">
    <div class="col">
        <form method="POST" action="process/registro.process.php"
              onsubmit="return enviarFormulario($this,'',`abrirPagina('list/registro.php','contenido','&txt_busqueda='+$('#id_txt_persona').val())`);">
            <div class="input-group mb-3">
                <label class="input-group-text" for="id_txt_persona">Options</label>
                <select class="form-select" id="id_txt_persona"required="yes">
                    <option selected>seleccione...</option>
                    <?php
                    while ($obj = $personas->fetch_object()) {
                    $personaDTO->map($obj);
                    ?>
                        <option value = '<?php echo $personaDTO->getId_persona(); ?>'><?php echo $personaDTO->getNombre(); ?></option>
                    <?php
                    }
                    ?>             
                </select>
            </div>
        </form>
    </div>
    
</div>
