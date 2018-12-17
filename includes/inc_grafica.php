<?php
  session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="StyleSheet" href="../css/bootstrap.css" title="hoja de estilo" media="Screen" type="text/css"/>
<title>Grafica</title>
<script src="../js/jquery.min.js"></script>
<script src="../js/canvasjs.min.js"></script>

</head>

<body>

<?php
    require_once("../conf/funciones.php");
	require_once("../conf/traduccion.php");
    require_once("../conf/conexion.php");
    $link=Conectarse();
    
    $id=$_GET['idequipo'];
    $jornada=$_GET['Jornada'];
    $tipo_clasificacion=$_GET['tipoclasificacion'];
    $categoria=$_GET['IdCategoria'];
    
    //Query
    $query="Select * from liga where Equipo1=".$id." and IdCategoria=".$categoria;
    $q=mysqli_query ($link, $query);
    $rowliga=mysqli_fetch_array($q);
    $SubCategoriaEquipo=$rowliga["SubCategoriaLocal"];
    
    //Borrar la clasificacion anterior
    $query="delete from clasificacion";
    mysqli_query ($link, $query);
    
    //Llamamos a la creación de la clasificacion
    setClasificacion($jornada,$tipo_clasificacion,$categoria,$link);
    
    //Query
    $query="select * from clasificacion where IdEquipo=".$id;
    $q=mysqli_query ($link, $query);
    $rowclasificacion=mysqli_fetch_array($q);
    
    //Query
    $query="select * from equipos where IdEquipo=".$id;
    $qequipo=mysqli_query ($link, $query);
    $rowequipo=mysqli_fetch_array($qequipo);
    
    $nombreequipo = cambiarAcentos($rowequipo["NombreEquipo"]." '".$SubCategoriaEquipo."'");
    
    $tantoganados = ($rowclasificacion["Ganados"] * 100) / 8;
    $tantoempatados = ($rowclasificacion["Empatados"] * 100) / 8;
    $tantoperdidos = ($rowclasificacion["Perdidos"] * 100) / 8;
?>

<p class="text-center">
	<a  name="anchorcerrar" href="#" id="anchorcerrar" onclick="parent.parent.GB_hide();">
		<?= cambiarAcentos(_VOLVERCLASIFICACION) ?>
	</a>
</p>



<div id="chartContainer"></div>



<?php
    $dataPoints = array(
        array("y" => $tantoganados, "legendText" => _GANADOS, "label" => _GANADOS),
        array("y" => $tantoempatados, "legendText" => _EMPATADOS, "label" => _EMPATADOS),
        array("y" => $tantoperdidos, "legendText" => _PERDIDOS, "label" => _PERDIDOS)
    );
?>

<script type="text/javascript">
    $(function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: "<?= $nombreequipo ?>"
            },
            animationEnabled: true,
            legend: {
                verticalAlign: "center",
                horizontalAlign: "left",
                fontSize: 20,
                fontFamily: "Helvetica"
            },
            theme: "light2",
            data: [
            {
                type: "pie",
                indexLabelFontFamily: "Garamond",
                indexLabelFontSize: 20,
                indexLabel: "{label} {y}%",
                startAngle: -20,
                showInLegend: true,
                toolTipContent: "{legendText} {y}%",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });
</script>

		
</body>
</html>
