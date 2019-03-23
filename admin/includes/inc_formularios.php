<?php
	
	$accion = "A";
	
	if (isset($_POST['Accion']))
	{
		$accion = $_POST['Accion'];	
	} else if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];
	}
	
	$idFormulario="";
	$idTipo="";
	$descripcionES="";
	$descripcionEN="";
	$descripcionCA="";
	
	if (isset($_POST['DescripcionES']) && isset($_POST['DescripcionEN']) && isset($_POST['DescripcionCA']) && $accion == "A")
	{
		$idTipoInsert = $_POST['IdTipo'];
		//Query
	    $query="select max(orden) as maxorden from formularios where IdTipo=".$idTipoInsert;
	    $qFormulario=mysqli_query ($link, $query);
	    $rowFormulario=mysqli_fetch_array($qFormulario);

	    $orden = $rowFormulario["maxorden"];
	    mysqli_free_result($qFormulario);
		
		if ($orden == ""){
			$orden = 1;
		} else {
			$orden++;
		}
		
	  	//Query
	    $query="insert into formularios (IdTipo,DescripcionES,DescripcionCA,DescripcionEN,Orden,Fecha) values (";
	    $query.=$idTipoInsert;
		$query.=",'".$_POST['DescripcionES']."'";
	    $query.=",'".$_POST['DescripcionCA']."'";
	    $query.=",'".$_POST['DescripcionEN']."'";
		$query.=",".$orden;
		$query.=",'".date('Y/m/d H:i:s')."')";

		mysqli_query ($link, $query);
	}
	else if ($accion == "M")
	{
		//Query
		$query="update formularios set DescripcionES='".$_POST['DescripcionES']."'";
		$query.=", DescripcionCA='".$_POST['DescripcionCA']."'";
		$query.=", DescripcionEN='".$_POST['DescripcionEN']."'";
		$query.=", Fecha='".date('Y/m/d H:i:s')."'";
		$query.=" where IdFormulario=".$_POST['IdFormulario'];

		mysqli_query ($link, $query);
		
		$accion = "A";
	}
	else if ($accion == "B")
	{
		//Query
		$query="select * from formularios where IdFormulario=".$_GET['IdFormulario'];
		$qFormulario=mysqli_query ($link, $query);
		$rowFormulario=mysqli_fetch_array($qFormulario);

		$idFormulario = $rowFormulario["IdFormulario"];
		$idTipo = $rowFormulario["IdTipo"];
		$descripcionES = $rowFormulario["DescripcionES"];
		$descripcionCA = $rowFormulario["DescripcionCA"];
		$descripcionEN = $rowFormulario["DescripcionEN"];

		$accion = "M";
		
		mysqli_free_result($qFormulario);
	}
	else if ($accion == "E")
	{
		//Query
	    $query="delete from formularios where IdFormulario=".$_GET['IdFormulario'];
		mysqli_query ($link, $query);
		$accion = "A";
	}
	 else if ($accion == "U")
	{
	    $query="select * from formularios where IdFormulario=".$_GET['IdFormulario'];
		$qFormulario=mysqli_query ($link, $query);
		$rowFormulario=mysqli_fetch_array($qFormulario);
			
		$idFormularioAnt = $rowFormulario["IdFormulario"];
		$idTipoTemp = $rowFormulario["IdTipo"];
		$ordenAnt = $rowFormulario["Orden"];
		mysqli_free_result($qFormulario);
			
		$cambioOrdenAnt = $ordenAnt - 1;
			
		$query="select * from formularios where Orden=".$cambioOrdenAnt." and IdTipo=".$idTipoTemp;
		$qFormulario=mysqli_query ($link, $query);
		$rowFormulario=mysqli_fetch_array($qFormulario);
			
		$idFormularioPost = $rowFormulario["IdFormulario"];
		$ordenPost = $rowFormulario["Orden"];
		mysqli_free_result($qFormulario);
			
		$cambioOrdenPost = $ordenPost + 1;
			
		$query="update formularios set Orden=".$cambioOrdenAnt;
		$query.=" where IdFormulario=".$idFormularioAnt;
		mysqli_query ($link, $query);
			
		$query="update formularios set Orden=".$cambioOrdenPost;
		$query.=" where IdFormulario=".$idFormularioPost;
		mysqli_query ($link, $query);
	}
	else if ($accion == "D")
	{
	    $query="select * from formularios where IdFormulario=".$_GET['IdFormulario'];
	    $qFormulario=mysqli_query ($link, $query);
	    $rowFormulario=mysqli_fetch_array($qFormulario);
	    
	    $idFormularioAnt = $rowFormulario["IdFormulario"];
	    $idTipoTemp = $rowFormulario["IdTipo"];
	    $ordenAnt = $rowFormulario["Orden"];
	    mysqli_free_result($qFormulario);
			
		$cambioOrdenAnt = $ordenAnt + 1;
			
		$query="select * from formularios where Orden=".$cambioOrdenAnt." and IdTipo=".$idTipoTemp;
		$qFormulario=mysqli_query ($link, $query);
		$rowFormulario=mysqli_fetch_array($qFormulario);
		
		$idFormularioPost = $rowFormulario["IdFormulario"];
		$ordenPost = $rowFormulario["Orden"];
		mysqli_free_result($qFormulario);
			
		$cambioOrdenPost = $ordenPost - 1;
			
		$query="update formularios set Orden=".$cambioOrdenAnt;
		$query.=" where IdFormulario=".$idFormularioAnt;
		mysqli_query ($link, $query);
				
		$query="update formularios set Orden=".$cambioOrdenPost;
		$query.=" where IdFormulario=".$idFormularioPost;
		mysqli_query ($link, $query);
	}
	
