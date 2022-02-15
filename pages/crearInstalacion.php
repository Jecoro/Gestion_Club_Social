
<!doctype html>
<html lang="en">
  <head>
    <title>Crear Pista</title>
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
        <form  method="post" action="crearInstalacion.php">
        <p>  
        <label for="nombre">Nombre Pista:</label>  <input type="text" name="nombre" id="nombre" required>
        </p>
        <br/>
        <p>
        <label for="tipo">Tipo Pista:</label>  <select name="tipo" id="tipo" required>
            <option value="padel1">Padel 1</option>
            <option value="padel2">Padel 2</option>
            <option value="tenis1">Tenis 1</option>
            <option value="tenis2">Tenis 2</option>
            <option value="futbol">Futbol</option>
            <option value="baloncesto">Baloncesto</option>
            <option value="barbacoa">Barbacoa</option>
        </select>
        </p>
        <br/>
        <input type="Submit" name="Submit" id="Submit" value="Crear Pista">
    </form>
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

<?php
//obtener datos evento


$nombre=$_POST["nombre"];
$tipo=$_POST["tipo"];
//conexion base de datos evento
if(isset($_POST['Submit'])){
  



  switch($tipo){
    case "padel1":
        $precioPista=1;
        $precioNS=1.5;
        break;
    case "padel2":
        $precioPista=1;
        $precioNS=1.4;
        break;
    case "tenis1":
        $precioPista=1;
        $precioNS=1.6;
        break;
    case "tenis2":
        $precioPista=1;
        $precioNS=1.4;
        break;
    case "futbol":
        $precioPista=5;
        $precioNS=1;
        break;
    case "baloncesto":
        $precioPista=3;
        $precioNS=1;
        break;
    case "barbacoa":
        $precioPista=5;
        $precioNS=1;
        break;
  }
  //echo($tipo);
  //echo($precioPista);
  //echo($nombre);
  //echo($precioNS);
  insertaPista($tipo,$precioPista,$nombre,$precioNS);

}
?>    