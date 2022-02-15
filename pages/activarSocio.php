<?php
include_once "databaseManagement.inc.php";
$id=$_GET['id_socioElegido'];
activarUsuario($id);
echo("Usuario Activado correctamente");

?>