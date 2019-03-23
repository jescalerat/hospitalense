<?php
		
	$accion = "A";
	
	if (isset($_POST['Accion']))
	{
		$accion = $_POST['Accion'];	
	} else if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];
	}
	
	$idGaleria="";
	$galeriaES="";
	$galeriaEN="";
	$galeriaCA="";
	
	if (isset($_POST['GaleriaES']) && isset($_POST['GaleriaEN']) && isset($_POST['GaleriaCA']) && $accion == "A")
	{
		//Query
	    $query="select max(orden) as maxorden from galerias";
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
	    $query="insert into galerias (GaleriaES,GaleriaCA,GaleriaEN,Orden,Fecha) values (";
	    $query.="'".$_POST['GaleriaES']."'";
	    $query.=",'".$_POST['GaleriaCA']."'";
	    $query.=",'".$_POST['GaleriaEN']."'";
		$query.=",".$orden;
		$query.=",'".date('Y/m/d H:i:s')."')";
	
		mysqli_query ($link, $query);
    }
    else if ($accion == "M")
    {
	  	//Query
	    $query="update galerias set GaleriaES='".$_POST['GaleriaES']."'";
	    $query.=", GaleriaCA='".$_POST['GaleriaCA']."'";
	    $query.=", GaleriaEN='".$_POST['GaleriaEN']."'";
		$query.=", Fecha='".date('Y/m/d H:i:s')."'";
	    $query.=" where IdGaleria=".$_POST['IdGaleria'];
	
	    mysqli_query ($link, $query);
		
		$accion = "A";
    }
    else if ($accion == "B")
    {
		//Query
		$query="select * from galerias where IdGaleria=".$_GET['IdGaleria'];
		$qGaleria=mysqli_query ($link, $query);
		$rowGaleria=mysqli_fetch_array($qGaleria);

		$idGaleria = $rowGaleria["IdGaleria"];
		$galeriaES = $rowGaleria["GaleriaES"];
		$galeriaCA = $rowGaleria["GaleriaCA"];
		$galeriaEN = $rowGaleria["GaleriaEN"];
		$accion = "M";
		
		mysqli_free_result($qGaleria);
    }
    else if ($accion == "E")
    {
		//Query
		$query="delete from galerias where IdGaleria=".$_GET['IdGaleria'];
		mysqli_query ($link, $query);
		$accion = "A";
    }
    else if ($accion == "U")
    {
		$query="select * from galerias where IdGaleria=".$_GET['IdGaleria'];
		$qGaleria=mysqli_query ($link, $query);
		$rowGaleria=mysqli_fetch_array($qGaleria);
		
		$idGaleriaAnt = $rowGaleria["IdGaleria"];
		$ordenAnt = $rowGaleria["Orden"];
		mysqli_free_result($qGaleria);
		
		$cambioOrdenAnt = $ordenAnt - 1;
		
		$query="select * from galerias where Orden=".$cambioOrdenAnt;
		$qGaleria=mysqli_query ($link, $query);
		$rowGaleria=mysqli_fetch_array($qGaleria);
		
		$idGaleriaPost = $rowGaleria["IdGaleria"];
		$ordenPost = $rowGaleria["Orden"];
		mysqli_free_result($qGaleria);
		
		$cambioOrdenPost = $ordenPost + 1;
		
		$query="update galerias set Orden=".$cambioOrdenAnt;
		$query.=" where IdGaleria=".$idGaleriaAnt;
		mysqli_query ($link, $query);
			
		$query="update galerias set Orden=".$cambioOrdenPost;
		$query.=" where IdGaleria=".$idGaleriaPost;
		mysqli_query ($link, $query);		
    }
    else if ($accion == "D")
    {
		$query="select * from galerias where IdGaleria=".$_GET['IdGaleria'];
		$qGaleria=mysqli_query ($link, $query);
		$rowGaleria=mysqli_fetch_array($qGaleria);
		
		$idGaleriaAnt = $rowGaleria["IdGaleria"];
		$ordenAnt = $rowGaleria["Orden"];
		mysqli_free_result($qGaleria);
		
		$cambioOrdenAnt = $ordenAnt + 1;
		
		$query="select * from galerias where Orden=".$cambioOrdenAnt;
		$qGaleria=mysqli_query ($link, $query);
		$rowGaleria=mysqli_fetch_array($qGaleria);
		
		$idGaleriaPost = $rowGaleria["IdGaleria"];
		$ordenPost = $rowGaleria["Orden"];
		mysqli_free_result($qGaleria);
		
		$cambioOrdenPost = $ordenPost - 1;
		
		$query="update galerias set Orden=".$cambioOrdenAnt;
		$query.=" where IdGaleria=".$idGaleriaAnt;
		mysqli_query ($link, $query);
			
		$query="update galerias set Orden=".$cambioOrdenPost;
		$query.=" where IdGaleria=".$idGaleriaPost;
		mysqli_query ($link, $query);	
    }

