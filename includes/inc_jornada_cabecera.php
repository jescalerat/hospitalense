<?php
	//Query
    $query="Select * from parametros where IdCategoria=".$categoria;
	$qparametros=mysqli_query ($link, $query);
	$rowparametros=mysqli_fetch_array($qparametros);
        
    $totaljornadas=$rowparametros["TotalJornadas"];

    if ($tipo==1)
    {
?>
		<div class="row">
            <div class="col-5">
                &nbsp;
            </div>
            <div class="col-2">
	            <select class="form-control" name="jornada" onChange="location=this.options[this.selectedIndex].value">
	                <option value="javascript:llamada_prototype('includes/inc_resultados.php?Jornada=1&IdCategoria=<?= $categoria ?>&recarga=1','cargando_resultados')"><?= _JORNADA ?>
<?php                
	                    for ($x=1;$x<=$totaljornadas;$x++)
	                    {
?>                            
                        	<option value="javascript:llamada_prototype('includes/inc_resultados.php?Jornada=<?= $x ?>&IdCategoria=<?= $categoria ?>&recarga=1','cargando_resultados')"><?= $x.superindice($x)." "._JORNADA ?>
<?php                                
                    	}
?>                        
            	</select>
            
            </div>
            <div class="col-5">
                &nbsp;
            </div>
        </div>
<?php                
    }
    if ($tipo==2)
    {
?>            
        <div class="row">
            <div class="col-5">
                &nbsp;
            </div>
            <div class="col-2">
	            <select class="form-control" name="jornada" onChange="location=this.options[this.selectedIndex].value">
	                <option value="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?Jornada=1&IdCategoria=<?= $categoria ?>&recarga=1','cargando_clasificacion')"><?= _JORNADA ?>
<?php
                    for ($x=1;$x<=$totaljornadas;$x++)
                    {
?>                        
                        <option value="javascript:llamada_prototype('includes/inc_mostrar_clasificacion.php?Jornada=<?= $x ?>&IdCategoria=<?= $categoria ?>&recarga=1','cargando_clasificacion')"><?= $x.superindice($x)." "._JORNADA ?>
<?php       
                    }
?>                        
            	</select>
			</div>
            <div class="col-5">
                &nbsp;
            </div>
        </div>           
<?php
    }
?>
