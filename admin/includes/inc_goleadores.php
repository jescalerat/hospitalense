<?php
    $categoria = "";
    $idCategoriaJugador = "";
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

	if (isset($_GET['IdCategoriaJugador']) || isset($_POST['IdCategoriaJugador']))
	{
		if (isset($_GET['IdCategoriaJugador']))
		{
			$idCategoriaJugador = $_GET['IdCategoriaJugador'];	
		}
		else
		{
			$idCategoriaJugador = $_POST['IdCategoriaJugador'];	
		}
	}

	if (isset($_POST['IdJugador']))
	{
		$idCategoria = $_POST['IdCategoria'];
		$idLiga = $_POST['IdLiga'];
		$idJugador = $_POST['IdJugador'];
		$resultado = $_POST['Resultado'];
		$minuto = $_POST['Minuto'];
		$tipoGol = 1;
		if (isset($_POST['Penalti'])){
			$tipoGol = 2;
		}
		if (isset($_POST['Propia'])){
			$tipoGol = 3;
			$idJugador = 9999;			
		}
		$query="insert into goleadores (IdCategoria,IdLiga,IdJugador,Tipo,Resultado,Minuto) values (".$idCategoria.",".$idLiga.",".$idJugador.",".$tipoGol.",'".$resultado."','".$minuto."')";
		mysqli_query ($link, $query);
		print($query);
	}
	
	if (isset($_GET['IdJugadorB']))
	{
	    $query="delete from goleadores where IdGoleador=".$_GET['IdJugadorB'];
		mysqli_query ($link, $query);
	}

?>

<?php
	if ($categoria == "")
	{
?>
		<h1 class="text-center">GOLEADORES</h1>	
<?php
	}
	else
	{
?>
		<h1 class="text-center">GOLEADORES <?= strtoupper($categoria) ?></h1>	
<?php
    }
?>

	<select class="form-control" name="categoria" onChange="location=this.options[this.selectedIndex].value">
		<option value="goleadores.php?IdCategoria=1">Categoria</option>

<?php
            //Query
            $query="select * from categoria where maestro=1 order by orden";
            $qcategorias=mysqli_query ($link, $query);

            while($categoriaSelect=mysqli_fetch_array($qcategorias, MYSQLI_BOTH))
            {
?>
					<option value="goleadores.php?IdCategoria=<?= $categoriaSelect["IdCategoria"] ?>"><?= $categoriaSelect["Categoria"] ?></option>
<?php
            }
            mysqli_free_result($qcategorias);
?>
	</select>

