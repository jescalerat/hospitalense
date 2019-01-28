<?php
//---------------------------------------------------------------------------------------------------------------
    //Paginación
	$registros = 20;

	if (!isset($_GET['paginacion'])) {
		$inicio = 0; 
		$pagina = 1; 
	} 
	else { 
		$pagina=$_GET['paginacion'];
		$inicio = ($pagina - 1) * $registros; 
	} 
	//Fin paginación
//---------------------------------------------------------------------------------------------------------------

	//Buscar las poblaciones de los equipos que tengo
	$query="select * from poblaciones where IdPoblacion in (select Poblacion from equipos where Maestro=1) and IdPoblacion != 9999 order by Poblacion";
	$qpoblacion=mysqli_query ($link, $query);

?>	
	
	<h1 class="text-center"><?= cambiarAcentos(strtoupper(_EQUIPOSBUSCADOR)) ?></h1>
	<div class="container">
		<form class="form-inline" role="form" action="javascript:llamada_prototype('paginas/equipos.php','principal','2','buscarequipo');" method="POST" name="buscarequipo" id="buscarequipo">
    		<div class="form-group">
            	<label class="col-2" for="nombre">
            		<?= cambiarAcentos(_EQUIPOSBUSCADORNOMBRE) ?>
            	</label>
            	<div class="col-3">
                	<input class="form-control" type="text" name="nombrebuscar" id="nombrebuscar" autofocus>
                </div>
                <div class="col-2">
                	<button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button>
                </div>
               
                
            
            	<label class="col-2" for="nombre">
            		<?= cambiarAcentos(_EQUIPOSBUSCADORPOBLACION) ?>
            	</label>
            	<div class="col-3">
                	<select class="form-control" name="poblacion" onChange="location=this.options[this.selectedIndex].value">
    	                <option value="javascript:llamada_prototype('equipos.php?poblacion=#','principal')"><?= cambiarAcentos(_POBLACION) ?>
<?php                
                            while($poblacion=mysqli_fetch_array($qpoblacion, MYSQLI_BOTH))
    	                    {
?>                            
                        		<option value="javascript:llamada_prototype('paginas/equipos.php?poblacion=<?= $poblacion["IdPoblacion"] ?>','principal')"><?= $poblacion["Poblacion"] ?>
<?php                                
                        	}
                        	mysqli_free_result($qpoblacion);
?>                        
            		</select>
                </div>
            </div>
        </form>
    </div>
       
<?php 
    $titulobusqueda="";
	
	//En el caso de que se haya seleccionado algun criterio de busqueda
	if (isset($_POST['nombrebuscar']) || isset($_GET['nombrebuscar']) || isset($_GET['poblacion']))
	{
		//Buscar por cualquier criterio de la bbdd
		if (isset($_POST['nombrebuscar']) || isset($_GET['nombrebuscar']))
		{
			if (isset($_POST['nombrebuscar']))
			{
				$nombreabuscar=$_POST['nombrebuscar'];
			}
			else
			{
				$nombreabuscar=$_GET['nombrebuscar'];
			}
			
			$titulobusqueda=cambiarAcentos(_BUSCARTODOEQUIPOS).$nombreabuscar;
			$queryequipos="select * from equipos where (NombreEquipo like \"%".$nombreabuscar."%\" or NombreCompleto like \"%".$nombreabuscar."%\" or Poblacion like \"%".$nombreabuscar."%\") and Maestro=1 order by NombreEquipo";

			$querypaginacion="select * from equipos where (NombreEquipo like \"%".$nombreabuscar."%\" or NombreCompleto like \"%".$nombreabuscar."%\" or Poblacion like \"%".$nombreabuscar."%\") and Maestro=1 order by NombreEquipo LIMIT ".$inicio.", ".$registros;
		}
		else 
		{
			$idpoblacion = $_GET['poblacion'];
	
			//Cambiar el id que busco por el nombre de la poblaci�n
			$query="select * from poblaciones where IdPoblacion = ".$idpoblacion;
			
			$qpoblacion=mysqli_query ($link, $query);
			$rowpoblacion=mysqli_fetch_array($qpoblacion);

			$titulobusqueda=cambiarAcentos(_BUSCARPOBLACIONEQUIPOS).$rowpoblacion["Poblacion"];

			$queryequipos="select * from equipos where Poblacion=".$idpoblacion." and Maestro=1 order by NombreEquipo";

			$querypaginacion="select * from equipos where Poblacion=".$idpoblacion." and Maestro=1 order by NombreEquipo LIMIT ".$inicio.", ".$registros;
		}
	}
	else
	{
		//Buscar los equipos que tengo
		$queryequipos="select * from equipos where Maestro=1 order by NombreEquipo";

		$querypaginacion="select * from equipos where Maestro=1 order by NombreEquipo LIMIT ".$inicio.", ".$registros;
	}

	//Una vez que tengo la query la ejecuto
	$qequipos=mysqli_query($link, $queryequipos);
	
	//Obtener el numero de filas devuelto
	$totalequipos=mysqli_num_rows($qequipos);
	mysqli_free_result($qequipos);
	
	//Querys paginacion
	$resultados = mysqli_query($link, $querypaginacion);
	$total_paginas = ceil($totalequipos / $registros);
