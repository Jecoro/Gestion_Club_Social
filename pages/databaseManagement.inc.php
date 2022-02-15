<?php
$servidor = "127.0.0.1";
$baseDatos = "clubsocial";
$usuario = "root";
$password = "root";


try {
    $connection = new PDO("mysql:host=".$servidor.";dbname=".$baseDatos, $usuario, $password);
    
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}


function obtenerUsuario($email){
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
        /*
        La clase PDOStatement es la que trata las sentencias SQL. 
        Una instancia de PDOStatement se crea cuando se llama a PDO->prepare(), 
        y con ese objeto creado se llama a métodos como bindParam() para pasar valores o execute() para ejecutar sentencias. 
        PDO facilita el uso de sentencias preparadas en PHP, que mejoran el rendimiento y la seguridad de la aplicación. 
        Cuando se obtienen, insertan o actualizan datos, el esquema es: PREPARE -> [BIND] -> EXECUTE. 
        Se pueden indicar los parámetros en la sentencia con un interrogante "?" o mediante un nombre específico.
        */
        $sql = $con->prepare("SELECT * from usuarios where email=:email");
        $sql->bindParam(":email", $email); //Para evitar inyecciones SQL
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC); //Recibimos la linea correspondiente en ROW
        $con = null; //Cerramos la conexión
        if($row!=null){
            return true;
        }else{
            return false;
        }
        
    } catch (PDOException $e) {
        echo $e;
    }
}
function obtenerUsuarios(){
    
    try {
           $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
          $sql = $con->prepare("SELECT * from usuarios;");
          $sql->execute();
          $miArray = [];
           while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { //Haciendo uso de PDO iremos creando el array dinámicamente
               $miArray[] = $row; //https://www.it-swarm-es.com/es/php/rellenar-php-array-desde-while-loop/972445501/
           }
       } catch (PDOException $e) {
           echo $e;
       }
      $con = null;
      return $miArray;
}
function activarUsuario($id)
{
    $retorno = false;
    $fecha=date("d-m-Y H:i");
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
        $sql = $con->prepare("UPDATE usuarios  set esSocio=1 where id_socio=:id;");
        $sql->bindParam(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $retorno;
}


function eliminarUsuario($id){
    $retorno = false;
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['pass']);
        $sql = $con->prepare("DELETE from usuarios where id=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $retorno;
}

function insertaUsuario($pass,$nombre,$apellidos,$telefono,$fechanac,$email, $dni,$familiares,$cuota){
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
        $sql = $con->prepare("INSERT into usuarios values(null,:pass,:nombre,:apellidos,:telefono,:fechanac,:email,:dni,false,false,:familiares,:cuota)");
        $sql->bindParam(":pass", $pass);
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":apellidos", $apellidos);
        $sql->bindParam(":telefono", $telefono);
        $sql->bindParam(":fechanac", $fechanac);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":dni", $dni);
        $sql->bindParam(":familiares", $familiares);
        $sql->bindParam(":cuota", $cuota);
        $sql->execute();
        $id = $con->lastInsertId();
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $id;
}

function insertaNoticia($titular,$contenido,$fecha,$privacidad){
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
        $sql = $con->prepare("INSERT into noticias values(null,:titular,:content,:fecha,:privacidad)");
        $sql->bindParam(":titular", $titular);
        $sql->bindParam(":content", $contenido);
        $sql->bindParam(":fecha", $fecha);
        $sql->bindParam(":privacidad", $privacidad);
        $sql->execute();
        $id = $con->lastInsertId();
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $id;
}


function obtenerNoticias(){
    
    try {
           $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
          $sql = $con->prepare("SELECT id_noticia, titular from noticias;");
          $sql->execute();
          $miArray = [];
           while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { //Haciendo uso de PDO iremos creando el array dinámicamente
               $miArray[] = $row; //https://www.it-swarm-es.com/es/php/rellenar-php-array-desde-while-loop/972445501/
           }
       } catch (PDOException $e) {
           echo $e;
       }
      $con = null;
      return $miArray;
}

function editarNoticia($id, $titular, $contenido, $privacidad)
{
    $retorno = false;
    $fecha=date("d-m-Y H:i");
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
        $sql = $con->prepare("UPDATE noticias  set titular=:titular, content=:content, fecha=:fecha, privacidad=:privacidad where id_noticia=:id_noticia;");
        $sql->bindParam(":id_noticia", $id);
        $sql->bindParam(":titular", $titular);
        $sql->bindParam(":content", $contenido);
        $sql->bindParam(":fecha", $fecha);
        $sql->bindParam(":privacidad", $privacidad);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $retorno;
}

function obtenerNoticia($id){
    
    try {
           $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
          $sql = $con->prepare("SELECT id_noticia, titular from noticias where id_noticia= :id;");
          $sql->bindParam(":id", $id);
          $sql->execute();
          $row = $sql->fetch(PDO::FETCH_ASSOC); //Recibimos la linea correspondiente en ROW
        $con = null; //Cerramos la conexión
        if($row!=null){
            return true;
        }else{
            return false;
        }
           
       } catch (PDOException $e) {
           echo $e;
       }
      $con = null;
      
}

