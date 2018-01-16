<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Conexion con la base de datos</title>
  </head>
  <body>
    <h1>Paises del mundo</h1>
    <?php
    $conector = new mysqli("localhost", "root", "", "world");
    if ($conector->connect_errno) {
        echo "Fallo al conectar a MySQL: " . $conector->connect_error;
    }

    $resultado = $conector->query("SELECT Name,SurfaceArea FROM country WHERE Continent='South America' ORDER BY SurfaceArea DESC;");
  	//Cuantas filas nos devuelve
  	echo "El numero de paises es: ".$resultado->num_rows."<br><br>";
  	while($fila=$resultado->fetch_assoc()){
    	  echo "El pais es: <b>".$fila['Name']."</b><br>";
        echo "Su area es: <b>".$fila['SurfaceArea']."</b><br>";
        echo "<br>";
  	}

?>
  </body>
</html>
