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
          <a class="navbar-brand" href="../index.html">CLUB SOCIAL</a>
          <button  class="myButton" onclick="window.location.href=''">Noticias</button>
          <button  class="myButton" onclick="window.location.href=''">Instalaciones</button>
          <button  class="myButton" onclick="window.location.href=''">Eventos</button>
          <button  class="myButton botonLogIn" onclick="window.location.href='login.html'">Log-In</button>
      </div>
  </nav>
</header>

<main>
  <section class="my-3">
      <div class="bg-light p-5 rounded">
      <form method="post" action="insertarNoticias.php">
        <fieldset>
            <p>
                <label> Titular de la Noticia
                <input type="text" id= "titular"name="titular" required />
            </label>
            </p>
            <p>
                <label> Contenido de la Noticia:
                    <textarea id="contenido" name="contenido" rows="10" cols="40"></textarea>
            </label>
            </p>
            <p>
                <label> Noticia privada:
                <input type="checkbox" id= "privacidad"name="privacidad"/>
            </label>
            </p>

            <p><input type="submit" class="myButton" value="Crear"></p>

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


if(isset($_POST['titular']) && isset($_POST['contenido'])){
    $titulo = utf8_decode($_POST['titular']);
    $contenido = utf8_decode($_POST['contenido']);
    if(!isset($_POST['privacidad'])){
        $privacidad=0;
    }else{
        $privacidad = ($_POST['privacidad']);
    }
    $fecha=date("d-m-Y H:i");
    insertaNoticia($titulo,$contenido,$fecha,$privacidad);
}

?>
</html>















 