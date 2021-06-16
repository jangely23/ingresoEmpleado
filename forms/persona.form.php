<?php

require '../conexion/conexion.php';
require "../class/personaDAO.class.php";
require "../class/personaDTO.class.php";

//recibir variables id_persona

$id_persona = filter_input(INPUT_POST, "id_persona",FILTER_SANITIZE_NUMBER_INT)??0;

$personaDTO = new personaDTO();
$personaDTO->cargarPorId($id_persona, $conexion);
?>

<div class="row">
    <fieldset class="shadow-none p-2 mb-3 bg-light rounded">
        <legend>Personas</legend>
    </fieldset>
    <div class="col">
        <form method="POST" action="process/persona.process.php" 
              onsubmit="return enviarFormulario(this,'',`abrirPagina('list/persona.php','contenido','&txt_busqueda='+$('#id_txt_nombre').val())`)">
            
        <div class="form-group mb-3">
            <label for="id_txt_nombre">Nombre</label>
            <input type="text" required="yes" name="nombre" class="form-control" id="id_txt_nombre" value="<?php echo $personaDTO->getNombre(); ?>" placeholder="nombre"/>
             
        </div>
        <div class="form-group mb-3">
            <label for="id_txt_email">Email</label>
            <input type="email" required="yes" name="email" class="form-control" id="id_txt_email" value="<?php echo $personaDTO->getEmail(); ?>" placeholder="Email"/>
             
        </div>
        <div class="form-group mb-3">
            <input type="hidden" name="id_persona" id="id_persona" value="<?php echo $personaDTO->getId_persona();?>"/>
            <input type="hidden" name="modo" id="modo" value="<?php echo $personaDTO->getId_persona()?"editar":"crear";?>"/> 
                
            <button type="submit" nombre="enviar" class="btn btn-primary"> Guardar</button>
             
        </div>
        </form>
    </div>
    
</div>
