<?php 
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexion = "localhost"; 
$database_conexion = "registro_empleado";
$username_conexion = "admin"; 
$password_conexion = "ninguna";

$conexion = mysqli_connect($hostname_conexion, $username_conexion, $password_conexion,$database_conexion) or trigger_error("Error en consulta",E_USER_ERROR);
?>