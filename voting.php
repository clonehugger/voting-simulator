<HTML>
<meta charset="UTF-8">
<HEAD>
   <TITLE>Formulario Único</TITLE>
    <STYLE>
        td {
         width: 10em;
        }

        .container {
         position: relative;
            width: 100%;
        }

        .bar {
         position: absolute;        
        }
    </STYLE>
</HEAD>
    
<BODY>
    
        
<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
   {
        echo "<h2>Voto registrado</h2>";
        echo "<br>Tu voto ha sido registrado, gracias por participar.";
            
      if(strlen(trim($_POST["texto"]))<4)
			$errores["texto"] = "La palabra debe ser de 4 a 8 caracteres";
        $color = "";
        if($_POST["opc"]=="yellow") $color = "AMARILLO";
        if($_POST["opc"]=="blue") $color = "AZUL";
        if($_POST["opc"]=="purple") $color = "MORADO";
        if($_POST["opc"]=="green") $color = "VERDE";
        if($_POST["opc"]=="grey") $color = "OTRO";
        
        $server = "localhost";
        $user = "web";
        $pass ="test";
        $dbase ="practiceweb";

        $conexion = mysqli_connect($server, $user, $pass, $dbase) or die ("Error de conexión ".mysqli_connect_error());
        
        $query = "SELECT sum(votos) FROM votos";
        $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());
        $row = mysqli_fetch_row($result);
        $total = $row[0]+1;

        $query = "UPDATE votos SET votos=votos+1 WHERE partido LIKE '".$color."'";
        $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());
        
        $query = "UPDATE votos SET porcentaje=100*votos/".$total;
        $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

        
        mysqli_close($conexion);   
        
 		
   }
?>
    
<?php
    if (isset($_GET['results'])) {
    
    $server = "localhost";
    $user = "web";
    $pass ="test";
    $dbase ="practiceweb";
    
    $conexion = mysqli_connect($server, $user, $pass, $dbase) or die ("Error de conexión ".mysqli_connect_error());

    $query = "SELECT * FROM votos";
    $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());
    ?>
        
      <h3>Resultados al momento</h3>
         
<?php   
    // Print the column names as the headers of a table
    $index=[];
    echo "<table border = 0 ><tr>";
    for($i = 0; $i < mysqli_num_fields($result); $i++) {
        $field_info = mysqli_fetch_field($result);
        $index[$i]= $field_info->name;
        echo "<th>".$index[$i]."</th>";
    }

    // Print the data
    $i=0;
    while($row = mysqli_fetch_row($result)) {
        echo "<tr>";
        $color = "";
        $perc = 0;
        foreach($row as $value) {
            if(($index[$i]) == 'partido') {
                if($value == "AMARILLO") $color="yellow";
                if($value == "AZUL") $color="blue";
                if($value == "MORADO") $color="purple";
                if($value == "VERDE") $color="green";
                if($value == "OTRO") $color="grey"; 
            }
            if(($index[$i]) == 'porcentaje') $perc = $value;
            if(($index[$i]) == 'tendencia'){
                
                echo "<td><div class='container'><div class='bar' style='width:{$perc}%;background-color:{$color}'>.</div></div></td>";
            }else
            echo "<td>{$value}</td>";
            $i++;
        }
        echo "</tr>";
        $i=0;
    }

    echo "</table>";
        
    $query = "SELECT sum(votos) FROM votos";
    $result = mysqli_query($conexion, $query) or die ("Error de consulta ".mysqli_error());

    $row = mysqli_fetch_row($result);
    echo "<br>Total de votos emitidos: ".$row[0];    
    echo "<br><a href='partidos.php'>Volver a votaciones</a>";
        
    mysqli_close($conexion);
    return;    
    }
?>    
    
   <h2>Encuesta</h2>
   <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>?results=1">
   ¿Por qué partido político votarás en las elecciones? <br>
   <input type="radio" name="opc" value="yellow" required> Partido AMARILLO<br>
   <input type="radio" name="opc" value="blue"> Partido AZUL<br>
   <input type="radio" name="opc" value="purple"> Partido MORADO<br>
   <input type="radio" name="opc" value="green"> Partido VERDE<br>
   <input type="radio" name="opc" value="grey"> OTRO<br>
   <input type="submit" value="Votar"><br>
   </form>
   
    <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>?results=1">Ver resultados</a>
    
</BODY>
</HTML>




