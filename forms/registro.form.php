<?php

require '../conexion/conexion.php';
require '../class/registroDAO.class.php';
require '../class/registroDTO.class.php';
require '../class/personaDAO.class.php';
require '../class/personaDTO.class.php';

$id_registro = filter_input(INPUT_POST,'id_registro',FILTER_SANITIZE_NUMBER_INT)??0;

$registroDTO = new registroDTO();
$registroDTO->cargarPorId($id_registro, $conexion);

$personaDTO = new personaDTO();
$personaDAO = new personaDAO($conexion);
$personas = $personaDAO->getAll($txt_busqueda ='');

?>

<div class="row">
    <div class="col">
        <form method="POST" action="process/registro.process.php"
              onsubmit="return enviarFormulario($this,'',`abrirPagina('list/registro.php','contenido','&txt_busqueda='+$('#id_txt_persona').val())`);">
            <div class="input-group mb-3">
                <label class="input-group-text" for="id_txt_persona">Persona</label>
                <select class="form-select" name="id_persona" id="id_txt_persona" required="yes">
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
            <div class="input-group mb-3">
                <label class="input-group-text" for="id_txt_registro">Options</label>
                <select class="form-select" name="tipo_registro" id="id_txt_registro" required="yes">
                    <option selected>seleccione...</option>
                    <?php if($registroDTO->getTipo_registro() == 'entrada'){?>
                    <option value="entrada" selected>Entrada</option>
                    <option value="salida">Salida</option>
                    <?php }else{ ?>
                    <option value="entrada">Entrada</option>                
                    <option value="salida" selected>Salida</option>    
                    <?php }?>            
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="hidden" id="id_registro" name="id_registro" value="<?php echo $registroDTO->getId_registro();?>"/>
                <input type="hidden" id="modo" name="modo" value="<?php echo $registroDTO->getId_registro()?"editar":"crear";?>"/>

                <button type="submit" nombre="enviar" class="btn btn-primary"> Guardar</button>
            </div>
        </form>
    </div>
</div>