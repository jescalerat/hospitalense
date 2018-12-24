<?php
    require_once("/includes/cabecera.php");
?>
	<div class="container-fluid">
    	<div class="row">    
        	<div class="col" id="menu">
<?php
              require_once("/includes/menu.php");
?>
        	</div>
    	</div>
   	
		<div class="row">
            <div class="col" id="principal">
<?php
              require_once("/includes/inc_principal.php");
?>
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



