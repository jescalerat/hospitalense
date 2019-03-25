<?php
    session_start();
    if (!isset($_SESSION['registrado']))
    {
        header("Location:../login.php");
    }
    require_once("includes/cabecera.php");
    $rutaAdmin="paginas/"
?>
	<div class="container-fluid">
    	<div class="row">    
        	<div class="col" id="menu">
<?php
              require_once("includes/menu.php");
?>
        	</div>
    	</div>
   </div>