<?php
//obtener datos
$id_Pista=$_GET["id"];
$fecha=$_GET["fecha"];
//echo($id_Pista.",".$fecha);
//datos BD
$servidor = "localhost";
        $baseDatos = "clubsocial";
        $usuario = "root";
        $password = "root";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/index.css?v=<?php echo time(); ?>">
    <title>Alquiler</title>
</head> 
<body>
<header>
<nav class="navbar navbar-dark header">
      <div class="container">
      <?php
          
          include_once "databaseManagement.inc.php";
          if(isset($_GET['id_socio'])){
            $id=$_GET['id_socio'];
            }else{
              $id=null;}
      ?>
        <a class="navbar-brand" href="#">CLUB SOCIAL</a>
        <button class="myButton" onclick="window.location.href='../noticias.php<?php echo('/?id_socio='.$id)  ?>'">Noticias</button>
        <button class="myButton" onclick="window.location.href='../instalaciones.php<?php echo('/?id_socio='.$id)  ?>'">Instalaciones</button>
        <button class="myButton" onclick="window.location.href='../eventos.php<?php echo('/?id_socio='.$id)  ?>'">Eventos</button>
        <?php
          
          include_once "databaseManagement.inc.php";
          if(isset($_GET['id_socio'])){
          $id=$_GET['id_socio'];
          }else{
            $id=null;
            echo'<button class="myButton botonLogIn" onclick='.'window.location.href="login.html"'.'>Log In</button>';
          }
          if($id!=null){
           $query = $connection->prepare("SELECT * FROM usuarios WHERE id_socio='$id'");
           $query->execute();
           $result = $query->fetch(PDO::FETCH_ASSOC);
           

           if($result["esPresidente"]){
           // echo'<button style="margin-right:3%;" class="myButton botonLogIn" onclick="window.location.href='.'panelAdmin.php/?id_socio='.$id.'">Panel de Control</button>';
           echo'<button style="margin-right:3%;" class="myButton botonLogIn" onclick=window.location.href="../panelAdmin.php/?id_socio='.$id.'">Panel de Control</button>';
           echo'<button style="margin-right:3%;" class="myButton botonLogIn" onclick=window.location.href="../index.php">Cerrar Sesion</button>';
           }else{
            echo'<button style="margin-right:3%;" class="myButton botonLogIn" onclick=window.location.href="../index.php">Cerrar Sesion</button>';
           }
           
          } 
        ?>
        
      </div>
    </nav>
