<?php 
session_start();
$_SESSION["id"]=$_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    
    <title>Editar Noticia</title>
</head>

<body>
<form method="post" action="">
        <fieldset>
            <p>
                <label> Nuevo Titular de la Noticia
                <input type="text" id= "ntitular"name="ntitular" required/>
            </label>
            </p>
            <p>
                <label> Nuevo Contenido de la Noticia:
                    <textarea id="ncontenido" name="ncontenido" rows="10" cols="70" required></textarea>
            </label>
            </p>
            <p>
                <label> Noticia privada:
                <input type="checkbox" id= "nprivacidad"name="nprivacidad"/>
            </label>
            </p>
            <p><input type="submit" name="submit" value="Editar"></p>

        </fieldset>

    </form>

<?php 
$servidor = "localhost";
$baseDatos = "clubsocial";
$usuario = "root";
$pass = "root";



if(isset($_POST["submit"])){
   
editarNoticia();
}
function editarNoticia(){   
    $id=$_SESSION['id'];
    $ntitular= $_POST["ntitular"];
    $ncontenido=$_POST["ncontenido"];
    if (isset($_POST['nprivacidad'])){
        $nprivacidad="0";
        }else{
            $nprivacidad="1";
        }
    
    $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
    $sql = $con->prepare("UPDATE noticias  set titular=:titular , content=:content, privado=:privado where id_noticia=:id;");
    $sql->bindParam(":titular", $ntitular);
    $sql->bindParam(":content", $ncontenido);
    $sql->bindParam(":privado", $nprivacidad);
    $sql->bindParam(":id", $id);
    $sql->execute();   

    header(("Location: ../insertarNoticias.php"));
} 
?>
</body>
</html>