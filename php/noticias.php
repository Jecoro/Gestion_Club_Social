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
  <style>
  <?php include '../css/index.css'; ?>
</style>
  <body>
 <section class="cuerpo">
<header>
  <nav class="navbar navbar-dark header">
      <div class="container">
          <a class="navbar-brand" href="../pages/index.php">CLUB SOCIAL</a>
          <button  class="myButton" onclick="window.location.href=''">Noticias</button>
          <button  class="myButton" onclick="window.location.href=''">Instalaciones</button>
          <button  class="myButton" onclick="window.location.href=''">Eventos</button>
          <button  class="myButton botonLogIn" onclick="window.location.href='../pages/login.html'">Log-In</button>
      </div>
  </nav>
</header>

<main>
  <section class="my-3">
      <div class="bg-light p-5 rounded">
      <?php 
  $servidor = "localhost";
  $baseDatos = "clubsocial";
  $usuario = "root";
  $pass = "root";
  
  $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
  
     $query = $con->prepare("SELECT * FROM noticias WHERE privacidad =0;");
     $query->execute();
     $miArray=[];
     while ($row = $query->fetch(PDO::FETCH_ASSOC)) { //Haciendo uso de PDO iremos creando el array dinámicamente
        
        $miArray[] = $row; //https://www.it-swarm-es.com/es/php/rellenar-php-array-desde-while-loop/972445501/
    }
    
    foreach ($miArray as $valores):
        
         echo '<div class= "divnoticia"><h3> '.$valores["titular"].'</h3><hr><br><p>'.$valores["content"].'</p><br><p>'.$valores["fecha"].'</p></div>';
    endforeach;
    

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
    











 
