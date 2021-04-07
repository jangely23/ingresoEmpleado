<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../conexion/conexion.php';
require "../class/" . $entidad . "DAO.class.php";
require "../class/" . $entidad . "DTO.class.php";
require "../class/" . $entidad . "Coordinator.class.php";

try {
    $modo = filter_input(INPUT_POST, "modo", FILTER_SANITIZE_STRING);
    $nombreCoordinador = $entidad . "Coordinator";
    
    $coordinador = new $nombreCoordinador($conexion);

    switch ($modo) {
        case "crear":
            $resultado = $coordinador->crearPorPost();
            break;
        case "editar":
            $resultado = $coordinador->editarPorPost();
            break;
        case "eliminar":
            $resultado = $coordinador->eliminarPorPost();
            break;
    }

    if ($resultado) {
        $respuesta = array("resultado" => "ok");
    } else {
        $respuesta = array("resultado" => "false");
    }

    $json = json_encode($respuesta);
    echo $json;
    
} catch (Exception $ex) {

    $respuesta = array("resultado" => "error", "descripcion" => $ex->getMessage());
    $json = json_encode($respuesta);
    echo $json;
}


