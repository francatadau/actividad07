<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conexion con la base de datos</title>
  </head>
  <body>
    <h1>Paises del mundo</h1>
    <!-- Esto es un link a nuestras otras paginas -->
    <a href="paisdos.php">Continente</a>
    <a href="independecia.php">Independecia</a>
    <br>
    <br>

    <?php
    //conector
    $conector = new mysqli("localhost", "root", "", "world");
    if ($conector->connect_errno) {
        echo "Fallo al conectar a MySQL: " . $conector->connect_error;
    }
//hacemos el query
    $resultado = $conector->query("SELECT Name,SurfaceArea FROM country WHERE Continent='South America' ORDER BY SurfaceArea DESC;");
  	//Cuantas filas nos devuelve
  	echo "El numero de paises es: ".$resultado->num_rows."<br><br>";
    //recorremos la base de datos
  	while($fila=$resultado->fetch_assoc()){
      //devolvemos los datos que pedimos de la base de datos
    	  echo "El pais es: <b>".$fila['Name']."</b><br>";
        echo "Su area es: <b>".$fila['SurfaceArea']."</b><br>";
        echo "<br>";
  	}

?>
  </body>
</html>
