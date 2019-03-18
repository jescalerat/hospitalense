<?php
	
    $accion = "A";
	
	if (isset($_POST['Accion']))
	{
		$accion = $_POST['Accion'];	
	} 
	else if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];
	}
	
	$idHistoria="";
	$textoES="";
	$textoEN="";
	$textoCA="";
	
	if (isset($_POST['TextoES']) && isset($_POST['TextoEN']) && isset($_POST['TextoCA']) && $accion == "A")
	{
	  	//Query
	    $query="insert into historia (TextoES,TextoCA,TextoEN,Fecha) values (";
	    $query.="'".$_POST['TextoES']."'";
	    $query.=",'".$_POST['TextoCA']."'";
	    $query.=",'".$_POST['TextoEN']."'";
		$query.=",'".date('Y/m/d H:i:s')."')";

		mysqli_query ($link, $query);
    }
    else if ($accion == "M")
    {
	  	//Query
	    $query="update historia set TextoES='".$_POST['TextoES']."'";
	    $query.=", TextoCA='".$_POST['TextoCA']."'";
	    $query.=", TextoEN='".$_POST['TextoEN']."'";
		$query.=", Fecha='".date('Y/m/d H:i:s')."'";
	    $query.=" where IdHistoria=".$_POST['IdHistoria'];
	
	    mysqli_query ($link, $query);
	    
	    $accion = "A";
    }
    else if ($accion == "B")
    {
		//Query
		$query="select * from historia where IdHistoria=".$_GET['IdHistoria'];
		$qHistoria=mysqli_query ($link, $query);
		$rowHistoria=mysqli_fetch_array($qHistoria);

		$idHistoria = $rowHistoria["IdHistoria"];
		$textoES = $rowHistoria["TextoES"];
		$textoCA = $rowHistoria["TextoCA"];
		$textoEN = $rowHistoria["TextoEN"];
		$accion = "M";
		
		mysqli_free_result($qHistoria);
    }
    else if ($accion == "E")
    {
		//Query
		$query="delete from historia where IdHistoria=".$_GET['IdHistoria'];
		mysqli_query ($link, $query);
		$accion = "A";
    }

?>
<h1 class="text-center">HISTORIA</h1>

<form role="form" id="historia" method="post" action="historia.php">
	<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
	<input type="hidden" name="IdHistoria" id="IdHistoria" value=<?= $idHistoria ?>>
	
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
	    $query="select * from historia";
	    $qHistoria=mysqli_query ($link, $query);
	
	    while($historia=mysqli_fetch_array($qHistoria, MYSQLI_BOTH))
	    {
	    
?>

			<tr class="d-flex">
	   			<td class="col-6 text-center"><?= $historia["TextoES"] ?></td>
	   			<td class="col-2 text-center">
	   				<a href="historia.php?Accion=B&IdHistoria=<?= $historia["IdHistoria"] ?>"><img src="../../imagenes/modificar.gif"/></a>
	   			</td>
	   			<td class="col-2 text-center">
	   				<a href="historia.php?Accion=E&IdHistoria=<?= $historia["IdHistoria"] ?>"><img src="../../imagenes/eliminar.gif"/></a>
	   			</td>
<?php 
                if ($_SESSION["tipo_usuario"] == 1){
?>	   			
	   				<td class="col-2 text-center"><?= $historia["Fecha"] ?></td>
<?php 
                }
?>	   			
	   		</tr>
<?php    	
	    }
	    mysqli_free_result($qHistoria);
?>
	</table>
</form>	