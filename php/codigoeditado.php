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
<form method="post" action="codigoeditado.php">
        <fieldset>
            <p>
                <label> Nuevo Titular de la Noticia
                <input type="text" id= "ntitular"name="ntitular" />
            </label>
            </p>
            <p>
                <label> Nuevo Contenido de la Noticia:
                    <textarea id="ncontenido" name="ncontenido" rows="10" cols="70"></textarea>
            </label>
            </p>
            <p>
                <label> Noticia privada:
                <input type="checkbox" id= "nprivacidad"name="nprivacidad"/>
            </label>
            </p>
            <p><input type="submit" value="Editar"></p>

        </fieldset>

    </form>

<?php 
$servidor = "localhost";
$baseDatos = "clubsocial";
$usuario = "root";
$pass = "root";
$id=$_SESSION['id'];
echo $id;
if(isset($_POST["submit"])){

editarNoticia();
}



function editarNoticia(){
      
    $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        
    $id=$_SESSION['id'];
    $ntitular= $_POST["ntitular"];
    $ncontenido=$_POST["ncontenido"];
    if (isset($_POST['nprivacidad'])){
        $nprivacidad="0";
        }else{
            $nprivacidad="1";
        }
        if (isset($_POST['ntitular'])){
            
            $sql= $con->prepare("UPDATE noticias  SET titular='$ntitular' , content='$ncontenido',privado='$nprivacidad' WHERE id='$id';");
           
            
            echo"dentro";
        }else{
          
            $sql= $con->prepare("UPDATE noticias  SET  content='$ncontenido',privado='$nprivacidad' WHERE id='$id';");
            
            echo"dentro";
        }  
        if (isset($_POST['ncontenido'])){
         
            $sql= $con->prepare("UPDATE noticias  SET titular='$ntitular' , content='$ncontenido',privado='$nprivacidad' WHERE id='$id';");
            echo"dentro";
            
        }else{
          
            $sql= $con->prepare("UPDATE noticias  SET titular='$ntitular' , privado='$nprivacidad' WHERE id='$id';");
        
            echo"dentro";
        }  
        $sql->execute();  
        


     
        
    
} 


?>