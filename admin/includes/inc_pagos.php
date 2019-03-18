<?php
    $categoria = "";
    $resultado = 0;

	if (isset($_GET['IdCategoria']) || isset($_POST['IdCategoria']))
	{
		if (isset($_GET['IdCategoria']))
		{
			$idCategoria = $_GET['IdCategoria'];	
		}
		else
		{
			$idCategoria = $_POST['IdCategoria'];	
		}
		
		//Query
		$query="select * from categoria where IdCategoria=".$idCategoria;
		$qCategoria=mysqli_query ($link, $query);
		$rowCategoria=mysqli_fetch_array($qCategoria);
		
		$categoria = $rowCategoria["Categoria"];
		mysqli_free_result($qCategoria);
	}
	
	if (isset($_POST['Accion']))
	{
	  $totalJugadores = $_POST['TotalJugadores'];
	  $idsJugadoresTemp = $_POST['IdsJugadores'];
	  
	  $idsJugadores = explode("#",$idsJugadoresTemp);

	  for ($x=0;$x<$totalJugadores;$x++){
			$cambios = 0;
			$query = "select * from jugadores where IdJugador=".$idsJugadores[$x]." and IdCategoria=".$idCategoria;
			$qJugador=mysqli_query ($link, $query);
			$rowJugador=mysqli_fetch_array($qJugador);
		
			$idAbono1 = "Abono1_".$idsJugadores[$x];
			$idAbono2 = "Abono2_".$idsJugadores[$x];
			$idAbono3 = "Abono3_".$idsJugadores[$x];
			$idAbono4 = "Abono4_".$idsJugadores[$x];
			
			if ($_POST[$idAbono1] == ""){
				$abono1="NULL";
			}else{
				$abono1=$_POST[$idAbono1];
			}

			if ($abono1 != $rowJugador["Abono1"]){
			    if ($abono1 == 'NULL' && $rowJugador["Abono1"] == ''){
					$cambios = 0;
				} else {
					$cambios = 1;
				}
			}
			
			if ($_POST[$idAbono2] == ""){
				$abono2="NULL";
			}else{
				$abono2=$_POST[$idAbono2];
			}
			
			if ($cambios == 0 && $abono2 != $rowJugador["Abono2"]){
			    if ($abono2 == 'NULL' && $rowJugador["Abono2"] == ''){
					$cambios = 0;
				} else {
					$cambios = 1;
				}
			}
			
			if ($_POST[$idAbono3] == ""){
				$abono3="NULL";
			}else{
				$abono3=$_POST[$idAbono3];
			}
			
			if ($cambios == 0 && $abono3 != $rowJugador["Abono3"]){
			    if ($abono3 == 'NULL' && $rowJugador["Abono3"] == ''){
					$cambios = 0;
				} else {
					$cambios = 1;
				}
			}
			
			if ($_POST[$idAbono4] == ""){
				$abono4="NULL";
			}else{
				$abono4=$_POST[$idAbono4];
			}
			
			if ($cambios == 0 && $abono4 != $rowJugador["Abono4"]){
			    if ($abono4 == 'NULL' && $rowJugador["Abono4"] == ''){
					$cambios = 0;
				} else {
					$cambios = 1;
				}
			}
			
			if ($cambios == 1){
				$query="update jugadores set Abono1=".$abono1;
				$query.=", Abono2=".$abono2;
				$query.=", Abono3=".$abono3;
				$query.=", Abono4=".$abono4;
				$query.=", FechaModificacion=now()";
				$query.=" where IdJugador=".$idsJugadores[$x];
				$query.=" and IdCategoria=".$idCategoria;
				$resultado = mysqli_query ($link, $query);
				
				mysqli_free_result($qJugador);
			}
			//print ("<br>".$query.";");
		}
	}

	if ($categoria == "")
	{
?>
		<h1 class="text-center">PAGOS</h1>	
<?php 
	}
	else
	{
?>
		<h1 class="text-center">PAGOS <?= mb_strtoupper($categoria) ?></h1>
<?php 	
	}
	
?>

	<select class="form-control" name="categoria" onChange="location=this.options[this.selectedIndex].value">
		<option value="pagos.php?IdCategoria=1">Categoria</option>

<?php
            //Query
            $query="select * from categoria where maestro=1 order by orden";
            $qcategorias=mysqli_query ($link, $query);

            while($categoriaSelect=mysqli_fetch_array($qcategorias, MYSQLI_BOTH))
            {
                $seleccionado = "";
                if ($categoriaSelect["IdCategoria"] == $idCategoria)
                {
                    $seleccionado = "selected";
                }
?>
					<option value="pagos.php?IdCategoria=<?= $categoriaSelect["IdCategoria"] ?>" <?= $seleccionado ?>><?= $categoriaSelect["Categoria"] ?></option>
<?php
            }
            mysqli_free_result($qcategorias);
