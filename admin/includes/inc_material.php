<?php

	$accion = "A";
	
	if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];
	}
	if (isset($_POST['Accion']))
	{
	    $accion = $_POST['Accion'];
	}
	
	$idMaterial="";
	$material="";
	$resultado = 1;
	
	if (isset($_POST['Material']) && $_POST['Material'] != "" && $accion == "A")
    {
	  	//Query
	    $query="insert into material (Material) values (";
	    $query.="'".$_POST['Material']."')";
	    mysqli_query ($link, $query);
    }
    else if ($accion == "M")
    {
	  	//Query
	    $query="update material set Material='".$_POST['Material']."'";
	    $query.=" where IdMaterial=".$_POST['IdMaterial'];
	    mysqli_query ($link, $query);
	    $accion = "A";
    }
    else if ($accion == "B")
    {
  	     //Query
        $query="select * from material where IdMaterial=".$_GET['IdMaterial'];
		$qMaterial=mysqli_query ($link, $query);
		$rowMaterial=mysqli_fetch_array($qMaterial);

		$idMaterial = $rowMaterial["IdMaterial"];
		$material = $rowMaterial["Material"];
		$accion = "M";
		mysqli_free_result($qMaterial);
    }
    else if ($accion == "E")
    {
  	     //Query
        $query="delete from material where IdMaterial=".$_GET['IdMaterial'];
        $resultado = mysqli_query ($link, $query);
		$accion = "A";
    }
?>
<h1 class="text-center">MATERIAL</h1>
<form role="form" id="material" method="post" action="material.php">
	<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
	<input type="hidden" name="IdMaterial" id="IdMaterial" value=<?= $idMaterial ?>>
	<table class="table">
   		<tr class="d-flex">
			<td class="col-2 text-right">Nombre:</td>
       		<td class="col-10 text-center"><input type="text" class="form-control" size="20" name="Material" id="Material" value="<?= $material ?>"></td>
		</tr>    
		
		<tr class="d-flex">
			<td class="col-2">&nbsp;</td>
       		<td class="col-8 text-center">
				<button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button>
			</td>
       		<td class="col-2">&nbsp;</td>
		</tr>
	</table>
		
<?php
				if ($resultado <> 1)
				{
?>
					<p class="text-center text-danger">El material que desea eliminar tiene jugadores asignados.<br>Si desea eliminar el material quiteselo antes a los jugadores asignados</p>
<?php 
				}
?>

	<table class="table table-bordered">
		<thead class="thead-dark">
			<tr class="d-flex">
				<th class="col-8 text-center">Material</th>
     	   		<th class="col-2 text-center">Modificar</th>
        	   	<th class="col-2 text-center">Eliminar</th>
			</tr>
		</thead>

<?php
	  	//Query
        $query="select * from material order by Material";
	    $qMateriales=mysqli_query ($link, $query);
	    
	    while($material=mysqli_fetch_array($qMateriales, MYSQLI_BOTH))
	    {
	    
?>
			<tr class="d-flex">
	   			<td class="col-8"><?= $material["Material"] ?></td>
	   			<td class="col-2 text-center">
	   				<a href="material.php?Accion=B&IdMaterial=<?= $material["IdMaterial"] ?>"><img src="../../imagenes/modificar.gif"/></a>
	   			</td>
	   			<td class="col-2 text-center">
	   				<a href="material.php?Accion=E&IdMaterial=<?= $material["IdMaterial"] ?>"><img src="../../imagenes/eliminar.gif"/></a>
	   			</td>
	   		</tr>
<?php 
	    }
	    mysqli_free_result($qMateriales);
?>   		

	</table>	
</form>	