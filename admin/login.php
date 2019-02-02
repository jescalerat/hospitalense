<?php
	require_once("../includes/cabecera.php");
?>
	<body>
    	<form name="login" method="post" action="comprobar.php">
    		<fieldset class="form-group">
    			<label class="col control-label" for="usuario">
            		Usuario
            	</label>
            	<div class="col-sm-10">
                	<input class="form-control" type="text" name="usuario" id="usuario" required="required" autofocus>
                </div>
                
                <label class="col control-label" for="password">
            		Contrase&ntilde;a
            	</label>
            	<div class="col-sm-10">
                	<input class="form-control" type="password" name="password" id="password" required="required">
                </div>
    		</fieldset>
    		
    		<input type="hidden" name="abrirpagina" id="abrirpagina" value="<?= $_GET["abrirpagina"] ?>">
    		
    		<div class="form-group">
                <div class="col">
                    <p class="text-center"><button type="submit" class="btn btn-default">Enviar</button></p>
                </div>
            </div>
    	</form>
	</body>
