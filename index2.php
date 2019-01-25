<?php
    require_once("/includes/cabecera.php");
?>
	<div class="container-fluid">
    	<div class="row">    
        	<div class="col" id="principal">
            	<h1 class="text-center"><?= cambiaracentos(mb_strtoupper(_MANTENIMIENTO1)) ?></h1>
    			<p class="text-center"><img src="imagenes/construccion.gif" alt="Construccion" title="Construccion"/></p>
    			<h1 class="text-center"><?= cambiaracentos(strtoupper(_MANTENIMIENTO2)) ?></h1>
        	</div>
        </div>
		<div class="row">
            <div class="col" id="pie">
           		<input type="hidden" id="cargandotexto" name="cargandotexto" value="<?= cambiarAcentos(_CARGANDO) ?>"/>
				<input type="hidden" name="cambiandoIdioma" id="cambiandoIdioma" value="<?print(_CAMBIOIDIOMA);?>"/>
<?php
            require_once("/includes/pie.php");
?>
        	</div>
        </div>
	</div> <!-- container -->



