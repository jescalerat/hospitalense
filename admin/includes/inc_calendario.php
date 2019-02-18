<?php
    $categoria = "";	
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
        $totalPartidos = $_POST['TotalPartidos'];
        $primerId = $_POST['PrimerId'];
	  
        for ($x=0;$x<$totalPartidos;$x++)
		{
            $idResult1 = "resultequipo1#".$primerId;
			$idResult2 = "resultequipo2#".$primerId;
			$idCampo = "campo#".$primerId;
			$idHora = "hora#".$primerId;
			$idMinutos = "minutos#".$primerId;
			$idFecha = "fecha#".$primerId;
			$idDia = "dia#".$primerId;
			$idAplazado = "aplazado#".$primerId;
			$idSuspendido = "suspendido#".$primerId;
			
			if ($_POST[$idResult1] == ""){
				$resultado1="NULL";
			}else{
				$resultado1=$_POST[$idResult1];
			}
			
			if ($_POST[$idResult2] == ""){
				$resultado2="NULL";
			}else{
				$resultado2=$_POST[$idResult2];
			}
			
			if ($_POST[$idAplazado] == ""){
			    $aplazadoTemp=0;
			}else{
			    $aplazadoTemp=1;
			}
			
			if ($_POST[$idSuspendido] == ""){
			    $suspendidoTemp=0;
			}else{
			    $suspendidoTemp=1;
			}
			
			if ($aplazadoTemp == 0 && $suspendidoTemp == 0){
			    $aplazado = "NULL"; 
			} else {
			    if ($aplazadoTemp == 1){
                    $aplazado = 1;
			    } else {
			        $aplazado = 2;
			    }
			}
			
			$query="update liga set ResultEquipo1=".$resultado1;
            $query.=", ResultEquipo2=".$resultado2;
            $query.=", Campo=".$_POST[$idCampo];
            $query.=", Hora='".$_POST[$idHora]."'";
            $query.=", Minutos='".$_POST[$idMinutos]."'";
            $query.=", Fecha='".$_POST[$idFecha]."'";
            $query.=", DiaSemana=".$_POST[$idDia];
            $query.=", Aplazado=".$aplazado;
            $query.=" where IdLiga=".$primerId;
			mysql_query ($query,$link);
			print ("<br>".$query.";");

			$primerId++;
		}
	}
	

?>

<?php
	if ($categoria == "")
	{
?>
		<h1 class="text-center">CALENDARIO</h1>
<?php	
	}
	else
	{
?>
		<h1 class="text-center">CALENDARIO <?= strtoupper($categoria) ?></h1>
<?php 	
	}
?>

	<select class="form-control" name="categoria" onChange="location=this.options[this.selectedIndex].value">
			<option value="calendario.php?IdCategoria=1">Categoria</option>