?>
	<?= $titulobusqueda ?>
	<p>
	<?= _BUSCARTOTALEQUIPOS.$totalequipos ?>
	<p>

<?php 	
	if ($totalequipos > 0){
	    $criterio="";
?>
		<div id="equipos">
			<table class="table table-striped table-sm">
				<div class="list-group">
<?php			
    				while($equipos=mysqli_fetch_array($resultados, MYSQLI_BOTH))
    				{
    				    $criterios="?identificador=".$equipos["IdEquipo"]."&paginacion=".$pagina;
    				    if (isset($idpoblacion))
    				    {
    				        $criterios.="&idpoblacion=".$idpoblacion;
    				        $criterio="&poblacion=".$idpoblacion;
    				    }
    				    if (isset($nombreabuscar))
    				    {
    				        $criterios.="&nombrebuscar=".elimina_acentos($nombreabuscar);
    				        $criterio="&nombrebuscar=".elimina_acentos($nombreabuscar);
    				    }
?>
						<tr>
							<td>
								<a class="list-group-item list-group-item-action list-group-item-light" href="javascript:llamada_prototype('paginas/mostrar_equipos.php<?= $criterios ?>','principal')"><?= $equipos["NombreEquipo"] ?></a>
							</td>
						</tr>
<?php 
    				}
    				mysqli_free_result($resultados);
?>
    			</div>
    		</table>

    		<p>
    
    		<nav aria-label="Page navigation example">
				<ul class="pagination pagination-sm justify-content-center">
<?php
    			if(($pagina - 1) > 0)
    			{
?>				
    				<li class="page-item">
    					<a class="page-link" href="javascript:llamada_prototype('paginas/equipos.php?paginacion=<?= ($pagina-1).$criterio ?>','principal');"><?= cambiarAcentos(_BUSCARANTERIOR) ?></a>
    				</li>
<?php				
                }
				
                for ($i=1; $i<=$total_paginas; $i++){ 
				    if ($pagina == $i)
			     	{
?>					
						<li class="page-item active"><a class="page-link" href="#"><?= $pagina ?></a></li>
<?php					
				    }
				    else
				    {
?>					
    					<li class="page-item">
    						<a class="page-link" href="javascript:llamada_prototype('paginas/equipos.php?paginacion=<?= ($i).$criterio ?>','principal');"> <?= ($i) ?> </a>
    					</li>
<?php
    				}
	       		}
			  
                if(($pagina + 1)<=$total_paginas)
                {
?>				
    				<li class="page-item">
    					<a class="page-link" href="javascript:llamada_prototype('paginas/equipos.php?paginacion=<?= ($pagina+1).$criterio ?>','principal');"><?= cambiarAcentos(_BUSCARSIGUIENTE) ?></a>
    				</li>
<?php				
				}
?>			
				</ul>
			</nav>
		</div>
<?php	
	}//if ($totalequipos > 0)
?>
