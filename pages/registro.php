<?php include_once "databaseManagement.inc.php";

$db_host = "127.0.0.1";
$db_user = "root";
$db_password = "root";
$db_name = "clubsocial";
$db_table_name = "usuarios";


$db_connection = new mysqli('localhost', 'root', 'root', 'clubsocial');

if (!$db_connection) {
   die('No se ha podido conectar a la base de datos');
}
$nombre = utf8_decode($_POST['name']);
$apellidos = utf8_decode($_POST['surname']);
$fechanac = utf8_decode($_POST['fecnac']);
$dni = utf8_decode($_POST['dni']);
$telefono = utf8_decode($_POST['telf']);
$email = utf8_decode($_POST['email']);
$pass = utf8_decode($_POST['password']);
$familiares = utf8_decode($_POST['familiares']);
$cuota=60;

if($familiares>1 && $familiares<6){
   $cuota=$cuota+10;
}elseif($familiares>6 && $familiares<11){
   $cuota=$cuota+25;
}elseif($familiares>10){
   $cuota=$cuota+30;
}

if(obtenerUsuario($email)){
   echo ("Ya estas registrado");
}else{
   insertaUsuario($pass,$nombre,$apellidos,$telefono,$fechanac,$email, $dni,$familiares,$cuota);
}



?>
