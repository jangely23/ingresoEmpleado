<?php
class registroDAO{
    private mysqli $conexion;
    
    function __construct(mysqli $conexion) {
        $this->conexion;
    }
    
    function getConexion(): mysqli {
        return $this->conexion;
    }

    function setConexion(mysqli $conexion): void {
        $this->conexion = $conexion;
    }

    function insert(registroDTO $registroDTO){
        $query = sprintf("insert into registro ("
                . "id_persona, "
                . "datetime, "
                . "tipo_registro) values ('%d','%s','%s')", $registroDTO->getId_persona(), $registroDTO->getDatetime(), $registroDTO->getTipo_registro());
        $result = $this->getConexion()->query($query);
        
        if($result){
            return $this->getConexion()->insert_id;
        }else{
            throw new Exception("Error en el insert de registroDAO".$this->getConexion()->error);
        }
    }
    
    function update(registroDTO $registroDTO){
         $query = sprintf("update registro set id_persona = '%d', datetime = '%s', tipo_registro = '%s'", $registroDTO->getId_persona(), $registroDTO->getDatetime(), $registroDTO->getTipo_registro());
         $result = $this->getConexion()->query($query);
         
         if($result){
             return true;
         }else{
             throw new Exception("Error en el update de registroDAO".$this->getConexion()->error);
         }
    }
    
    function delete(int $id_registro){
        $query = sprintf("delete from registro where id_registro = '%d'",$id_registro);
    }
    
}

?>

