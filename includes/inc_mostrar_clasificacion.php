<?php
    //session_start();
    //$nueva_ruta = $_SESSION["ruta"];
    //$nueva_ruta_sevidor = $_SESSION["rutaservidor"];
    /*if (file_exists("../conf/funciones.php")) {
        require_once("../conf/funciones.php");
        //idiomaPagina();
        require_once("../conf/traduccion.php");
        require_once("../conf/conexion.php");
        $link = Conectarse();
    }*/
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
    $rowclasificacion=mysqli_fetch_array($q);

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
                print ("<h3><center>"._HASTAJORNADA." ".$jornada."</center></h3>");
            }
            print ("<p>");
        }

        if ($tipo_clasificacion==1)
        {
            print ("<h3><center>".cambiarAcentos(_PARTIDOSCASA)."</center></h3>");
        }
        else if ($tipo_clasificacion==2)
        {
            print ("<h3><center>".cambiarAcentos(_PARTIDOSFUERA)."</center></h3>");
        }
        else if ($tipo_clasificacion==3)
        {
            print ("<h3><center>".cambiarAcentos(_PARTIDOS1VUELTA)."</center></h3>");
        }
        else if ($tipo_clasificacion==4)
        {
            print ("<h3><center>".cambiarAcentos(_PARTIDOS2VUELTA)."</center></h3>");
        }

        print ("<table class=clasificacion>");
        print ("<tr>");
        print ("<th><center>".cambiarAcentos(_POSICION)."</th>"); //Nombre equipo
        print ("<th><center>"._EQUIPO."</th>"); //Nombre equipo
        print ("<th><center></th>"); //Grafica
        print ("<th><center>"._PUNTOS."</th>"); //Puntos
        print ("<th><center>"._JUGADOS."</th>"); //Jugados
        print ("<th><center>"._GANADOS."</th>"); //Ganados
        print ("<th><center>"._EMPATADOS."</th>"); //Empatados
        print ("<th><center>"._PERDIDOS."</th>"); //Perdidos
        print ("<th><center>"._GF."</th>"); //Goles a favor
        print ("<th><center>"._GC."</th>"); //Goles en contra
        print ("</tr>");

        $query="Select * from categoria where IdCategoria=".$categoria;
        $qcategoria=mysqli_query ($link, $query);
	$rowcategoria=mysqli_fetch_array($qcategoria);

        for ($x=0; $x < $filas; $x++)
        {
            $colores[$x]="<tr>";
        } 

        $totalsuben=0;
        $cuentasuben=$rowcategoria["Suben"];
        for ($x=0; $x < $cuentasuben; $x++)
        {
        $colores[$x]="<tr class=sube>";
        $totalsuben++;
        }
        $totalpromocionan=$totalsuben;
        $cuentapromocionan=$rowcategoria["Promocionan"];
        for ($x=0; $x < $cuentapromocionan; $x++)
        {
        $colores[$totalpromocionan]="<tr class=promociona>";
        $totalpromocionan++;
        }
        $totalbajan=$filas-1;
        $cuentabajan=$rowcategoria["Bajan"];
        for ($x=0; $x < $cuentabajan; $x++)
        {
        $colores[$totalbajan]="<tr class=desciende>";
        $totalbajan--;
        }

        //Mostrar los valores de la base de datos
        while($clasificacion=mysqli_fetch_array($q, MYSQLI_BOTH))
        {
        $query="Select * from equipos where IdEquipo=".$clasificacion["IdEquipo"];
        $qequipo=mysqli_query ($link, $query);
    	$rowequipo=mysqli_fetch_array($qequipo);

        print($colores[$x]);

        print("<td width=5%><center>".($x+1)."</td>");
        print("<td width=20%>".cambiarAcentos($rowequipo["NombreEquipo"])." '".$clasificacion["SubCategoria"]."'</td>");
        print("<td width=5%><center>");
        $coords="?idequipo=".$clasificacion["IdEquipo"]."&tipoclasificacion=".$tipo_clasificacion."&Jornada=".$jornada."&IdCategoria=".$categoria;
        ?>
        <a href="graficas/index.php<?= $coords ?>" 
           onclick="return GB_showCenter('<?= cambiarAcentos(_GRAFICA) ?>', this.href, 500, 550)"
           title="<?= cambiarAcentos(_GRAFICA) ?>">
            <img src="graficas/icono_grafica.gif" alt="<?= cambiarAcentos(_GRAFICA) ?>" title="<?= cambiarAcentos(_GRAFICA) ?>" border="0">
        </a>
        <?php
        print("</td>");
        print("<td width=10%><center>".$clasificacion["Puntos"]."</td>");
        print("<td width=10%><center>".$clasificacion["Jugados"]."</td>");
        print("<td width=10%><center><a href=javascript:llamada_prototype('paginas/estadisticas.php?equipo=".$clasificacion["IdEquipo"]."&SubCategoria=".$clasificacion["SubCategoria"]."&tipoclasificacion=".$tipo_clasificacion."&tipo=1&IdCategoria=".$categoria."&Jornada=".$jornada."','principal')>".$clasificacion["Ganados"]."</a></td>");
        print("<td width=10%><center><a href=javascript:llamada_prototype('paginas/estadisticas.php?equipo=".$clasificacion["IdEquipo"]."&SubCategoria=".$clasificacion["SubCategoria"]."&tipoclasificacion=".$tipo_clasificacion."&tipo=0&IdCategoria=".$categoria."&Jornada=".$jornada."','principal')>".$clasificacion["Empatados"]."</a></td>");
        print("<td width=10%><center><a href=javascript:llamada_prototype('paginas/estadisticas.php?equipo=".$clasificacion["IdEquipo"]."&SubCategoria=".$clasificacion["SubCategoria"]."&tipoclasificacion=".$tipo_clasificacion."&tipo=2&IdCategoria=".$categoria."&Jornada=".$jornada."','principal')>".$clasificacion["Perdidos"]."</a></td>");
        print("<td width=10%><center>".$clasificacion["GolesFavor"]."</td>");
        print("<td width=10%><center>".$clasificacion["GolesContra"]."</td>");
        print("</tr>");
        }
        print ("</table>");

        if ($tipo_clasificacion==0)
        {
        print ("<p>");
        print ("<table border=1 width=30% align=left>");
        if ($rowcategoria["Suben"]>0)
        {
        print ("</td></tr><tr class=sube>");
        print ("<td>".cambiarAcentos(_ASCIENDE)." ".cambiarAcentos($rowcategoria["Ascenso"]));
        }
        if ($rowcategoria["Promocionan"]>0)
        {
        print ("</td></tr><tr class=promociona>");
        print ("<td>".cambiarAcentos(_PROMOCIONA)." ".cambiarAcentos($rowcategoria["Ascenso"]));
        }
        if ($rowcategoria["Bajan"]>0)
        {
        print ("</td></tr><tr class=desciende>");
        print ("<td>".cambiarAcentos(_DESCIENDE)." ".cambiarAcentos($rowcategoria["Descenso"]));
        }
        print ("</td></tr>");
        print ("</table>");

        $contarsancionados=count($equipossancionados);
        for ($x=0;$x<$contarsancionados;$x++)
        {
        print ("<br>".cambiarAcentos($equipossancionados[$x][0].": "._SANCION.$equipossancionados[$x][1]." ".strtolower(_PUNTOS)));
        }
        print ("<br>");
        print ("<br>");
        print ("<br>");
        if ($rowcategoria["Bajan"]>0)
        {
        print ("<br>");
        print ("<br>");
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