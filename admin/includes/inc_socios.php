<?php
	$accion = "A";
	
	if (isset($_POST['Accion']))
	{
		$accion = $_POST['Accion'];	
	} else if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];
	}
	
	$idSocio="";
	$textoES="";
	$textoEN="";
	$textoCA="";
	
	if (isset($_POST['TextoES']) && isset($_POST['TextoEN']) && isset($_POST['TextoCA']) && $accion == "A")
	{
	  	//Query
	    $query="insert into socios (TextoES,TextoCA,TextoEN,Fecha) values (";
	    $query.="'".$_POST['TextoES']."'";
	    $query.=",'".$_POST['TextoCA']."'";
	    $query.=",'".$_POST['TextoEN']."'";
		$query.=",'".date('Y/m/d H:i:s')."')";

		mysqli_query ($link, $query);
    }
    else if ($accion == "M")
    {
	  	//Query
	    $query="update socios set TextoES='".$_POST['TextoES']."'";
	    $query.=", TextoCA='".$_POST['TextoCA']."'";
	    $query.=", TextoEN='".$_POST['TextoEN']."'";
		$query.=", Fecha='".date('Y/m/d H:i:s')."'";
	    $query.=" where IdSocio=".$_POST['IdSocio'];
	
	    $accion = "A";
	    
	    mysqli_query ($link, $query);
    }
    else if ($accion == "B")
    {
		//Query
		$query="select * from socios where IdSocio=".$_GET['IdSocio'];
		$qSocio=mysqli_query ($link, $query);
		$rowSocio=mysqli_fetch_array($qSocio);

		$idSocio = $rowSocio["IdSocio"];
		$textoES = $rowSocio["TextoES"];
		$textoCA = $rowSocio["TextoCA"];
		$textoEN = $rowSocio["TextoEN"];
		$accion = "M";
		
		mysqli_free_result($qSocio);
    }
    else if ($accion == "E")
    {
		//Query
		$query="delete from socios where IdSocio=".$_GET['IdSocio'];
		mysqli_query ($link, $query);
		$accion = "A";
    }

?>
<h1 class="text-center">HAZTE SOCIO</h1>
<form role="form" id="socios" method="post" action="socios.php">
	<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
	<input type="hidden" name="IdSocio" id="IdSocio" value=<?= $idSocio ?>>
	
	<table class="table">
   		<tr class="d-flex">
			<td class="col-4 text-right">Texto espa&ntilde;ol:</td>
       		<td class="col-8 text-center">
       			<textarea id="TextoES" name="TextoES" class="form-control" rows="3" cols="80"><?= $textoES ?></textarea>
       		</td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Texto catal&aacute;n:</td>
       		<td class="col-8 text-center">
       			<textarea id="TextoCA" name="TextoCA" class="form-control" rows="3" cols="80"><?= $textoCA ?></textarea>
       		</td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Texto ingl&eacute;s:</td>
       		<td class="col-8 text-center">
       			<textarea id="TextoEN" name="TextoEN" class="form-control" rows="3" cols="80"><?= $textoEN ?></textarea>
       		</td>
       	</tr>
       	
       	<tr class="d-flex">
       		<td class="col-12 text-center">
       			<button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button>
       		</td>
       	</tr>
	</table>
	
	<table class="table table-bordered">
   		<thead class="thead-dark">
	   		<tr class="d-flex">
	   			<th class="col-6 text-center">Texto</th>
	   			<th class="col-2 text-center">Modificar</th>
	   			<th class="col-2 text-center">Eliminar</th>
<?php 
                if ($_SESSION["tipo_usuario"] == 1){
?>	   			
	   				<th class="col-2 text-center">Fecha</th>
<?php 
                }
?>	   			
	   		</tr>
	   	</thead>
	
<?php
	  	//Query
	    $query="select * from socios order by idSocio desc";
	    $qSocios=mysqli_query ($link, $query);
	
	    while($socio=mysqli_fetch_array($qSocios, MYSQLI_BOTH))
	    {
	    
?>

			<tr class="d-flex">
	   			<td class="col-6 text-center"><?= $socio["TextoES"] ?></td>
	   			<td class="col-2 text-center">
	   				<a href="socios.php?Accion=B&IdSocio=<?= $socio["IdSocio"] ?>"><img src="../../imagenes/modificar.gif"/></a>
	   			</td>
	   			<td class="col-2 text-center">
	   				<a href="socios.php?Accion=E&IdSocio=<?= $socio["IdSocio"] ?>"><img src="../../imagenes/eliminar.gif"/></a>
	   			</td>
<?php 
                if ($_SESSION["tipo_usuario"] == 1){
?>	   			
	   				<td class="col-2 text-center"><?= $socio["Fecha"] ?></td>
<?php 
                }
?>	   			
	   		</tr>
<?php    	
	    }
	    mysqli_free_result($qSocios);
?>
	</table>
</form>	