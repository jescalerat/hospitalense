<?php

	$idGaleria = "";
	if (isset($_GET['IdGaleria'])){
		$idGaleria = $_GET['IdGaleria'];
	} else if (isset($_POST['IdGaleria'])){
		$idGaleria = $_POST['IdGaleria'];
	}		
	
	$accion = "A";
	
	if (isset($_POST['Accion']))
	{
		$accion = $_POST['Accion'];	
	} else if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];
	}
	
	$idFoto="";
	$descripcionES="";
	$descripcionEN="";
	$descripcionCA="";
	
	if (isset($_POST['DescripcionES']) && isset($_POST['DescripcionEN']) && isset($_POST['DescripcionCA']) && $accion == "A")
	{
		//Query
	    $query="select max(orden) as maxorden from fotos_historia where IdGaleria=".$idGaleria;
	    $qGalerias=mysqli_query ($link, $query);
	    $rowGalerias=mysqli_fetch_array($qGalerias);
	    
	    $orden = $rowGalerias["maxorden"];
	    mysqli_free_result($qGalerias);
		
		if ($orden == ""){
			$orden = 1;
		} else {
			$orden++;
		}
		
	  	//Query
	    $query="insert into fotos_historia (IdGaleria,DescripcionES,DescripcionCA,DescripcionEN,Orden,Fecha) values (";
	    $query.=$idGaleria;
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
		$query="update fotos_historia set DescripcionES='".$_POST['DescripcionES']."'";
		$query.=", DescripcionCA='".$_POST['DescripcionCA']."'";
		$query.=", DescripcionEN='".$_POST['DescripcionEN']."'";
		$query.=", Fecha='".date('Y/m/d H:i:s')."'";
		$query.=" where IdFoto=".$_POST['IdFoto'];

		mysqli_query ($link, $query);
		
		$accion = "A";
	}
	else if ($accion == "B")
	{
		//Query
		$query="select * from fotos_historia where IdFoto=".$_GET['IdFoto'];
		$qFotos=mysqli_query ($link, $query);
		$rowFotos=mysqli_fetch_array($qFotos);

		$idFoto = $rowFotos["IdFoto"];
		$descripcionES = $rowFotos["DescripcionES"];
		$descripcionCA = $rowFotos["DescripcionCA"];
		$descripcionEN = $rowFotos["DescripcionEN"];

		mysqli_free_result($qFotos);
		
		$accion = "M";
	}
	else if ($accion == "E")
	{
		//Query
		$query="delete from fotos_historia where IdFoto=".$_GET['IdFoto'];
		mysqli_query ($link, $query);
		$accion = "A";
	}
	 else if ($accion == "U")
	{
		$query="select * from fotos_historia where IdFoto=".$_GET['IdFoto'];
		$qFotos=mysqli_query ($link, $query);
		$rowFotos=mysqli_fetch_array($qFotos);
			
		$idFotoAnt = $rowFotos["IdFoto"];
		$ordenAnt = $rowFotos["Orden"];
		mysqli_free_result($qFotos);
		
		$cambioOrdenAnt = $ordenAnt - 1;
			
		$query="select * from fotos_historia where Orden=".$cambioOrdenAnt;
		$qFotos=mysqli_query ($link, $query);
		$rowFotos=mysqli_fetch_array($qFotos);
		
		$idFotoPost = $rowFotos["IdFoto"];
		$ordenPost = $rowFotos["Orden"];
		mysqli_free_result($qFotos);

		$cambioOrdenPost = $ordenPost + 1;
			
		$query="update fotos_historia set Orden=".$cambioOrdenAnt;
		$query.=" where IdFoto=".$idFotoAnt;
		mysqli_query ($link, $query);
			
		$query="update fotos_historia set Orden=".$cambioOrdenPost;
		$query.=" where IdFoto=".$idFotoPost;
		mysqli_query ($link, $query);		
	}
	else if ($accion == "D")
	{
		$query="select * from fotos_historia where IdFoto=".$_GET['IdFoto'];
		$qFotos=mysqli_query ($link, $query);
		$rowFotos=mysqli_fetch_array($qFotos);
		
		$idFotoAnt = $rowFotos["IdFoto"];
		$ordenAnt = $rowFotos["Orden"];
		mysqli_free_result($qFotos);
		
		$cambioOrdenAnt = $ordenAnt + 1;
			
		$query="select * from fotos_historia where Orden=".$cambioOrdenAnt;
		$qFotos=mysqli_query ($link, $query);
		$rowFotos=mysqli_fetch_array($qFotos);
		
		$idFotoPost = $rowFotos["IdFoto"];
		$ordenPost = $rowFotos["Orden"];
		mysqli_free_result($qFotos);
		
		$cambioOrdenPost = $ordenPost - 1;
			
		$query="update fotos_historia set Orden=".$cambioOrdenAnt;
		$query.=" where IdFoto=".$idFotoAnt;
		mysqli_query ($link, $query);
				
		$query="update fotos_historia set Orden=".$cambioOrdenPost;
		$query.=" where IdFoto=".$idFotoPost;
		mysqli_query ($link, $query);	
	}

	//Query
	$query="select * from galerias where IdGaleria=".$idGaleria;
	$qGalerias=mysqli_query ($link, $query);
	$rowGalerias=mysqli_fetch_array($qGalerias);
	
	
