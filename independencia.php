<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conexion con la base de datos</title>
  </head>
  <body>
    <h1>Paises del mundo</h1>
<!-- Esto es un link a nuestras otras paginas -->
  <a href="paisuno.php">Superficie</a>
  <a href="paisdos.php">Continente</a>
  <br>
  <br>

    <?php
    //conector
    $conector = new mysqli("localhost", "root", "", "world");
    if ($conector->connect_errno) {
        echo "Fallo al conectar a MySQL: " . $conector->connect_error;
    }
//hacemos el query
    $resultado = $conector->query("SELECT Name,IndepYear FROM country ;");
  	//Cuantas filas nos devuelve
  	echo "El numero de paises es: ".$resultado->num_rows."<br><br>";
    //recorremos la base de datos
  	while($fila=$resultado->fetch_assoc()){
    	  echo "El pais es: <b>".$fila['Name']."</b><br>";
        echo "Su año de independencia es: <b>".$fila['IndepYear']."</b>";
    //si en la base de datos, IndepYear esta vacio, nos saldra un mensaje.
        if ($fila['IndepYear']==null) {
            echo "<b>NO INDEPENDIZADO</b>";
        }

        echo "<br><br>";
  	}





?>
  </body>
</html>
