<?php
/* if(substr_count($_SERVER['PHP_SELF'], 'persona.list.php')){
  require '../conexion/conexion.php';
  require '../class/personaDAO.class.php';
  require '../class/personaDTO.class.php';

  }else{
  require '../class/personaDAO.class.php';
  require '../class/personaDTO.class.php';
  } */

require '../conexion/conexion.php';
require '../class/personaDAO.class.php';
require '../class/personaDTO.class.php';

$personaDTO = new personaDTO();
$personaDAO = new personaDAO($conexion);

$txt_busqueda = filter_input(INPUT_POST, "txt_busqueda", FILTER_SANITIZE_STRING) ?? ""; //si el valor es nulo lo pasa a lo que sigue de ??

$personas = $personaDAO->getAll($txt_busqueda);
?>

<button type="button" class="btn-primary" onclick="abrirPagina('forms/persona.form.php', 'contenido', '')"> + </button>
<table class="table table-responsive">
    <thead class="table-dark">
        <tr>
            <th scope="row">#</th>
            <th scope="row">Nombre</th>
            <th scope="row">Email</th>
            <th scope="row" colspan="2">Opciones</th>
        </tr>
    </thead>
    <tbody>


        <?php
        while ($obj = $personas->fetch_object()) {
            $personaDTO->map($obj);
            ?>
            <tr>
                <th scope="row"><?php echo $personaDTO->getId_persona(); ?></th>
                <td><?php echo $personaDTO->getNombre(); ?></td>
                <td><?php echo $personaDTO->getEmail(); ?></td>
                <td><a href="#" onclick="abrirPagina('forms/persona.form.php', 'contenido', '&id_persona=<?php echo $personaDTO->getId_persona(); ?>');"><i class="fas fa-edit"></i></a></td>
                <td><form action="process/persona.process.php" id="formEliminar<?php echo $personaDTO->getId_persona(); ?>">
                        <input type="hidden" name="id_persona" value="<?php echo $personaDTO->getId_persona(); ?>" />
                        <input type="hidden" name="modo" id="modo" value="eliminar"/> 
                        <a href="#" 
                            onclick="
                                    enviarFormulario(
                                            document.getElementById('formEliminar<?php echo $personaDTO->getId_persona(); ?>'),
                                            '',
                                            `abrirPagina('list/persona.list.php','contenido_persona','&txt_busqueda='+$('#id_txt_busqueda').val())`
                                            );
                            "><i class="fas fa-trash-alt"></i></a>
                    </form>
                </td>
            </tr>

            <?php
            //echo $personaDTO->getId_persona() . " -" . $personaDTO->getNombre() . " - " . $personaDTO->getEmail() . "<br />";
        }
        ?>

    </tbody>
</table>
