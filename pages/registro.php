<!doctype html>
<html lang="en">
  <head>
    <title>Log-In</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
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
      <button class="myButton" onclick="window.location.href=''">Instalaciones</button>
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

<main>
  <section class="my-3">
    <div class="bg-light p-5 rounded">
      <form method="post" action="/registro.php" name="signin-form">
  
  
        <div class="form-element">
          <label>Nombre</label>
          <input type="text" name="name" pattern="[a-zA-Z0-9]+" required />
        </div>
  
        <div class="form-element">
          <label>Apellidos</label>
          <input type="text" name="surname" pattern="[a-zA-Z0-9]+" required />
        </div>
  
        <div class="form-element">
          <label>Fecha Nacimiento</label>
          <input type="date" name="fecnac" required />
        </div>
  
        <div class="form-element">
          <label>Dni</label>
          <input type="text" name="dni" "[0-9]{8}[A-Za-z]{1}" required />
        </div>
  
        <div class="form-element">
          <label>Telefono</label>
          <input type="number" name="telf" pattern="[0-9]{9}" required />
        </div>
  
        <div class="form-element">
          <label>Numero de Familiares</label>
          <input type="number" name="familiares" required />
        </div>
  
        <div class="form-element">
          <label>Email</label>
          <input type="email" name="email" size="20" required />
        </div>
        <div class="form-element">
          <label>Password</label>
          <input type="password" name="password" required />
        </div>
  
        <button type="submit"  class="myButton" name="login" value="login">Sing In</button>
      </form>
    </div>
  </section>

</main>


<footer class="py-3 my-4 bg-secondary ">
  <ul class="nav justify-content-center border-bottom pb-3 mb-3">
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Home</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Features</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Contact</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-white">About</a></li>
  </ul>
  <p class="text-center text-white">© 2021 Company, Inc</p>
</footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</body>

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

</html>




