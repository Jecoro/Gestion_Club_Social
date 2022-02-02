<?php 
$servidor = "localhost";
$baseDatos = "clubsocial";
$usuario = "root";
$pass = "root";

session_start();
$_SESSION["id"]=$_GET["id"];

borrar();

function borrar(){
    
  
    try{
          $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
         
  
          $sql = $con->prepare("DELETE from noticias where id_noticia= :id");
          $sql->bindParam(":id", $_SESSION["id"]);
          $sql->execute();
        if ($sql->rowCount() > 0) {
           echo"Noticia borrada Correctamente" ;
           
        }
    }catch (PDOException $e) {
        echo $e;
    }
   
}

header(("Location: ../insertarNoticias.php"));




?>