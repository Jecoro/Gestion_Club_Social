
<!doctype html>
<html lang="en">
  <head>
    <title>Eventos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
  </head>
  <style>
  <?php include '../css/index.css';
  include '../css/bootstrap.min.css'; ?>
</style>
  <body>
 <section class="cuerpo">
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
        <a class="navbar-brand" href='index.php'>CLUB SOCIAL</a>
        <button class="myButton" onclick="window.location.href='../noticias.php<?php echo('/?id_socio='.$id)  ?>'">Noticias</button>
        <button class="myButton" onclick="window.location.href='../instalaciones.php<?php echo('/?id_socio='.$id)  ?>'">Instalaciones</button>
        <button class="myButton" onclick="window.location.href=''">Eventos</button>
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

<main>
  <section class="my-3">
      <div class="bg-light p-5 rounded">
      <?php
                //obtener lista eventos
                
                $usuario = "root";
                $password = "root";
                $servidor = "localhost";
                $basededatos = "clubsocial";
                //imprimir lista eventos

                $conexion = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de datos");
                $db = mysqli_select_db( $conexion, $basededatos ) or die ( "No se ha podido conectar a la base de datos" );

            
                $consulta="SELECT `id`, `nombre`, `lugar`, `fecha`, `participantes`, `id_usuario_creador`,`hora` FROM `eventos` WHERE 1";

                $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

                /*while ($columna = mysqli_fetch_array( $resultado ))
	            {
                    echo($columna['nombre'].",".$columna['lugar'].",".$columna['fecha'].",".$columna['participantes'].",".$columna['id_usuario_creador'].",".$columna['hora']);
                    echo("<br/>");
                }*/


                while ($columna = mysqli_fetch_array( $resultado ))
	            {
                    echo("<div id='evento' class='evento'>");
                    echo("<p id='nombre_evento'>Nombre: ".$columna['nombre']."</p>");
                    echo("<p id='lugar_evento'>Lugar: ".$columna['lugar']."</p>");
                    echo("<p id='hora_evento'>Hora: ".$columna['hora']."</p>");
                    echo("<p id='fecha_evento'>Fecha: ".$columna['fecha']."</p>");
                    echo("<p id='participantes_evento'>Participantes: ".$columna['participantes']."</p>");
                    //echo("<button>Ver evento</button>");
                }




                //imprimir boton de evento si es presi

            ?>
      </div>
  </section>

</main>

<footer class="py-3 my-4 bg-secondary fixed-bottom ">
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
  </section>
  </body>
</html>