<?php
	if ($categoria != "")
	{ 
			if(isset($_GET['Jornada']) || isset($_POST['Jornada']))
			{
				if (isset($_GET['Jornada']))
				{
					$jornada = $_GET['Jornada'];
				}
				else
				{
					$jornada = $_POST['Jornada'];
				}
			}
			else
			{
			    $query="select max(Jornada) as Jornada from liga where ResultEquipo1 is not null and ResultEquipo2 is not null and IdCategoria=".$idCategoria;
			    $qJornada=mysqli_query ($link, $query);
			    $rowJornada=mysqli_fetch_array($qJornada);
			    
			    $jornada=$rowJornada["Jornada"];
			    mysqli_free_result($qJornada);
			    
			    if ($jornada==null)
			    {
			        $jornada=1;
			    }
			}
			
			$query="Select * from parametros where IdCategoria=".$idCategoria;
			$qParametros=mysqli_query ($link, $query);
			$rowParametros=mysqli_fetch_array($qParametros);
			
			$totaljornadas=$rowParametros["TotalJornadas"];
			mysqli_free_result($qParametros);
			
			$query="Select * from liga where Jornada=".$jornada." and IdCategoria=".$idCategoria." order by IdLiga";
			$qLiga=mysqli_query ($link, $query);
			$rowLiga=mysqli_fetch_array($qLiga);
			$idLiga = $rowLiga["IdLiga"];

?>		
		<form role="form" id="formgoleadores" method="post" action="goleadores.php">
			<input type="hidden" name="IdCategoria" id="IdCategoria" value=<?= $idCategoria ?>>
			<input type="hidden" name="IdCategoriaJugador" id="IdCategoriaJugador" value=<?= $idCategoriaJugador ?>>
			<input type="hidden" name="IdLiga" id="IdLiga" value=<?= $idLiga ?>>

			<table class="table table-bordered">
           		<tr class="d-flex">
        			<td class="col-4 text-center">&nbsp;</td>
               		<td class="col-4 text-center">
						<select class="form-control" name="jornada" onChange="location=this.options[this.selectedIndex].value">
							<option value="goleadores.php?Jornada=1&IdCategoria=<?= $idCategoria ?>">Jornada</option>
<?php
                            for ($x=1;$x<=$totaljornadas;$x++)
                            {
?>
								<option value="goleadores.php?Jornada=<?= $x ?>&IdCategoria=<?= $idCategoria ?>"><?= $x.superindice($x) ?>Jornada</option>										
<?php
                            }
?>
						</select>
               		</td>
               		<td class="col-4 text-center">&nbsp;</td>
				</tr>
				
				<tr class="d-flex">
        			<td class="col-4 text-center">&nbsp;</td>
               		<td class="col-4 text-center">
						<?= $jornada.superindice($jornada) ?> Jornada
						<input type="hidden" name="Jornada" id="Jornada" value="<?= $jornada ?>">
               		</td>
               		<td class="col-4 text-center">&nbsp;</td>
				</tr>    
		
<?php
					$nombreEquipo1 = buscaEquipo($rowLiga["Equipo1"], $link);
					if (buscaTwitter($rowLiga["Equipo1"], $link)!=null){
					    $nombreEquipo1 = buscaTwitter($rowLiga["Equipo1"], $link);
					}
					
					$nombreEquipo2 = buscaEquipo($rowLiga["Equipo2"], $link);
					if (buscaTwitter($rowLiga["Equipo2"], $link)!=null){
					    $nombreEquipo2 = buscaTwitter($rowLiga["Equipo2"], $link);
					}
		
?>	

				<tr class="d-flex">
        			<td class="col-4 text-right"><?= $nombreEquipo1 ?></td>
               		<td class="col-2 text-center">
						<?= $rowLiga["ResultEquipo1"] ?>
               		</td>
               		<td class="col-2 text-center">
						<?= $rowLiga["ResultEquipo2"] ?>
               		</td>
               		<td class="col-4"><?= $nombreEquipo2 ?></td>
				</tr>   
<?php 
                $query="select * from categoria where maestro=1 and retirado=0 order by orden";
                $qCategoriaJug=mysqli_query ($link, $query);
                
                
?>				
				<tr class="d-flex">
        			<td class="col-4 text-center">&nbsp;</td>
               		<td class="col-4 text-center">
						<select class="form-control" name="categoriaJugadores" onChange="location=this.options[this.selectedIndex].value">
							<option value="goleadores.php?Jornada=1&IdCategoria=<?= $idCategoria ?>">Otra categoria</option>
<?php
                            while($catJug=mysqli_fetch_array($qCategoriaJug, MYSQLI_BOTH))
                            {
?>
								<option value="goleadores.php?Jornada=<?= $jornada ?>&IdCategoriaJugador=<?= $catJug["IdCategoria"] ?>&IdCategoria=<?= $idCategoria ?>"><?= $catJug["Categoria"] ?></option>										
<?php
                            }
                            mysqli_free_result($qCategoriaJug);
?>
						</select>
               		</td>
               		<td class="col-4 text-center">&nbsp;</td>
				</tr>    
			
<?php
				$idCategoriaBuscaJugador = $idCategoria;
				if ($idCategoriaJugador != ""){
					$idCategoriaBuscaJugador = $idCategoriaJugador;
				}
				
				$query="select * from jugadores where IdCategoria=".$idCategoriaBuscaJugador." order by Nombre";
				$qJugadores=mysqli_query ($link, $query);

?>

				<tr class="d-flex">
        			<td class="col-4 text-center">&nbsp;</td>
               		<td class="col-4 text-center">
						<select class="form-control" name="IdJugador" id="IdJugador">
							<option value="">Jugador</option>
<?php
                            while($jugador=mysqli_fetch_array($qJugadores, MYSQLI_BOTH))
                            {
                                $nombreJugador =  buscaJugador($jugador["IdJugador"],$link)
?>
								<option value=<?= $jugador["IdJugador"] ?>><?= $nombreJugador ?></option>										
<?php
                            }
                            mysqli_free_result($qJugadores);
?>
						</select>
               		</td>
               		<td class="col-4 text-center">
               			<label><input type="checkbox" name="Penalti" id="Penalti">Penalti</label>
               			<br>
               			<label><input type="checkbox" name="Propia" id="Propia">Propia Puerta</label>
               		</td>
				</tr> 
				
				<tr class="d-flex">
        			<td class="col-4 text-right">Resultado: </td>
               		<td class="col-2 text-center">
						<input type="text" class="form-control" name="Resultado" id="Resultado" maxlength="5">
               		</td>
               		<td class="col-4 text-right">Minuto: </td>
               		<td class="col-2 text-center">
						<input type="text" class="form-control" name="Minuto" id="Minuto" maxlength="2">
               		</td>
				</tr>  
				
				<tr class="d-flex">
        			<td class="col-4">&nbsp;</td>
               		<td class="col-4 text-center">
						<button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button>
					</td>
               		<td class="col-4">&nbsp;</td>
				</tr> 
		
<?php

			$query="select * from goleadores where IdCategoria=".$idCategoria." and IdLiga=".$idLiga;
			$qGoleadores=mysqli_query ($link, $query);
				
			while($goleador=mysqli_fetch_array($qGoleadores, MYSQLI_BOTH))
			{
				$nombreJugador = buscaJugador($goleador["IdJugador"],$link);
					
				if ($goleador["Tipo"] == 2){
					$nombreJugador .= " (P)";
				}

?>
				
				<tr class="d-flex">
        			<td class="col-6"><?= $nombreJugador ?></td>
               		<td class="col-2 text-center">
						<?= $goleador["Resultado"] ?>
					</td>
               		<td class="col-2 text-center">
						<?= $goleador["Minuto"] ?>
					</td>
					<td class="col-2 text-center">
						<a href="goleadores.php?IdJugadorB=<?= $goleador["IdGoleador"] ?>&Jornada=<?= $jornada ?>&IdCategoriaJugador=<?= $idCategoriaJugador ?>&IdCategoria=<?= $idCategoria ?>"><img src="../../imagenes/eliminar.gif"/></a>
					</td>
				</tr> 
				
<?php
			}
			mysqli_free_result($qGoleadores);
?>

			</table>
		</form>	
<?php
        mysqli_free_result($qLiga);
	}
?>	