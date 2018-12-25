<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    require_once("conexiones.php");

    if (isset($_GET['tipo_clasificacion'])) {
        $tipo_clasificacion = $_GET['tipo_clasificacion'];
        $_SESSION['tipo_clasificacion'] = $_GET['tipo_clasificacion'];
    } else {
        $tipo_clasificacion = $_SESSION['tipo_clasificacion'];
    }

    if (isset($_GET['IdCategoria'])) {
        $categoria = $_GET['IdCategoria'];
        $_SESSION['IdCategoria'] = $_GET['IdCategoria'];
    } else {
        $categoria = $_SESSION['IdCategoria'];
    }

    $jornada=0;
    if (isset($_GET['Jornada'])) {
        $jornada = $_GET['Jornada'];
    }

    if (isset($_GET['jornadaClas'])) {
        $jornada = $_GET['jornadaClas'];
    }

    //Borrar la clasificacion anterior
    $query = "delete from clasificacion where IdCategoria=" . $categoria;
    mysqli_query($link, $query);

    //Llamamos a la creaci�n de la clasificacion
    $equipossancionados = setClasificacion($jornada, $tipo_clasificacion, $categoria, $link);

    //Query
    $query = "select * from clasificacion where IdCategoria=" . $categoria . " and IdEquipo!=9999 order by Puntos desc, Golaverage desc, GolesFavor desc, GolesContra asc, Ganados desc, Empatados desc, Perdidos desc";
    $q=mysqli_query ($link, $query);

    //Obtener el numero de filas devuelto
    $filas = mysqli_num_rows($q);

    $tipo = 2;
    if ($tipo_clasificacion == 0 && !isset($_GET["recarga"])) {
        include("inc_jornada_cabecera.php");
    }
?>
    <div id="cargando_clasificacion">
<?php
    if ($tipo_clasificacion==0)
    {
        if (!empty($jornada))
        {
?>
            <h6 class="text-center"><?= _HASTAJORNADA." ".$jornada ?></h6>
<?php 
        }
        print ("<p>");
    }

    if ($tipo_clasificacion==1)
    {
?>
		<h3 class="text-center"><?= cambiarAcentos(_PARTIDOSCASA) ?></h3>
<?php 
    }
    else if ($tipo_clasificacion==2)
    {
?>
   		<h3 class="text-center"><?= cambiarAcentos(_PARTIDOSFUERA) ?></h3>
<?php
    }
    else if ($tipo_clasificacion==3)
    {
?>
		<h3 class="text-center"><?= cambiarAcentos(_PARTIDOS1VUELTA) ?></h3>
<?php
    }
    else if ($tipo_clasificacion==4)
    {
?>
   		<h3 class="text-center"><?= cambiarAcentos(_PARTIDOS2VUELTA) ?></h3>
<?php
    }
?>
	
	<table class="table table-bordered">
   		<thead class="thead-dark">
	   		<tr class="d-flex">
	   			<th class="col-1 text-center"><?= cambiarAcentos(_POSICION) ?></th>  <!-- Posicion  -->
	   			<th class="col-3 text-center"><?= cambiarAcentos(_EQUIPO) ?></th>  <!-- Nombre equipo  -->
	   			<th class="col-1 text-center">&nbsp;</th> <!-- Grafica  -->
	   			<th class="col-1 text-center"><?= cambiarAcentos(_PUNTOS) ?></th> <!-- Puntos  -->
	   			<th class="col-1 text-center"><?= cambiarAcentos(_JUGADOS) ?></th> <!-- Jugados  -->
	   			<th class="col-1 text-center"><?= cambiarAcentos(_GANADOS) ?></th> <!-- Ganados  -->
	   			<th class="col-1 text-center"><?= cambiarAcentos(_EMPATADOS) ?></th> <!-- Empatados  -->
	   			<th class="col-1 text-center"><?= cambiarAcentos(_PERDIDOS) ?></th> <!-- Perdidos  -->
	   			<th class="col-1 text-center"><?= cambiarAcentos(_GF) ?></th> <!-- GF  -->
	   			<th class="col-1 text-center"><?= cambiarAcentos(_GC) ?></th> <!-- GC  -->
   			</tr>  
   		</thead>
  

