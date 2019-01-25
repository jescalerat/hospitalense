<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
	unset($_SESSION["pagina"]);
	$_SESSION["pagina"]=0;

	//print ("<h1 class=admin>".cambiarAcentos(_CERRADOSEMANASANTA)."</h1>");
	//print ("<h1 class=admin>".cambiarAcentos(_DESPLAZAMIENTOBUS)."</h1>");
	//print ("<h1 class=admin>".cambiarAcentos(_CERRADONAVIDAD)."</h1>");
	//print ("<h1><a href=\"javascript:llamada_prototype('paginas/campus.php','principal');\" class=\"resultados\">"._CAMPUS."</a></h1>");
	//print ("<h1><a href=\"javascript:llamada_prototype('paginas/torneo.php','principal');\" class=\"resultados\">".cambiarAcentos(_TORNEO)."</a></h1>");
	//print ("<h1><a href=\"javascript:llamada_prototype('paginas/comienzo_entrenamientos.php','principal');\" class=\"resultados\">".cambiarAcentos(_TORNEO)."</a></h1>");
	//include($_SESSION["ruta"]."paginas/horarios.php");
	//include($_SESSION["ruta"]."paginas/torneo.php");
	//include($_SESSION["ruta"]."paginas/campus.php");
	
	//print ("<center> <img src=fotos/benefico_PBJordiAlbaZonaFranca.jpg></center>");
	
?>

	<div id="noticias">
		<?php require_once("inc_noticias.php"); ?>
	</div>
	
	<br>
	
	<table class="table table-striped table-bordered table-sm">
		<thead class="thead-dark">
			<tr>
				<th colspan="3" class="text-center"><h1><?= cambiarAcentos(mb_strtoupper(_INDICEULTIMAJORNADA)) ?></h1></td>
			</tr>
		</thead>
<?php	
	
	/*	
	$query="select * from categoria c, liga l, ( ";
	$query.="select idcategoria, max(jornada) as jornada from liga where idcategoria in ( ";
	$query.="select idcategoria from categoria where retirado=0 order by orden ";
	$query.=") and ((equipo1=1 and equipo2!=9999) or (equipo1!=9999 and equipo2=1)) and resultequipo1 is not null ";
	$query.="group by idcategoria ";
	$query.=") t ";
	$query.="where l.IdCategoria=t.idcategoria and l.Jornada=t.jornada ";
	$query.="AND ((l.equipo1=1 AND l.equipo2!=9999 and l.SubCategoriaLocal=right(c.Categoria,1)) OR (l.equipo1!=9999 AND l.equipo2=1 and l.SubCategoriaVisitante=right(c.Categoria,1))) ";
	$query.="and c.IdCategoria=l.IdCategoria order by c.orden ";
*/

    $query  = "select * from categoria c, liga l, ( ";
    $query .= "select idcategoria, max(Jornada) as Jornada from liga where ResultEquipo1 is not null and ResultEquipo2 is not null and idcategoria in ( ";
    $query .= "select idcategoria from categoria where retirado=0 order by orden ";
    $query .= ") group by idcategoria) t ";
    $query .= "where l.IdCategoria=t.idcategoria and l.Jornada=t.jornada ";
    $query .= "and c.IdCategoria=l.IdCategoria ";
    $query .= "and (l.equipo1=1 or l.equipo2=1) ";
    $query .= "order by c.orden ";
	
	$proximajornada=mysqli_query ($link, $query);
	
	while($principal=mysqli_fetch_array($proximajornada, MYSQLI_BOTH))
	{
		$titulo=strtoupper($principal["Categoria"])." (".$principal["Posicion"].cambiarAcentos('º').")";
			
		//Cambiar ids por el nombre del equipo
		$equipo1=$principal["Equipo1"];
		$equipo2=$principal["Equipo2"];

		$query="select * from equipos where IdEquipo=".$equipo1;
		$q_equipo1=mysqli_query($link, $query);
		$rowequipo1=mysqli_fetch_array($q_equipo1);

		$query="select * from equipos where IdEquipo=".$equipo2;
		$q_equipo2=mysqli_query($link, $query);
		$rowequipo2=mysqli_fetch_array($q_equipo2);
		
		$equipos=cambiarAcentos($rowequipo1["NombreEquipo"])." ".$principal["SubCategoriaLocal"]." - ".cambiarAcentos($rowequipo2["NombreEquipo"])." ".$principal["SubCategoriaVisitante"];

		$resultados=$principal["ResultEquipo1"]."-".$principal["ResultEquipo2"];

?>
		<tr>
			<td class="align-middle text-center"><?= $titulo ?></td>
			<td class="align-middle text-center"><?= $equipos ?></td>
			<td class="align-middle text-center"><?= $resultados ?></td>
		</tr>
<?php			
	}
	mysqli_free_result($proximajornada);
	mysqli_free_result($q_equipo1);
	mysqli_free_result($q_equipo2);