function borrarNoticia($id){
    
  
    try{
          $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
          $sql = $con->prepare("DELETE from noticias where id_noticia= :id");
          $sql->bindParam(":id", $id);
          $sql->execute();
                      
          if(!obtenerNoticia($id)){
            echo "<script type='text/javascript'>
                    alert('Noticia Borrrada Correctamente');
                  </script>";
            
          }
           
        
    }catch (PDOException $e) {
        echo $e;
    }
   
}

function obtenerEventos(){
    
    try {
           $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
          $sql = $con->prepare("SELECT id,nombre from eventos;");
          $sql->execute();
          $miArray = [];
           while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { //Haciendo uso de PDO iremos creando el array dinámicamente
               $miArray[] = $row; //https://www.it-swarm-es.com/es/php/rellenar-php-array-desde-while-loop/972445501/
           }
       } catch (PDOException $e) {
           echo $e;
       }
      $con = null;
      return $miArray;
}

function obtenerEvento($id){
    
    try {
           $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
          $sql = $con->prepare("SELECT id, nombre from eventos where id= :id;");
          $sql->bindParam(":id", $id);
          $sql->execute();
          $row = $sql->fetch(PDO::FETCH_ASSOC); //Recibimos la linea correspondiente en ROW
        $con = null; //Cerramos la conexión
        
        
           
       } catch (PDOException $e) {
           echo $e;
       }
      $con = null;
      return $row;
}
function borrarEvento($id){
    
  
    try{
          $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
          $sql = $con->prepare("DELETE from eventos where id= :id");
          $sql->bindParam(":id", $id);
          $sql->execute();
                      
          if(!obtenerEvento($id)){
            echo "<script type='text/javascript'>
                    alert('Evento Borrrado Correctamente');
                  </script>";
            
          }
           
        
    }catch (PDOException $e) {
        echo $e;
    }
   
}

function editarEvento($id, $nombre, $lugar, $fecha,$participantes,$id_usuario_creador,$hora){   
    
    $retorno = false;
    $fecha=date("d-m-Y H:i");
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
        $sql = $con->prepare("UPDATE eventos  set nombre=:nombre, lugar=:lugar,fecha=:fecha,participantes=:participantes,id_usuario_creador=:id_usuario_creador,hora=:hora where id=:id;");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":lugar", $lugar);
        $sql->bindParam(":fecha", $fecha);
        $sql->bindParam(":participantes", $participantes);
        $sql->bindParam(":id_usuario_creador", $id_usuario_creador);
        $sql->bindParam(":hora", $hora);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $retorno;
}

function obtenerPista($id){
    
    try {
           $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
          $sql = $con->prepare("SELECT id_pista, nombre_pista from instalaciones where id= :id_pista;");
          $sql->bindParam(":id_pista", $id);
          $sql->execute();
          $row = $sql->fetch(PDO::FETCH_ASSOC); //Recibimos la linea correspondiente en ROW
        $con = null; //Cerramos la conexión
        
        
           
       } catch (PDOException $e) {
           echo $e;
       }
      $con = null;
      return $row;
}

function obtenerPistas(){
    
    try {
           $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
          $sql = $con->prepare("SELECT id_pista, nombre_pista from instalaciones;");
          $sql->execute();
          $miArray = [];
           while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { //Haciendo uso de PDO iremos creando el array dinámicamente
               $miArray[] = $row; //https://www.it-swarm-es.com/es/php/rellenar-php-array-desde-while-loop/972445501/
           }
       } catch (PDOException $e) {
           echo $e;
       }
      $con = null;
      return $miArray;
}
function borrarPista($id){
    
  
    try{
          $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
          $sql = $con->prepare("DELETE from instalaciones where id_pista= :id_pista");
          echo $id;
          $sql->bindParam(":id_pista", $id);
          $sql->execute();
                      
          if(!obtenerPista($id)){
            echo "<script type='text/javascript'>
                    alert('Pista Borrrada Correctamente');
                  </script>";
            
          }
           
        
    }catch (PDOException $e) {
        echo $e;
    }
   
}
function insertaPista($tipo,$precio_pista,$nombre_pista,$precio_noSocio){
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
        $sql = $con->prepare("INSERT into instalaciones values(null,:tipo,:precio_pista,:nombre_pista,:precio_noSocio)");
        $sql->bindParam(":tipo", $tipo);
        $sql->bindParam(":precio_pista", $precio_pista);
        $sql->bindParam(":nombre_pista", $nombre_pista);
        $sql->bindParam(":precio_noSocio", $precio_noSocio);
        $sql->execute();
        $id = $con->lastInsertId();
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    
}

?>