<?php 
        $query="Select * from categoria where IdCategoria=".$categoria;
        $qcategoria=mysqli_query ($link, $query);
        $rowcategoria=mysqli_fetch_array($qcategoria);

        for ($x=0; $x < $filas; $x++)
        {
            $colores[$x]="<tr class=\"d-flex\">";
        } 

        $totalsuben=0;
        $cuentasuben=$rowcategoria["Suben"];
        for ($x=0; $x < $cuentasuben; $x++)
        {
            $colores[$x]="<tr class=\"bg-primary d-flex\">";
            $totalsuben++;
        }
        $totalpromocionan=$totalsuben;
        $cuentapromocionan=$rowcategoria["Promocionan"];
        for ($x=0; $x < $cuentapromocionan; $x++)
        {
            $colores[$totalpromocionan]="<tr class=\"table-warning d-flex\">";
            $totalpromocionan++;
        }
        $totalbajan=$filas-1;
        $cuentabajan=$rowcategoria["Bajan"];
        for ($x=0; $x < $cuentabajan; $x++)
        {
            $colores[$totalbajan]="<tr class=\"table-danger d-flex\">";
            $totalbajan--;
        }

        //Mostrar los valores de la base de datos
        $x=0;
        while($clasificacion=mysqli_fetch_array($q, MYSQLI_BOTH))
        {
            $query="Select * from equipos where IdEquipo=".$clasificacion["IdEquipo"];
            $qequipo=mysqli_query ($link, $query);
            $rowequipo=mysqli_fetch_array($qequipo);
            
            $nombreEquipo = cambiarAcentos($rowequipo["NombreEquipo"])." '".$clasificacion["SubCategoria"]."'";
            $partidosGanados = $clasificacion["Ganados"];
            $partidosEmpatados = $clasificacion["Empatados"];
            $partidosPerdidos = $clasificacion["Perdidos"];

            print($colores[$x]);
?>
            <td class="col-1 text-center"><?= ($x+1) ?></td>
            <td class="col-3"><?= cambiarAcentos($rowequipo["NombreEquipo"])." '".$clasificacion["SubCategoria"]."'" ?></td>
            <td class="col-1 text-center">
            	<?php include("inc_grafica_modal.php"); ?>
            </td>
			<td class="col-1 text-center"><?= $clasificacion["Puntos"] ?></td>
			<td class="col-1 text-center"><?= $clasificacion["Jugados"] ?></td>
			<td class="col-1 text-center"><a href="javascript:llamada_prototype('paginas/estadisticas.php?equipo=<?= $clasificacion["IdEquipo"] ?>&SubCategoria=<?= $clasificacion["SubCategoria"] ?>&tipoclasificacion=<?= $tipo_clasificacion ?>&tipo=1&IdCategoria=<?= $categoria ?>&Jornada=<?= $jornada ?>','principal')"><?= $clasificacion["Ganados"] ?></a></td>
			<td class="col-1 text-center"><a href="javascript:llamada_prototype('paginas/estadisticas.php?equipo=<?= $clasificacion["IdEquipo"] ?>&SubCategoria=<?= $clasificacion["SubCategoria"] ?>&tipoclasificacion=<?= $tipo_clasificacion ?>&tipo=0&IdCategoria=<?= $categoria ?>&Jornada=<?= $jornada ?>','principal')"><?= $clasificacion["Empatados"] ?></a></td>
			<td class="col-1 text-center"><a href="javascript:llamada_prototype('paginas/estadisticas.php?equipo=<?= $clasificacion["IdEquipo"] ?>&SubCategoria=<?= $clasificacion["SubCategoria"] ?>&tipoclasificacion=<?= $tipo_clasificacion ?>&tipo=2&IdCategoria=<?= $categoria ?>&Jornada=<?= $jornada ?>','principal')"><?= $clasificacion["Perdidos"] ?></a></td>
			<td class="col-1 text-center"><?= $clasificacion["GolesFavor"] ?></td>
			<td class="col-1 text-center"><?= $clasificacion["GolesContra"] ?></td>
        </tr>
<?php 
        $x++;
    }
?>    
    </table>

<?php 
    if ($tipo_clasificacion==0)
    {
?>
        <p>
        <table class="table col-4">
<?php 
        if ($rowcategoria["Suben"]>0)
        {
?>
            </td></tr><tr class="bg-primary">
            <td><?= cambiarAcentos(_ASCIENDE)." ".cambiarAcentos($rowcategoria["Ascenso"]) ?>
<?php 
        }
        if ($rowcategoria["Promocionan"]>0)
        {
?>
            </td></tr><tr class="table-warning">
            <td><?= cambiarAcentos(_PROMOCIONA)." ".cambiarAcentos($rowcategoria["Ascenso"]) ?>
<?php 
        }
        if ($rowcategoria["Bajan"]>0)
        {
?>
            </td></tr><tr class="table-danger">
            <td><?= cambiarAcentos(_DESCIENDE)." ".cambiarAcentos($rowcategoria["Descenso"]) ?>
<?php 
        }
?>
        </td></tr>
    	</table>
<?php 
    $contarsancionados=count($equipossancionados);
    for ($x=0;$x<$contarsancionados;$x++)
    {
?>
        <br><?= cambiarAcentos($equipossancionados[$x][0].": "._SANCION.$equipossancionados[$x][1]." ".strtolower(_PUNTOS)) ?>
<?php
    }
}

?>
    </div>
<?php
    if ($tipo_clasificacion==0)
    {
        $tipo_clasificacion_bbdd="0";
    }
    else if ($tipo_clasificacion==1)
    {
        $tipo_clasificacion_bbdd="110";
    }
    else if ($tipo_clasificacion==2)
    {
        $tipo_clasificacion_bbdd="120";
    }
    else if ($tipo_clasificacion==3)
    {
        $tipo_clasificacion_bbdd="130";
    }
    else if ($tipo_clasificacion==4)
    {
        $tipo_clasificacion_bbdd="140";
    }

    if (empty($jornada))
    {
        $jornada="0";
    }

    $jornada_equipo=$tipo_clasificacion_bbdd."-".$categoria."-".$jornada;
    if (!isset($_SESSION["admin_web"]))
    {
        //Query para insertar los valores en la base de datos
        $query="insert into paginasvistas (IP,Hora,Fecha,Pagina,JornadaEquipo) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",\"".$jornada_equipo."\")";
        mysqli_query($link, $query);
    }
?>