?>
	</table>
	
	<br/><br/>
	
	<table class="table table-striped table-bordered table-sm">
		<thead class="thead-dark">
			<tr>
				<th colspan="3" class="text-center"><h1><?= cambiarAcentos(mb_strtoupper(_INDICEPROXIMAJORNADA)) ?></h1></td>
			</tr>
		</thead>
<?php	
	
	/*	
	$query="select * from categoria c, liga l, ( ";
	$query.="select idcategoria, min(jornada) as jornada from liga where idcategoria in ( ";
	$query.="select idcategoria from categoria where retirado=0 order by orden ";
	$query.=") and ((equipo1=1 and equipo2!=9999) or (equipo1!=9999 and equipo2=1)) and resultequipo1 is null ";
	$query.="group by idcategoria ";
	$query.=") t ";
	$query.="where l.IdCategoria=t.idcategoria and l.Jornada=t.jornada ";
	$query.="AND ((l.equipo1=1 AND l.equipo2!=9999 and l.SubCategoriaLocal=right(c.Categoria,1)) OR (l.equipo1!=9999 AND l.equipo2=1 and l.SubCategoriaVisitante=right(c.Categoria,1))) ";
	$query.="and c.IdCategoria=l.IdCategoria order by c.orden ";
    */

	$query  = "select * from categoria c, liga l, ( ";
    $query .= "select idcategoria, max(Jornada)+1 as Jornada from liga where ResultEquipo1 is not null and ResultEquipo2 is not null and idcategoria in ( ";
    $query .= "select idcategoria from categoria where retirado=0 order by orden ";
    $query .= ") group by idcategoria) t ";
    $query .= "where l.IdCategoria=t.idcategoria and l.Jornada=t.jornada ";
    $query .= "and c.IdCategoria=l.IdCategoria ";
    $query .= "and (l.equipo1=1 or l.equipo2=1) ";
    $query .= "order by c.orden ";
        
	$proximajornada=mysqli_query ($link, $query);
	
	while($principal=mysqli_fetch_array($proximajornada, MYSQLI_BOTH))
	{
		$titulo=strtoupper($principal["Categoria"])." (".$principal["Posicion"].cambiarAcentos('º').")";
			
		//Cambiar ids por el nombre del equipo
		$equipo1=$principal["Equipo1"];
		$equipo2=$principal["Equipo2"];

		$query="select * from equipos where IdEquipo=".$equipo1;
		$q_equipo1=mysqli_query($link, $query);
		$rowequipo1=mysqli_fetch_array($q_equipo1);

		$query="select * from equipos where IdEquipo=".$equipo2;
		$q_equipo2=mysqli_query($link, $query);
		$rowequipo2=mysqli_fetch_array($q_equipo2);
		
		$equipos=cambiarAcentos($rowequipo1["NombreEquipo"])." ".$principal["SubCategoriaLocal"]." - ".cambiarAcentos($rowequipo2["NombreEquipo"])." ".$principal["SubCategoriaVisitante"];
		
		$fecha_larga=explode('-',$principal["Fecha"]);
		$dia=$fecha_larga[0];
		$mes_entero=$fecha_larga[1];
		$any=$fecha_larga[2];

		//Llamamos a la traducción del mes
		$mes=mesAny($mes_entero);
		
		$diasemana=diaSemana($principal["DiaSemana"]);
		
		$querycampo="select * from campos where IdCampo=".$principal["Campo"];
		$q_campo=mysqli_query($link, $querycampo);
		$rowcampo=mysqli_fetch_array($q_campo);

		$fecha=$diasemana.", ".$dia."-".$mes."-".$any." ".$principal["Hora"].":".$principal["Minutos"];
		$fecha.="<br/>".cambiarAcentos($rowcampo["Nombre"]);

			
?>
			<tr>
				<td class="align-middle text-center"><?= $titulo ?></td>
				<td class="align-middle text-center"><?= $equipos ?></td>
				<td class="align-middle text-center"><?= $fecha ?></td>
			</tr>
<?php			
	}
	mysqli_free_result($proximajornada);
	mysqli_free_result($q_equipo1);
	mysqli_free_result($q_equipo2);
	mysqli_free_result($q_campo);
?>
	</table>

<?php
	if(isset($_GET['Jornada']))
	{
		$jornada_equipo=$_GET['Jornada'];
	}
	else
	{
		$jornada_equipo=0;
	}

	if (!isset($_SESSION["admin_web"]))
	{
		//Query para insertar los valores en la base de datos
		$query="insert into paginasvistas (IP,Hora,Fecha,Pagina,JornadaEquipo) values (\"".getRealIP()."\",\"".date("H:i:s")."\",\"".date("Y-m-d")."\",".$_SESSION["pagina"].",".$jornada_equipo.")";
		mysqli_query($link, $query);
	}
?>

<form name="buscapagina" action="#">
	<input type="hidden" name="paginaactual" id="paginaactual" value="<?php print ($_SESSION["pagina"]);?>"/>
</form>