?>
<h1 class="text-center">GALERIAS</h1>
<form role="form" id="galeria" method="post" action="galerias.php">
	<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
	<input type="hidden" name="IdGaleria" id="IdGaleria" value=<?= $idGaleria ?>>
	
	<table class="table">
   		<tr class="d-flex">
			<td class="col-4 text-right">Galeria espa&ntilde;ol:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="GaleriaES" id="GaleriaES" value="<?= $galeriaES ?>"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Galeria catal&aacute;n:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="GaleriaCA" id="GaleriaCA" value="<?= $galeriaCA ?>"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Galeria ingl&eacute;s:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="GaleriaEN" id="GaleriaEN" value="<?= $galeriaEN ?>"></td>
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
	   			<th class="col-4 text-center">Galeria</th>
	   			<th class="col-2 text-center">Fotos</th>
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
	    $query="select * from galerias order by orden";
	    $qGalerias=mysqli_query ($link, $query);
	    $totalGalerias=mysqli_num_rows($qGalerias);
	
	    $x=0;
	    while($galeria=mysqli_fetch_array($qGalerias, MYSQLI_BOTH))
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
					<a href="galerias.php?Accion=U&IdGaleria=<?= $galeria["IdGaleria"] ?>"><img src="../../imagenes/up.gif"/></a>
<?php 
                }
?>
				</td>

				<td class="col-1">
<?php 
                if ($x==($totalGalerias-1))
                {
?>
					&nbsp;
<?php 
                }
                else
                {
?>
					<a href="galerias.php?Accion=D&IdGaleria=<?= $galeria["IdGaleria"] ?>"><img src="../../imagenes/down.gif"/></a>
<?php 
                }
?>
				</td>				
				
				<td class="col-4">
					<?= $galeria["GaleriaES"] ?>
				</td>
	   			
	   			<td class="col-2">
	   				<a href="fotos.php?IdGaleria=<?= $galeria["IdGaleria"] ?>"><img src="../../imagenes/camara.gif"/></a>
	   			</td>
			
				<td class="col-1">
	   				<a href="galerias.php?Accion=B&IdGaleria=<?= $galeria["IdGaleria"] ?>"><img src="../../imagenes/modificar.gif"/></a>
	   			</td>
	   			
	   			<td class="col-1">
	   				<a href="galerias.php?Accion=E&IdGaleria=<?= $galeria["IdGaleria"] ?>"><img src="../../imagenes/eliminar.gif"/></a>
	   			</td>
			
<?php 
                if ($_SESSION["tipo_usuario"] == 1){
?>
    				<td class="col-2 text-center">
    	   				<?= $galeria["Fecha"] ?>
    	   			</td>
<?php 
                }
?>
			</tr>
<?php    	
            $x++;
	    }
	    mysqli_free_result($qGalerias);
?>
	</table>

</form>	