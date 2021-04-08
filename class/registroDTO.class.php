<?php
class registroDTO{
    private int $id_registro;
    private int $id_persona;
    private string $datetime;
    private string $tipo_registro;
    private string $persona;
    
    function __construct(int $id_registro=0, int $id_persona=0, string $datetime='' , string $tipo_registro='', string $persona = '') {
        $this->id_registro = $id_registro;
        $this->id_persona = $id_persona;
        $this->datetime = $datetime;
        $this->tipo_registro = $tipo_registro;
        $this->persona = $persona;
    }
    
    function getId_registro(): int {
        return $this->id_registro;
    }

    function getId_persona(): int {
        return $this->id_persona;
    }

    function getDatetime(): DateTime {
        return $this->datetime;
    }

    function getTipo_registro(): string {
        return $this->tipo_registro;
    }

    function getPersona(): string {
        return $this->persona;
    }
    function setId_registro(int $id_registro): void {
        $this->id_registro = $id_registro;
    }

    function setId_persona(int $id_persona): void {
        $this->id_persona = $id_persona;
    }

    function setDatetime(string $datetime): void {
        $this->datetime = $datetime;
    }

    function setTipo_registro(string $tipo_registro): void {
        $this->tipo_registro = $tipo_registro;
    }

    function setPersona(string $persona): void {
        $this->persona = $persona;
    }
    
    function map($obj){ //hace el set de todas las opciones
        $this->setId_registro($obj->id_registro);
        $this->setId_persona($obj->id_persona);
        $this->setDatetime($obj->datetime);
        $this->setTipo_registro($obj->tipo_registro);
        $this->setPersona($obj->persona);
    }
    
    function cargarPorId(int $id_registro, mysqli $conexion){
        $registroDAO=new registroDAO($conexion);
        $obj= $registroDAO->getById($id_registro);
        if($obj){
            $this->map($obj);
        }
    }
    
}

?>
