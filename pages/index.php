<!doctype html>
<html lang="en">
  <head>
    <title>index</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
  <?php include '../css/index.css'; ?>
</style>
  </head>
 
 
<header>
  <nav class="navbar navbar-dark header">
      <div class="container">
          <a class="navbar-brand" href="#">CLUB SOCIAL</a>
          <button  class="myButton" onclick="window.location.href='../php/noticias.php'">Noticias</button>
          <button  class="myButton" onclick="window.location.href='pages/'">Instalaciones</button>
          <button  class="myButton" onclick="window.location.href='pages/'">Eventos</button>
          <button  class="myButton botonLogIn" onclick="window.location.href='login.html'">Log-In</button>
      </div>
  </nav>
</header>

<main>
  <section class="my-3">
      <div class="bg-light p-5 rounded">
          <div class="col-sm-8 mx-auto">
            
              <img src="../img/Club Social.png" alt="foto" >
          </div>
      </div>
  </section>
  <section class="my-3">
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src="../img/img1.gif" class="mx-auto d-block w-50" style="height: 50vh;"  alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-white">First slide label</h5>
            <p class="text-white">Some representative placeholder content for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src="../img/img2.jpg" class="mx-auto d-block w-50"  style="height: 50vh;" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-white">Second slide label</h5>
            <p class="text-white">Some representative placeholder content for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="../img/img3.jpg" class="mx-auto d-block w-50" style="height: 50vh;" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5 class="text-white">Third slide label</h5>
            <p class="text-white">Some representative placeholder content for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>
  <section class="my-3">
      <div class="bg-light p-5 rounded">
          <div class="col-sm-8 mx-auto">
              <h1>Section 3</h1>
          </div>
      </div>
  </section>
  <section>
      <div class="bg-light p-5 rounded">
          <div class="col-sm-8 mx-auto">
              <h1>...</h1>
          </div>
      </div>
  </section>
</main>

<footer class="py-3 my-4 bg-secondary">
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>