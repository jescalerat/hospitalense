<?php
	
	$accion = "A";
	
	if (isset($_POST['Accion']))
	{
		$accion = $_POST['Accion'];	
	} else if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];
	}
	
	$idEconomia="";
	$conceptoES="";
	$conceptoEN="";
	$conceptoCA="";
	$tipo="";
	$importe="";
	
	if (isset($_POST['ConceptoES']) && isset($_POST['ConceptoEN']) && isset($_POST['ConceptoCA']) && isset($_POST['Tipo']) && isset($_POST['Importe']) && $accion == "A")
	{
	  	//Query
	    $query="select max(orden) as maxorden from economia where tipo=".$_POST['Tipo'];
	    $qEconomia=mysqli_query ($link, $query);
	    $rowEconomia=mysqli_fetch_array($qEconomia);
	    
	    $orden = $rowEconomia["maxorden"];
	    mysqli_free_result($qEconomia);

		if ($orden == ""){
			$orden = 1;
		} else {
			$orden++;
		}

	  	//Query
	    $query="insert into economia (ConceptoES,ConceptoEN,ConceptoCA,Importe,Tipo,Orden,Fecha) values (";
	    $query.="'".$_POST['ConceptoES']."'";
	    $query.=",'".$_POST['ConceptoEN']."'";
	    $query.=",'".$_POST['ConceptoCA']."'";
		$query.=",".$_POST['Importe'];
	    $query.=",".$_POST['Tipo'];
	    $query.=",".$orden;
		$query.=",'".date('Y/m/d H:i:s')."')";

		mysqli_query ($link, $query);
    }
    else if ($accion == "M")
    {
	  	//Query
	    $query="update economia set ConceptoES='".$_POST['ConceptoES']."'";
	    $query.=", ConceptoCA='".$_POST['ConceptoCA']."'";
	    $query.=", ConceptoEN='".$_POST['ConceptoEN']."'";
		$query.=", Importe=".$_POST['Importe'];
	    $query.=", Tipo=".$_POST['Tipo'];
		$query.=", Fecha='".date('Y/m/d H:i:s')."'";
	    $query.=" where IdEconomia=".$_POST['IdEconomia'];
	
	    mysqli_query ($link, $query);
		$accion = "A";
    }
    else if ($accion == "B")
    {
		//Query
		$query="select * from economia where IdEconomia=".$_GET['IdEconomia'];
		$qEconomia=mysqli_query ($link, $query);
		$rowEconomia=mysqli_fetch_array($qEconomia);

		$idEconomia = $rowEconomia["IdEconomia"];
		$conceptoES = $rowEconomia["ConceptoES"];
		$conceptoCA = $rowEconomia["ConceptoCA"];
		$conceptoEN = $rowEconomia["ConceptoEN"];
		$importe = $rowEconomia["Importe"];
		$tipo = $rowEconomia["Tipo"];
		$accion = "M";
		mysqli_free_result($qEconomia);
    }
    else if ($accion == "E")
    {
		//Query
		$query="delete from economia where IdEconomia=".$_GET['IdEconomia'];
		mysqli_query ($link, $query);
		$accion = "A";
    }
    else if ($accion == "U")
    {
		$query="select * from economia where IdEconomia=".$_GET['IdEconomia'];
		$qEconomia=mysqli_query ($link, $query);
		$rowEconomia=mysqli_fetch_array($qEconomia);
		
		$idEconomiaAnt = $rowEconomia["IdEconomia"];
		$ordenAnt = $rowEconomia["Orden"];
		$tipo = $rowEconomia["Tipo"];
		mysqli_free_result($qEconomia);
		
		$cambioOrdenAnt = $ordenAnt - 1;
		
		$query="select * from economia where Orden=".$cambioOrdenAnt." and tipo=".$tipo;
		$qEconomia=mysqli_query ($link, $query);
		$rowEconomia=mysqli_fetch_array($qEconomia);
		
		$idEconomiaPost = $rowEconomia["IdEconomia"];
		$ordenPost = $rowEconomia["Orden"];
		mysqli_free_result($qEconomia);
		
		$cambioOrdenPost = $ordenPost + 1;
		
		$query="update economia set Orden=".$cambioOrdenAnt;
		$query.=" where IdEconomia=".$idEconomiaAnt;
		mysqli_query ($link, $query);
			
		$query="update economia set Orden=".$cambioOrdenPost;
		$query.=" where IdEconomia=".$idEconomiaPost;
		mysqli_query ($link, $query);
		$accion = "A";
    }
    else if ($accion == "D")
    {
		$query="select * from economia where IdEconomia=".$_GET['IdEconomia'];
		$qEconomia=mysqli_query ($link, $query);
		$rowEconomia=mysqli_fetch_array($qEconomia);
		
		$idEconomiaAnt = $rowEconomia["IdEconomia"];
		$ordenAnt = $rowEconomia["Orden"];
		$tipo = $rowEconomia["Tipo"];
		mysqli_free_result($qEconomia);
		
		$cambioOrdenAnt = $ordenAnt + 1;
		
		$query="select * from economia where Orden=".$cambioOrdenAnt." and tipo=".$tipo;
		$qEconomia=mysqli_query ($link, $query);
		$rowEconomia=mysqli_fetch_array($qEconomia);
		
		$idEconomiaPost = $rowEconomia["IdEconomia"];
		$ordenPost = $rowEconomia["Orden"];
		mysqli_free_result($qEconomia);
		
		$cambioOrdenPost = $ordenPost - 1;
		
		$query="update economia set Orden=".$cambioOrdenAnt;
		$query.=" where IdEconomia=".$idEconomiaAnt;
		mysqli_query ($link, $query);
			
		$query="update economia set Orden=".$cambioOrdenPost;
		$query.=" where IdEconomia=".$idEconomiaPost;
		mysqli_query ($link, $query);
		$accion = "A";
    }
?>
<h1 class="text-center">ECONOMIA</h1>
<form role="form" id="economia" method="post" action="economia.php">
	<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
	<input type="hidden" name="IdEconomia" id="IdEconomia" value=<?= $idEconomia ?>>
	
	<table class="table">
   		<tr class="d-flex">
			<td class="col-4 text-right">Concepto espa&ntilde;ol:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="ConceptoES" id="ConceptoES" value="<?= $conceptoES ?>"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Concepto catal&aacute;n:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="ConceptoCA" id="ConceptoCA" value="<?= $conceptoCA ?>"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Concepto ingl&eacute;s:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="ConceptoEN" id="ConceptoEN" value="<?= $conceptoEN ?>"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Tipo:</td>
       		<td class="col-8 text-center">
       			<select class="form-control" name="Tipo">
       				<option value="1" <?php if ($tipo == 1) print("selected");?>>Ingreso</option>
					<option value="2" <?php if ($tipo == 2) print("selected");?>>Gasto</option>
       			</select>
       		</td>
       	</tr>
	
		<tr class="d-flex">
			<td class="col-4 text-right">Importe:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="Importe" id="Importe" value="<?= $importe ?>"></td>
       	</tr>
		
		<tr class="d-flex">
       		<td class="col-12 text-center">
       			<button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button>
       		</td>
       	</tr>
	</table>
	
	<h3 class="text-center">Ingresos</h3>
<?php 
    $idTipoTabla=1;
    require("inc_economia_tabla.php");
?>		
	
	<h3 class="admin">Gastos</h3>
<?php 
    $idTipoTabla=2;
    require("inc_economia_tabla.php");
?>	
</form>	