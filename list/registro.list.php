<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require '../conexion/conexion.php';
require '../class/registroDAO.class.php';
require '../class/registroDTO.class.php';

//instancio las clases DTO y DAO

$registroDTO = new registroDTO();
$registroDAO = new registroDAO($conexion);

//obtiene el valor buscado del registro.
$txt_busqueda = filter_input(INPUT_POST,'txt_busqueda',FILTER_SANITIZE_STRING)??'';

//opera el metodo del DAO que trae todos los registros
$registro = $registroDAO->getAll($txt_busqueda);
?>

<button type="button" onclick="abrirPagina('forms/registro.form.php','contenido','')">+</button>
<table class="table table-responsive">
    <thead class="table-dark">
        <tr>
            <th scope="row">#</th>
            <th scope="row">Nombre</th>
            <th scope="row">Tipo Registro</th>
            <th scope="row">Fecha</th>
            <th scope="row" colspan="2">Opciones</th>              
        </tr>
    </thead>
    <tbody>
        <?php 
        //mostramos las concidencias mientras el objeto tenga datos
        while ($obj = $registro->fetch_object()){
            $registroDTO->map($obj); //se mapean las variables del DTO
        ?>    
        
        <tr>
            <th scope="row"><?php echo $registroDTO->getId_registro();?></th>
            <td><?php echo $registroDTO->getPersona();?></td>
            <td><?php echo $registroDTO->getTipo_registro();?></td>
            <td><?php echo $registroDTO->getDatetime();?></td>
            <td><a href="#" onclick="abrirPagina('forms/registro.from.php','contenido','&id_registro = <?php echo $registroDTO->getId_registro(); ?>')"><i class="fas fa-edit"></i></a></td>
            <td><form action="process/resgitro.process.php" id="formEliminar<?php echo $registroDTO->getId_registro()?>">
                    <input type="hidden" name="id_registro" value="<?php echo $registroDTO->getId_registro()?>">
                    <input type="hidden" name="modo" id="modo"  value="eliminar" />
                    <a href="#" onclick="enviarFormulario(document.getElementById('formEliminar<?php echo $registroDTO->getId_registro()?>'),'',`abrirPagina('list/registro.list.php','contenido_registro','&txt_busqueda='+$('#id_txt_busqueda').val());`);"><i class="fas fa-trash-alt"></i></a>
                </form>
            </td>
        </tr>
            
            
        <?php    
                
        }
        
        ?>
              
    </tbody>
    
</table>