<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar Eventos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
  </head>
  <style>
  <?php include '../css/index.css';
        include '../css/bootstrap.min.css';
  ?>
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
        <a class="navbar-brand" href="#">CLUB SOCIAL</a>
        <button class="myButton" onclick="window.location.href='noticias.php<?php echo('/?id_socio='.$id)  ?>'">Noticias</button>
        <button class="myButton" onclick="window.location.href='instalaciones.php<?php echo('/?id_socio='.$id)  ?>'">Instalaciones</button>
        <button class="myButton" onclick="window.location.href='eventos.php<?php echo('/?id_socio='.$id)  ?>'">Eventos</button>
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
      <form method="post" action="">
    
        <fieldset>
            <select id="id" name="id" required>
                <?php 
                 include_once "databaseManagement.inc.php";
                 $datos=obtenerEventos();
                    
                    for ($i=0; $i <count($datos) ; $i++) { 
                  
                     echo "<option value=".$datos[$i]["id"].">".$datos[$i]["nombre"]."</option><br>";
                 
                    }
                ?>

            </select>    
            <p>
                <label> Nuevo Nombre
                <input type="text" id= "nNombre"name="nNombre" required/>
            </label>
            </p>
            <p>
                <label> Nuevo lugar:
                    <textarea id="nLugar" name="nLugar" rows="10" cols="40" required></textarea>
            </label>
            </p>
            <p>
            <label> Fecha:<input type="date" name="fecha_evento" id=""></label>
            </p>
            <p>
            <label>Hora:<input type="text" name="hora_evento" id=""></label>
            </p>
            <p><input type="submit" name="submit" value="Editar"></p>

        </fieldset>

    </form>
      </div>
  </section>

</main>

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
  </section>
  </body>
  
  <?php 
    

 include_once "databaseManagement.inc.php";

 if(isset($_POST["submit"])){
    $id=$_POST["id"];
    $nNombre= $_POST["nNombre"];
    $nLugar=$_POST["nLugar"];
    $date=date("d-m-Y");
    $hora=date( "H:i");
    $servidor = "localhost";
    $baseDatos = "clubsocial";
    $usuario = "root";
    $pass = "root";
    
    $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
    
       $query = $con->prepare("SELECT * FROM eventos WHERE id =$id;");
       $query->execute();
       $miArray=[];
       while ($row = $query->fetch(PDO::FETCH_ASSOC)) { //Haciendo uso de PDO iremos creando el array dinámicamente
          
          $miArray[] = $row; //https://www.it-swarm-es.com/es/php/rellenar-php-array-desde-while-loop/972445501/
      }
    editarEvento($id,$nNombre,$nLugar,$date,$miArray[0]["participantes"],$miArray[0]["id_usuario_creador"],$hora);

}

?>
</html>