?>
<h1 class="text-center">GALERIA <?= $rowGalerias["GaleriaES"] ?></h1>
<form role="form" id="fotos" method="post" action="fotos.php">
	<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
	<input type="hidden" name="IdGaleria" id="IdGaleria" value=<?= $idGaleria ?>>
	<input type="hidden" name="IdFoto" id="IdFoto" value=<?= $idFoto ?>>
	
	<table class="table">
   		<tr class="d-flex">
			<td class="col-4 text-right">Descripci&oacute;n espa&ntilde;ol:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="DescripcionES" id="DescripcionES" value="<?= $descripcionES ?>"></td>
       	</tr>
	
   		<tr class="d-flex">
			<td class="col-4 text-right">Descripci&oacute;n catal&aacute;n:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="DescripcionCA" id="DescripcionCA" value="<?= $descripcionCA ?>"></td>
       	</tr>
	
		<tr class="d-flex">
			<td class="col-4 text-right">Descripci&oacute;n ingl&eacute;s:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="DescripcionEN" id="DescripcionEN" value="<?= $descripcionEN ?>"></td>
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
	   			<th class="col-1 text-center">&nbsp;</th>
	   			<th class="col-1 text-center">&nbsp;</th>
	   			<th class="col-2 text-center">Descripci&oacute;n</th>
	   			<th class="col-4 text-center">Foto</th>
	   			<th class="col-1 text-center">Modificar</th>
	   			<th class="col-1 text-center">Eliminar</th>
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
        $query="select * from fotos_historia order by orden";
	    $qFotos=mysqli_query ($link, $query);
	    $totalFotos=mysqli_num_rows($qFotos);
	
	    $x=0;
	    while($foto=mysqli_fetch_array($qFotos, MYSQLI_BOTH))
	    {
	    
?>
			<tr class="d-flex">
				<td class="col-1">
<?php 
                if ($x==0)
                {
?>
					&nbsp;
<?php 
                }
                else
                {
?>
					<a href="fotos.php?Accion=U&IdFoto=<?= $foto["IdFoto"] ?>&IdGaleria=<?= $idGaleria ?>"><img src="../../imagenes/up.gif"/></a>
<?php 
                }
?>
				</td>

				<td class="col-1">
<?php 
                if ($x==($totalFotos-1))
                {
?>
					&nbsp;
<?php 
                }
                else
                {
?>
					<a href="fotos.php?Accion=D&IdFoto=<?= $foto["IdFoto"] ?>&IdGaleria=<?= $idGaleria ?>"><img src="../../imagenes/down.gif"/></a>
<?php 
                }
?>
				</td>				
				
				<td class="col-2">
					<?= $foto["DescripcionES"] ?>
				</td>
	   			
	   			<td class="col-4">
	   				<a href="#" onClick="window.open('../includes/subir_foto.php?idFoto=<?= $foto["IdFoto"] ?>', '_blank')">Subir foto</a>
    				<img src="<?php print("../includes/mostrar_foto.php?IdFoto=".$foto["IdFoto"]) ?>" height="42" width="42"/>
	   			</td>
			
				<td class="col-1">
	   				<a href="fotos.php?Accion=B&IdFoto=<?= $foto["IdFoto"] ?>&IdGaleria=<?= $idGaleria ?>"><img src="../../imagenes/modificar.gif"/></a>
	   			</td>
	   			
	   			<td class="col-1">
	   				<a href="fotos.php?Accion=E&IdFoto=<?= $foto["IdFoto"] ?>&IdGaleria=<?= $idGaleria ?>"><img src="../../imagenes/eliminar.gif"/></a>
	   			</td>
			
<?php 
                if ($_SESSION["tipo_usuario"] == 1){
?>
    				<td class="col-2 text-center">
    	   				<?= $foto["Fecha"] ?>
    	   			</td>
<?php 
                }
?>
			</tr>
<?php    	
            $x++;
	    }
	    mysqli_free_result($qFotos);
	    mysqli_free_result($qGalerias);
?>
	</table>
</form>	