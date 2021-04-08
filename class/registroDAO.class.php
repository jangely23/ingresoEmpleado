<?php
class registroDAO{
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

    function insert(registroDTO $registroDTO){
        $query = sprintf("insert into registro ("
                . "id_persona, "
                . "tipo_registro) values ('%d','%s')", $registroDTO->getId_persona(), $registroDTO->getTipo_registro());
        $result = $this->getConexion()->query($query);
        
        if($result){
            return $this->getConexion()->insert_id;
        }else{
            throw new Exception("Error en el insert de registroDAO".$this->getConexion()->error);
        }
    }
    
    function update(registroDTO $registroDTO){
         $query = sprintf("update registro set id_persona = '%d', tipo_registro = '%s'", $registroDTO->getId_persona(), $registroDTO->getTipo_registro());
         $result = $this->getConexion()->query($query);
         
         if($result){
             return true;
         }else{
             throw new Exception("Error en el update de registroDAO".$this->getConexion()->error);
         }
    }
    
    function delete(int $id_registro){
        $query = sprintf("delete from registro where id_registro = '%d'",$id_registro);
        $result = $this->getConexion()->query($query);
        
        if($result){
            return true;
        }else{
            throw new Exception("Hubo un error con el delete de registroDAO", $this->getConexion()->error);
        }
    }
    
    function getAll(string $txt_busqueda = ''): mysqli_result{
        
        $sqlBusqueda = "";
        
        if($txt_busqueda != ''){
            $sqlBusqueda = sprintf('and (persona.nombre like "%%%1$s%%" or registro.tipo_datetime like "%%%1$s%%" or registro.tipo_registro like "%%%1$s%%")');
        }
        
        $query = sprintf("select registro.*, persona.nombre from registro inner join persona on registro.id_persona=persona.id_persona where 1=1 %s order by nombre desc",$sqlBusqueda);
        $result = $this->getConexion()->query($query);
        
        if($result){
            return $result;
        }else{
            throw new Exception("Hubo un error con el getAll en registroDAO".$this->getConexion()->error);
        }
    }
    
    function getById(int $id_registro){
        $query = sprintf("select registro.*, persona.nombre from registro inner join persona on registro.id_persona=persona.id_persona where registro.id_registro = '%d'",$id_registro);
        $result = $this->getConexion()->query($query);
        
        if($result){
            return $result->fetch_object();
        }else{
            throw new Exception("Hubo un error con el getById en registroDAO".$this->getConexion()->error);
        }
    }
}

?>

