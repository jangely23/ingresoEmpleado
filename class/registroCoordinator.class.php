<?php

class registroCoordinator{
    private mysqli $conexion;

    function __construct(mysqli $conexion){
        $this->conexion = $conexion;
    }

    function getConexion(): mysqli{
        return $this->conexion;
    }

    function setConexion(mysqli $conexion): void{
        $this->conexion = $conexion;
    }

    function crearPorPost(){
        $id_persona = filter_input(INPUT_POST,'id_persona',FILTER_SANITIZE_NUMBER_INT);
        $tipo_registro = filter_input(INPUT_POST,'tipo_registro',FILTER_SANITIZE_STRING);

        $registroDAO = new registroDAO($this->getConexion());

        $registroDTO = new registroDTO(0,$id_persona,'',$tipo_registro,'');

        return $registroDAO->insert($registroDTO);
    }

    function editarPorPost(){
        $id_registro = filter_input(INPUT_POST,'id_registro',FILTER_SANITIZE_NUMBER_INT);
        $id_persona = filter_input(INPUT_POST,'id_persona',FILTER_SANITIZE_NUMBER_INT);
        $tipo_registro = filter_input(INPUT_POST,'tipo_registro',FILTER_SANITIZE_STRING);
        
        $registroDAO = new registroDAO($this->getConexion());

        $registroDTO = new registroDTO($id_registro,$id_persona,'',$tipo_registro,'');

        return $registroDAO->insert($registroDTO);
    }

    function eliminarPorPost(){
        $id_registro = filter_input(INPUT_POST,'id_registro',FILTER_SANITIZE_NUMBER_INT);

        $registroDAO = new registroDAO($this->getConexion());

        return $registroDAO->delete($id_registro);
    }
}
?>

