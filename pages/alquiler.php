<?php
//obtener pista
session_start();
$_SESSION["idPista"]=$_GET['id_pista'];
//echo($_SESSION["idPista"]);
//
$usuario = "root";
$password = "root";
$servidor = "localhost";
$basededatos = "clubsocial";
//
$conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db( $conexion, $basededatos ) or die ( "No se ha podido conectar a la base de datos" );
//
$consulta="SELECT * FROM `instalaciones` WHERE `id_pista`='".$_SESSION['idPista']."'";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
//
$hoy = getdate();
//print_r($hoy);
//echo($hoy["mday"]);
$start = strtotime($hoy["year"]."-".$hoy["mon"]."-".$hoy["mday"]);

//echo "<h2>".date("F, Y", $start)."</h2>";          
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
        <a class="navbar-brand" href="index.php">CLUB SOCIAL</a>
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

<body>

    <?php
        while ($columna = mysqli_fetch_array( $resultado )){
            //echo("hola");
            echo("<h1>Alquiler de pista: ".$columna['nombre_pista']."</h1>");
        }  
    ?>
    <div class="centradoCalendario">
        <table class="calendario">
          <thead>
            <th>Domingo</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miercoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sabado</th>
          </thead>
    <?php 
    $index = 0;
    $startpos =0; 
    $continue2 = 1;
    for($i=1; $i<=5; $i++): $index++; 
    ?>
        <tr>
            <?php for($j=0; $j<7; $j++):?>
                <td class="dia">
                <?php 
                
                if($startpos>0 && $continue2<date("t", $start)){ 
                    
                    $continue2++; 

                    if($continue2<10){
                        $dia="0".$continue2;
                    }else{
                        $dia=$continue2;
                    }

                    if($hoy["mon"]<10){
                        $mes="0".$hoy["mon"];
                    }else{
                        $mes=$hoy["mon"];
                    }
                    //comprobar si el dia ha pasado o no
                    if($continue2<=$hoy["mday"]){
                        
                    }else{
                        mandarAlquiler($dia,$mes,$hoy);
                        
                    }
                    echo "<h4>".$continue2."</h4>"; 

                    }//
                    ?>
                    <?php if($i==1 && $j==date("w", $start)):?>
                        <?php
                            if($hoy["mon"]<10){
                                $mes="0".$hoy["mon"];
                            }else{
                                $mes=$hoy["mon"];
                            }
                            //
                            if($hoy["mon"]==1){
                                echo("<a href='../horas_alquiler.php/?id=".$_SESSION["idPista"]."&dia=01&mes=".$mes."&ano=".$hoy["year"]."'>Alquilar</a>"); 

                            }
                            //
                            ?>
                            
                        <h4>1</h4>
                    <?php 
                    $startpos=$index;
                endif; ?>
                </td>
            <?php endfor;?>
        </tr>
    <?php endfor; ?>
</table>
</div> 
<footer class="py-3 my-4 bg-secondary ">
  <ul class="nav justify-content-center border-bottom pb-3 mb-3">
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Home</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Features</a></li>
    <li class="nav-item"><a href="form.html" class="nav-link px-2 text-white">Contact</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">About</a></li>
  </ul>
  <p class="text-center text-white">© 2021 Company, Inc</p>
</footer>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="../js/bootstrap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
       
</body>
</html>

<?php

function mandarAlquiler($dia,$mes,$hoy){
    $fecha=$dia."-".$mes."-".$hoy["year"];
    //echo($fecha);
    //echo("<a href='../horas_alquiler.php/?id=".$_SESSION["idPista"]."&dia=".$dia."&mes=".$mes."&ano=".$hoy["year"]."'>Alquilar</a>"); 
    echo("<a href='../horas_alquiler.php/?id=".$_SESSION["idPista"]."&fecha=".$fecha."'>Alquilar</a>"); 

}

?>