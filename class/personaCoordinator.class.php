<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class personaCoordinator{
    private mysqli $conexion;
    
    function __construct(mysqli $conexion) {
        $this->conexion = $conexion;
    }
    
    function getConexion(): mysqli {
        return $this->conexion;
    }

    function setConexion(mysqli $conexion): void {
        $this->conexion = $conexion;
    }
    
    function crearPorPost(){
        $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        
        $personaDAO = new personaDAO($this->getConexion());
        $personaDTO = new personaDTO(0, $nombre, $email);
        
        return $personaDAO->insert($personaDTO);
    } 
    
    function editarPorPost(){
        $id_persona = filter_input(INPUT_POST, "id_persona", FILTER_SANITIZE_NUMBER_INT);    
        $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        
        $personaDAO = new personaDAO($this->getConexion());
        $personaDTO = new personaDTO($id_persona, $nombre, $email);
        
        return $personaDAO->insert($personaDTO);
    }
    
    function eliminarPorPost(){
        $id_persona = filter_input(INPUT_POST, "id_persona", FILTER_SANITIZE_NUMBER_INT);    
                
        $personaDAO = new personaDAO($this->getConexion());
                
        return $personaDAO->delete($id_persona);
    }
    

}