?>
	</select>


<?php
	
	if ($resultado == 1)
	{
?>
		<p class="text-center">Cambios realizados</p>
<?php 
	}
				
	if ($categoria != "")
	{ 
?>		
		<form role="form" id="pago" method="post" action="pagos.php">
			<input type="hidden" name="Accion" id="Accion" value="A">
			<input type="hidden" name="IdCategoria" id="IdCategoria" value=<?= $idCategoria ?>>
			</br></br>

			<table class="table table-bordered">
           		<thead class="thead-dark">
        	   		<tr class="d-flex">
        	   			<th class="col-3 text-center">Jugador</th>
        	   			<th class="col-1 text-center">Abono1</th>
        	   			<th class="col-1 text-center">Abono2</th>
        	   			<th class="col-1 text-center">Abono3</th>
        	   			<th class="col-1 text-center">Abono4</th>
        	   			<th class="col-3 text-center">Total</th>
        	   			<th class="col-2 text-center">
<?php 
                            if ($_SESSION["tipo_usuario"] == 1){
?>
								Fecha
<?php 
                            }
?>
						</th>
           			</tr>  
           		</thead>
	 
<?php
    	  	//Query
            $query="select * from jugadores where IdCategoria=".$idCategoria." and Entrenador=0 order by Nombre";
    	    $qJugadores=mysqli_query ($link, $query);
    	    
    	    $filas=mysqli_num_rows($qJugadores);
    	    $idsJugadores = "";
    	    
    	    while($jugador=mysqli_fetch_array($qJugadores, MYSQLI_BOTH))
    	    {
    	        $abono1=$jugador["Abono1"];
    	        $abono2=$jugador["Abono2"];
    	        $abono3=$jugador["Abono3"];
    	        $abono4=$jugador["Abono4"];
    	        $total=$abono1+$abono2+$abono3+$abono4;
    	        
    	        $idsJugadores .= $jugador["IdJugador"]."#";
    	        
    	        $nombre = buscaJugador($jugador["IdJugador"], $link);
	    
?>
				<tr class="d-flex">
					<td class="col-3">
						<?= $nombre ?>
					</td>
					<td class="col-1 text-center">
						<input type="text" class="form-control" name="Abono1_<?= $jugador["IdJugador"] ?>" id="Abono1_<?= $jugador["IdJugador"] ?>" value="<?= $abono1 ?>" onChange="actualizarTotal('<?= $jugador["IdJugador"] ?>', this, 1);">
					</td>
					<td class="col-1 text-center">
						<input type="text" class="form-control" name="Abono2_<?= $jugador["IdJugador"] ?>" id="Abono2_<?= $jugador["IdJugador"] ?>" value="<?= $abono2 ?>" onChange="actualizarTotal('<?= $jugador["IdJugador"] ?>', this, 2);">
					</td>
					<td class="col-1 text-center">
						<input type="text" class="form-control" name="Abono3_<?= $jugador["IdJugador"] ?>" id="Abono3_<?= $jugador["IdJugador"] ?>" value="<?= $abono3 ?>" onChange="actualizarTotal('<?= $jugador["IdJugador"] ?>', this, 3);">
					</td>
					<td class="col-1 text-center">
						<input type="text" class="form-control"name="Abono4_<?= $jugador["IdJugador"] ?>" id="Abono4_<?= $jugador["IdJugador"] ?>" value="<?= $abono4 ?>" onChange="actualizarTotal('<?= $jugador["IdJugador"] ?>', this, 4);">
					</td>
					<td class="col-3 text-center">
						<input type="text" class="form-control" name="Total_<?= $jugador["IdJugador"] ?>" id="Total_<?= $jugador["IdJugador"] ?>" value="<?= $total ?>" disabled="disabled">
					</td>
					<td class="col-2 text-center">
<?php 
                            if ($_SESSION["tipo_usuario"] == 1){
                                print($jugador["FechaModificacion"]);
                            }
?>
					</td>
				</tr>
<?php    	
			}
			mysqli_free_result($qJugadores);
?>
    			<input type="hidden" name="TotalJugadores" id="TotalJugadores" value=<?= $filas ?>>
    			<input type="hidden" name="IdsJugadores" id="IdsJugadores" value=<?= $idsJugadores ?>>
				
				<tr class="d-flex">
        			<td class="col-4">&nbsp;</td>
               		<td class="col-4 text-center">
						<button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button>
					</td>
               		<td class="col-4">&nbsp;</td>
				</tr>
			</table>
		</form>	
<?php
	}
?>	