</header>

    <?php
    //obtener array de horas
    try{
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
        $sql = $con->prepare("SELECT hora from alquileres WHERE fecha=:fecha");
        $sql -> bindParam(":fecha",$fecha);
        $sql -> execute();
        $arrayHoras = [];
        while ($row=$sql ->fetch(PDO::FETCH_ASSOC)){
            $arrayHoras[]=$row;
        }
        $con = null;
    }catch(PDOException $e){
        echo $e;
    }
    //print_r($arrayHoras);

    ?>
    <form action="" method="post">
        <h2>Alquiler</h2>

        <?php
        $arrayHorasDia=[];
            foreach($arrayHoras as $valor){
                array_push($arrayHorasDia,$valor['hora']);
            }
           /* foreach($arrayHorasDia as $valor){
                echo($valor);
            }*/

            if(in_array("7:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='7:00' required >7:00-8:00");
            }else{
                echo("<input type='radio' name='hora' value='7:00' required >7:00-8:00");

            }
            echo("</br>");
            if(in_array("8:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='8:00' required >8:00-9:00");
            }else{
                echo("<input type='radio' name='hora' value='8:00' required >8:00-9:00");

            }
            echo("</br>");
            if(in_array("9:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='9:00' required >9:00-10:00");
            }else{
                echo("<input type='radio' name='hora' value='9:00' required >9:00-10:00");

            }
            echo("</br>");
            if(in_array("10:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='10:00' required >10:00-11:00");
            }else{
                echo("<input type='radio' name='hora' value='10:00' required >10:00-11:00");

            }
            echo("</br>");
            if(in_array("11:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='11:00' required >11:00-12:00");
            }else{
                echo("<input type='radio' name='hora' value='11:00' required >11:00-12:00");

            }
            echo("</br>");
            if(in_array("12:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='12:00' required >12:00-13:00");
            }else{
                echo("<input type='radio' name='hora' value='12:00' required >12:00-13:00");

            }
            echo("</br>");
            if(in_array("13:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='13:00' required >13:00-14:00");
            }else{
                echo("<input type='radio' name='hora' value='13:00' required >13:00-14:00");

            }
            echo("</br>");
            if(in_array("14:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='14:00' required >14:00-15:00");
            }else{
                echo("<input type='radio' name='hora' value='14:00' required >14:00-15:00");

            }
            echo("</br>");
            if(in_array("15:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='15:00' required >15:00-16:00");
            }else{
                echo("<input type='radio' name='hora' value='15:00' required >15:00-16:00");

            }
            echo("</br>");
            if(in_array("16:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='16:00' required >16:00-17:00");
            }else{
                echo("<input type='radio' name='hora' value='16:00' required >16:00-17:00");
            }
            echo("</br>");
            if(in_array("17:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='17:00' required >17:00-18:00");
            }else{
                echo("<input type='radio' name='hora' value='17:00' required >17:00-18:00");

            }
            echo("</br>");
            if(in_array("18:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='18:00' required >18:00-19:00");
            }else{
                echo("<input type='radio' name='hora' value='18:00' required >18:00-19:00");

            }
            echo("</br>");
            if(in_array("19:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='19:00' required >19:00-20:00");
            }else{
                echo("<input type='radio' name='hora' value='19:00' required >19:00-20:00");

            }
            echo("</br>");
            if(in_array("20:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='20:00' required >20:00-21:00");
            }else{
                echo("<input type='radio' name='hora' value='20:00' required >20:00-21:00");

            }
            echo("</br>");
            if(in_array("21:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='21:00' required >21:00-22:00");
            }else{
                echo("<input type='radio' name='hora' value='21:00' required >21:00-22:00");

            }
            echo("</br>");
            if(in_array("22:00",$arrayHorasDia)){
                echo("<input disabled type='radio' name='hora' value='22:00' required >22:00-23:00");
            }else{
                echo("<input type='radio' name='hora' value='22:00' required >22:00-23:00");

            }
            echo("</br>");
        ?>
        <br/>

        Numero de Socios:<input type="number" id="nsocios"name="nsocios"></input><br><br>
        Numero de NO Socios:<input type="number" id="nosocios"name="nosocios"></input>

        <br><br>
        
        <input type="Submit" name="submit" value="Alquilar">
        </br></br>

        <button><a href='../../instalaciones/vistaInstalaciones.php'>Volver</a></button>


    </form>
    <?php
    if(isset($_POST['submit'])){
        //obtener datos
        //$fecha
        $hora=$_POST["hora"];
        $nosocios=$_POST["nosocios"];
        $fkUsuarios=1;
        $idpista=$id_Pista;
        //datos servidor
        
        try {
            $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
            $sql = $con->prepare("INSERT into alquileres values(null,:fecha,:hora,:nsocios,:fkUsuarios,:idpista)");
            $sql->bindParam(":fecha", $fecha);
            $sql->bindParam(":hora", $hora);
            $sql->bindParam(":nsocios", $nosocios);
            $sql->bindParam(":fkUsuarios", $fkUsuarios);
            $sql->bindParam(":idpista", $idpista);
            $sql->execute();
            $id = $con->lastInsertId();
            
        } catch (PDOException $e) {
            echo $e;
            echo("fallo aqui");
        }
        $con = null;
        echo("[<a href='vistaInstalaciones.php'>Volver</a>]");
        return $id;
        header("Location:alquilerPista.php");

    }
    ?>

    </body>
</html>