<?php
				//Query
                $query="select * from categoria where maestro=1 order by orden";
				$qcategorias=mysqli_query ($link, $query);
				
				while($categoriaSelect=mysqli_fetch_array($qcategorias, MYSQLI_BOTH))
				{
?>
					<option value="calendario.php?IdCategoria=<?= $categoriaSelect["IdCategoria"] ?>"><?= $categoriaSelect["Categoria"] ?></option>
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
		$primerId = $rowLiga["IdLiga"];

		//Obtener el numero de filas devuelto
		$totalresultados=mysqli_num_rows($qLiga);
		mysqli_free_result($qLiga);
?>		
		<form action="calendario.php" method="post" name="calendario" id="calendario">
			<input type="hidden" name="Accion" id="Accion" value="A">
			<input type="hidden" name="IdCategoria" id="IdCategoria" value=<?= $idCategoria ?>>
			<table class="table table-bordered">
           		<tr class="d-flex">
        			<td class="col-4 text-center">&nbsp;</td>
               		<td class="col-4 text-center">
						<select class="form-control" name="jornada" onChange="location=this.options[this.selectedIndex].value">");
							<option value="calendario.php?Jornada=1&IdCategoria=<?= $idCategoria ?>">Jornada</option>
<?php
                            for ($x=1;$x<=$totaljornadas;$x++)
                            {
?>
								<option value="calendario.php?Jornada=<?= $x ?>&IdCategoria=<?= $idCategoria ?>"><?= $x.superindice($x) ?>Jornada</option>										
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
						<input type="hidden" name="TotalPartidos" id="TotalPartidos" value="<?= $totalresultados ?>">
						<input type="hidden" name="PrimerId" id="PrimerId" value="<?= $primerId?>">
               		</td>
               		<td class="col-4 text-center">&nbsp;</td>
				</tr>        			
<?php 
                $query="Select * from liga where Jornada=".$jornada." and IdCategoria=".$idCategoria." order by IdLiga";
                $qLigas=mysqli_query ($link, $query);
                
                while($liga=mysqli_fetch_array($qLigas, MYSQLI_BOTH))
                {
                    $nombreEquipo1 = buscaEquipo($liga["Equipo1"], $link);
                    $twitter = buscaTwitter($liga["Equipo1"], $link);
                    if ($twitter != null){
                        $nombreEquipo1 = $twitter;
                    }
                    
                    $nombreEquipo2 = buscaEquipo($liga["Equipo2"], $link);
                    $twitter = buscaTwitter($liga["Equipo2"], $link);
                    if ($twitter != null){
                        $nombreEquipo2 = $twitter;
                    }
?>			
				<tr class="d-flex">
        			<td class="col-4 text-center"><?= $nombreEquipo1 ?></td>
               		<td class="col-2 text-center">
               			<input type="text" name="resultequipo1#<?= $liga["IdLiga"] ?>" id="resultequipo1#<?= $liga["IdLiga"] ?>" value=<?= $liga["ResultEquipo1"] ?>>
               		</td>
               		<td class="col-2 text-center">
               			<input type="text" name="resultequipo2#<?= $liga["IdLiga"] ?>" id="resultequipo2#<?= $liga["IdLiga"] ?>" value=<?= $liga["ResultEquipo2"] ?>>
               		</td>
               		<td class="col-4 text-center"><?= $nombreEquipo2 ?></td>
				</tr>    

<?php
                $query="Select c.* from equipo_campos ec, campos c where ec.IdCampo=c.IdCampo and ec.IdEquipo=".$liga["Equipo1"];
                $qcampos=mysqli_query ($link, $query);
?>	
				
				<tr class="d-flex">
        			<td class="col-4 text-center">
        				<select class="form-control" name="campo#<?= $liga["IdLiga"] ?>" id="campo#<?= $liga["IdLiga"] ?>">
       						<option value=""></option>
<?php 
                        while($campos=mysqli_fetch_array($qcampos, MYSQLI_BOTH))
                        {
                            $seleccionado = "";
                            if ($campos["IdCampo"] == $liga["Campo"])
                            {
                                $seleccionado = "selected";
                            }
?>       			
							<option value="<?= $campos["IdCampo"] ?>" <?= $seleccionado ?>><?= $campos["Nombre"] ?></option>
<?php 
                        }
                        mysqli_free_result($qcampos);
?>
						</select>
        			</td>
               		<td class="col-2 text-center">
               			<input type="text" name="hora#<?= $liga["IdLiga"] ?>" id="hora#<?= $liga["IdLiga"] ?>" value=<?= $liga["Hora"] ?>>
               		</td>
               		<td class="col-2 text-center">
               			<input type="text" name="minutos#<?= $liga["IdLiga"] ?>" id="minutos#<?= $liga["IdLiga"] ?>" value=<?= $liga["Minutos"] ?>>
               		</td>
               		<td class="col-4 text-center">
               			<input type="text" name="fecha#<?= $liga["IdLiga"] ?>" id="fecha#<?= $liga["IdLiga"] ?>" value=<?= $liga["Fecha"] ?>>
               			<input type="text" name="dia#<?= $liga["IdLiga"] ?>" id="dia#<?= $liga["IdLiga"] ?>" value=<?= $liga["DiaSemana"] ?>>
               		</td>
				</tr> 
				
				<tr class="d-flex">
        			<td class="col-2 text-center">&nbsp;</td>
        			<td class="col-4 text-center">
        				<div class="checkbox"> 
<?php 
                            $checkAplazado="";
                            if ($liga["Aplazado"] == 1){
                                $checkAplazado="checked";
                            }
?>
	                        <label><input type="checkbox" name="aplazado#<?= $liga["IdLiga"] ?>" id="aplazado#<?= $liga["IdLiga"] ?>" value="<?= $checkAplazado ?>">Aplazado</label>
                        </div>
        			</td>
        			<td class="col-4 text-center">
        				<div class="checkbox"> 
<?php 
                            $checkSuspendido="";
                            if ($liga["Aplazado"] == 2){
                                $checkSuspendido="checked";
                            }
?>
	                        <label><input type="checkbox" name="suspendido#<?= $liga["IdLiga"] ?>" id="suspendido#<?= $liga["IdLiga"] ?>" <?= $checkSuspendido ?>>Suspendido</label>
                        </div>
        			</td>
        			<td class="col-2 text-center">&nbsp;</td>
        		</tr>

<?php
                } //while($liga=mysqli_fetch_array($qLigas, MYSQLI_BOTH))
?>
				<tr class="d-flex">
           			<td class="col-5 text-center">&nbsp;</td>
        			<td class="col-2 text-center"><button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button></td>
        			<td class="col-5 text-center">&nbsp;</td>
        		</tr>
			</table>
		</form>	
<?php
	} //if ($categoria != "")
?>	