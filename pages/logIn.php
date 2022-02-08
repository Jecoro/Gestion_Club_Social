<?php

include_once "databaseManagement.inc.php";
session_start();
//Iniciamos la sesion
echo '<link rel="stylesheet" href="styless.css">';
if (isset($_POST['login'])) {
    //Obtenemos los datos del form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $a="";
    //Consulta select con el username para comprobar si existe en la bbdd luego comprobaremos si la contraseña es correcta, si no lo es o si la consulta no obtuvo nada se mostrará mensajes de error
    $query = $connection->prepare("SELECT * FROM usuarios WHERE email=:email");
    $query->bindParam("email", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        echo '<p class="error">La combinacion de usuario y contraseña no es correcta</p>';
        echo "<a href='formulario.html'>Volver</a>";
        echo("<p> {$a}</p>");
    } else {
        if (($password == $result['password'])) {
            $_SESSION['user_id'] = $result['id_socio'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['nombre'] = $result['name'];
            $_SESSION['password'] =  $result['password'];
            
            header("Status: 301 Moved Permanently");
            header("Location:index-logged.php/?id_socio=".$_SESSION["user_id"]);

           
        } else {
            echo '<p class="error">La combinacion de usuario y contraseña no es correcta</p>';
            echo "<a href='login.html'>Volver</a>";
        }
        $result['password']=$a;
        echo("<p> {$a}</p>");
        
    }
    
}

?>  
