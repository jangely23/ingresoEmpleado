<?php
class personaDTO{
    private int $id_persona; //para php 8 se puede indicar el tipo dato.
    private string $nombre;
    private string $email;

    function __construct(int $id_persona=0, string $nombre="", string $email="")
    {
        $this->id_persona = $id_persona;
        $this->nombre= $nombre;
        $this->email = $email;

    }
    
    function getId_persona(): int {
        return $this->id_persona;
    }

    function getNombre(): string {
        return $this->nombre;
    }

    function getEmail(): string {
        return $this->email;
    }

    function setId_persona(int $id_persona): void {
        $this->id_persona = $id_persona;
    }

    function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    function setEmail(string $email): void {
        $this->email = $email;
    }

    function map($obj){
        $this->setId_persona($obj->id_persona);
        $this->setNombre($obj->nombre);
        $this->setEmail($obj->email);
    }
    
    function cargarPorId(int $id_persona, mysqli $conexion){
        $personaDAO=new personaDAO($conexion);
        $obj= $personaDAO->getById($id_persona);
        if($obj){
            $this->map($obj);
        }
    }

}

?>