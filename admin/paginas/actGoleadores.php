<?php
    session_start();
    if (!isset($_SESSION['registrado']))
    {
        header("Location:../login.php");
    }
    
    require_once("../includes/cabecera.php");
?>
	<div class="container">
    	<div class="row">    
        	<div class="col-3" id="menu">
<?php
              require_once("../includes/menu.php");
?>
        	</div>
        	<div class="col-9" id="pagina">
<?php
                setTablaGoleadores($link);
?>
        	</div>
    	</div>
   </div>