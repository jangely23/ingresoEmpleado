<?php

class personaDAO{
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

    function insert(personaDTO $personaDTO){  //encapsulamiento
        $query=sprintf("insert into persona (nombre, email) values ('%s', '%s')",$personaDTO->getNombre(),$personaDTO->getEmail()); // %d y %f
        $result=$this->getConexion()->query($query);
         
        if($result){
            return $this->getConexion()->insert_id;
        }else{
            throw new Exception("hubo un erro con el insert en personaDAO".$this->getConexion()->error);
        }
    }

    function update(personaDTO $personaDTO){  //encapsulamiento
        $query=sprintf("update persona  set nombre = '%s', email = '%s' where id_persona = '%d'",$personaDTO->getNombre(),$personaDTO->getEmail()); // %d y %f
        $result=$this->getConexion()->query($query); 
         
        if($result){
            return true;
        }else{
            throw new Exception("hubo un erro con el update en personaDAO".$this->getConexion()->error);
        }
    }

    function delete(int $id_persona){  //encapsulamiento
        $query = sprintf("delete from persona where id_persona = '%d'", $id_persona); // %d y %f
        $result = $this->getConexion()->query($query);
        
        if($result){
            return true;
        }else{
            throw new Exception("hubo un erro con el update en personaDAO".$this->getConexion()->error);     
        }
    }

    function getAll(string $txt_busqueda =''): mysqli_result{  //encapsulamiento
        
        $sqlBusqueda = "";
        if($txt_busqueda != ''){
            
            $sqlBusqueda = sprintf('and (nombre like "%%%1$s%%" or email like "%%%1$s%%")',$txt_busqueda);
            
        }
            
        $query = sprintf("select * from persona where 1=1 %s order by nombre asc",$sqlBusqueda); // %d y %f
        //echo $query;
        $result = $this->getConexion()->query($query);
        
        if($result){
            return $result;
        }else{
            throw new Exception("hubo un erro con el update en personaDAO".$this->getConexion()->error);     
        }
    }

    function getById(int $id_persona){  //encapsulamiento
        $query = sprintf("select * from persona where id_persona = '%d'", $id_persona); // %d y %f
        $result = $this->getConexion()->query($query);
        
        if($result){
            return $result->fetch_object();
        }else{
            throw new Exception("hubo un erro con el update en personaDAO".$this->getConexion()->error);     
        }
    }

}

?>