?>
<h1 class="text-center">FORMULARIOS</h1>
<form role="form" id="formulario" method="post" action="formularios.php">
	<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
	<input type="hidden" name="IdFormulario" id="IdFormulario" value=<?= $idFormulario ?>>
	
	<table class="table">
   		<tr class="d-flex">
			<td class="col-4 text-right">Descripci&oacute;n espa&ntilde;ol:</td>
       		<td class="col-8 text-center">
       			<textarea id="DescripcionES" name="DescripcionES" class="form-control" rows="3" cols="80"><?= $descripcionES ?></textarea>
       		</td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Descripci&oacute;n catal&aacute;n:</td>
       		<td class="col-8 text-center">
       			<textarea id="DescripcionCA" name="DescripcionCA" class="form-control" rows="3" cols="80"><?= $descripcionCA ?></textarea>
       		</td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Descripci&oacute;n ingl&eacute;s:</td>
       		<td class="col-8 text-center">
       			<textarea id="DescripcionEN" name="DescripcionEN" class="form-control" rows="3" cols="80"><?= $descripcionEN ?></textarea>
       		</td>
       	</tr>
	
		<tr class="d-flex">
			<td class="col-4 text-right">Tipo:</td>
       		<td class="col-8 text-center">
<?php 
                $jugadorSeleccionado="";
                if ($idTipo == 1){
                    $jugadorSeleccionado="selected";
                }
                
                $regimenSeleccionado="";
                if ($idTipo == 2){
                    $regimenSeleccionado="selected";
                }
                
                $estatutoSeleccionado="";
                if ($idTipo == 3){
                    $estatutoSeleccionado="selected";
                }
?>       		
        		<select class="form-control" name="IdTipo">
        			<option value="1" <?= $jugadorSeleccionado ?>>Jugadores</option>
					<option value="2" <?= $regimenSeleccionado ?>>Regimen interno</option>
					<option value="3" <?= $estatutoSeleccionado ?>>Estatuto</option>
				</select>
       		</td>
       	</tr>
	
		<tr class="d-flex">
       		<td class="col-12 text-center">
       			<button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button>
       		</td>
       	</tr>
	</table>
	
	<h2 class="text-center">R&eacute;gimen interno</h2>
<?php 
    $idTipoTabla=2;
    require("inc_formularios_tabla.php");
?>		
	
	</br></br>
	
	<h2 class="text-center">Estatutos</h2>
<?php 
    $idTipoTabla=3;
    require("inc_formularios_tabla.php");
?>	

	</br></br>
	<h2 class="admin">Jugadores</h2>
<?php 
    $idTipoTabla=1;
    require("inc_formularios_tabla.php");
?>		
	
</form>	