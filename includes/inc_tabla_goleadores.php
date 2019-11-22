<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    require_once("conexiones.php");
    
    $query="Select * from categoria where retirado=0 order by Orden";
    $q=mysqli_query ($link, $query);
    

?>
	<h1 class="text-center"><?= cambiarAcentos(_GOLEADORES) ?></h1>
	
	<div class="row">
        <div class="col-5">
            &nbsp;
        </div>
        <div class="col-2">
            <select class="form-control" name="IdCategoria" onChange="location=this.options[this.selectedIndex].value">
                <option value="javascript:llamada_prototype('paginas/tabla_goleadores.php?IdCategoria=0','principal')"><?= _CATEGORIA ?>
<?php                
                    while($categoria=mysqli_fetch_array($q, MYSQLI_BOTH))
                    {
                        $seleccionado = "";
                        if ($idCategoria == $categoria["IdCategoria"]){
                            $seleccionado="selected";
                        }
?>                            
                	   	<option <?= $seleccionado ?> value="javascript:llamada_prototype('paginas/tabla_goleadores.php?IdCategoria=<?= $categoria["IdCategoria"] ?>','principal')"><?= cambiarAcentos($categoria["Categoria"]) ?>
<?php                                
                    }
?>                        
			</select>
            
		</div>
        <div class="col-5">
        	&nbsp;
        </div>
    </div>

	<table class="table table-bordered">
   		<thead class="thead-dark">
	   		<tr class="d-flex">
	   			<th class="col-3 text-center"><?= cambiarAcentos(_JUGADOR) ?></th>  <!-- Jugador  -->
	   			<th class="col-3 text-center"><?= cambiarAcentos(_CATEGORIA) ?></th>  <!-- Categoria  -->
	   			<th class="col-2 text-center"><?= cambiarAcentos(_TOTAL) ?></th> <!-- Total goles  -->
	   			<th class="col-2 text-center"><?= cambiarAcentos(_JUGADA) ?></th> <!-- Goles jugada  -->
	   			<th class="col-2 text-center"><?= cambiarAcentos(_PENALTI) ?></th> <!-- Goles penalti  -->
   			</tr>  
   		</thead>
  

<?php 
        $query="Select concat(j.Nombre,' ',j.Apellido1,' ',j.Apellido2) as Nombre, c.Categoria, t.Total, t.Jugada, t.Penalty";
        $query.=" from tablagoleadores as t, jugadores as j, categoria as c";
        $query.=" where t.IdJugador=j.IdJugador";
        $query.=" and j.IdCategoria=c.IdCategoria";
        if ($idCategoria!=0)
        {
            $query.=" and c.IdCategoria=".$idCategoria;
        }
        $query.=" order by t.Total desc, t.Jugada desc, t.Penalty desc, c.Categoria";
        $q=mysqli_query ($link, $query);

        $sumaTotal=0;
        $sumaJugada=0;
        $sumaPenalti=0;
        //Mostrar los valores de la base de datos
        while($goleador=mysqli_fetch_array($q, MYSQLI_BOTH))
        {
?>
			<tr class="d-flex">
                <td class="col-3"><?= $goleador["Nombre"] ?></td>
                <td class="col-3"><?= $goleador["Categoria"] ?></td>
                <td class="col-2 text-center"><?= $goleador["Total"] ?></td>
                <td class="col-2 text-center"><?= $goleador["Jugada"] ?></td>
                <td class="col-2 text-center"><?= $goleador["Penalty"] ?></td>
            </tr>
<?php 
            $sumaTotal+=$goleador["Total"];
            $sumaJugada+=$goleador["Jugada"];
            $sumaPenalti+=$goleador["Penalty"];
        }
?>    
		<tr class="d-flex">
			<td class="col-3">&nbsp;</td>
            <td class="col-3">&nbsp;</td>
            <td class="col-2 text-center"><?= $sumaTotal ?></td>
            <td class="col-2 text-center"><?= $sumaJugada ?></td>
            <td class="col-2 text-center"><?= $sumaPenalti ?></td>
		</tr>
    </table>