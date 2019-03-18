<?php
	
    $accion = "A";
	
	if (isset($_POST['Accion']))
	{
		$accion = $_POST['Accion'];	
	} else 	if (isset($_GET['Accion']))
	{
	    $accion = $_GET['Accion'];
	}
	
	
	$idNoticia="";
	$tituloES="";
	$tituloEN="";
	$tituloCA="";
	$textoES="";
	$textoEN="";
	$textoCA="";
	
	if (isset($_POST['TituloES']) && isset($_POST['TituloEN']) && isset($_POST['TituloCA']) && isset($_POST['TextoES']) && isset($_POST['TextoEN']) && isset($_POST['TextoCA']) && $accion == "A")
	{
	  	//Query
        $query="select max(orden) as maxorden from noticias";
	    $qNoticias=mysqli_query ($link, $query);
	    $rowNoticias=mysqli_fetch_array($qNoticias);

	    $orden = $rowNoticias["maxorden"];
	    mysqli_free_result($qNoticias);
		
		if ($orden == ""){
			$orden = 1;
		} else {
			$orden++;
		}

	  	//Query
	    $query="insert into noticias (TituloES,TituloCA,TituloEN,TextoES,TextoCA,TextoEN,Orden,Fecha) values (";
	    $query.="'".$_POST['TituloES']."'";
	    $query.=",'".$_POST['TituloCA']."'";
	    $query.=",'".$_POST['TituloEN']."'";
	    $query.=",'".$_POST['TextoES']."'";
	    $query.=",'".$_POST['TextoCA']."'";
	    $query.=",'".$_POST['TextoEN']."'";
	    $query.=",".$orden;
		$query.=",'".date('Y/m/d H:i:s')."')";
		mysqli_query ($link, $query);
    }
    else if ($accion == "M")
    {
	  	//Query
	    $query="update noticias set TituloES='".$_POST['TituloES']."'";
	    $query.=", TituloCA='".$_POST['TituloCA']."'";
	    $query.=", TituloEN='".$_POST['TituloEN']."'";
	    $query.=", TextoES='".$_POST['TextoES']."'";
	    $query.=", TextoCA='".$_POST['TextoCA']."'";
	    $query.=", TextoEN='".$_POST['TextoEN']."'";
		$query.=", Fecha='".date('Y/m/d H:i:s')."'";
	    $query.=" where IdNoticia=".$_POST['IdNoticia'];
	    
	    mysqli_query ($link, $query);
	    
	    $accion = "A";
    }
    else if ($accion == "B")
    {
		//Query
		$query="select * from noticias where IdNoticia=".$_GET['IdNoticia'];
		$qNoticia=mysqli_query ($link, $query);
		$rowNoticia=mysqli_fetch_array($qNoticia);


		$idNoticia = $rowNoticia["IdNoticia"];
		$tituloES = $rowNoticia["TituloES"];
		$tituloCA = $rowNoticia["TituloCA"];
		$tituloEN = $rowNoticia["TituloEN"];
		$textoES = $rowNoticia["TextoES"];
		$textoCA = $rowNoticia["TextoCA"];
		$textoEN = $rowNoticia["TextoEN"];
		$accion = "M";
		
		mysqli_free_result($qNoticia);
    }
    else if ($accion == "E")
    {
		//Query
		$query="delete from noticias where IdNoticia=".$_GET['IdNoticia'];
		mysqli_query ($link, $query);
		$accion = "A";
    }
    else if ($accion == "U")
    {
		$query="select * from noticias where IdNoticia=".$_GET['IdNoticia'];
		$qNoticia=mysqli_query ($link, $query);
		$rowNoticia=mysqli_fetch_array($qNoticia);
		
		$idNoticiaAnt = $rowNoticia["IdNoticia"];
		$ordenAnt = $rowNoticia["Orden"];
		mysqli_free_result($qNoticia);
		
		$cambioOrdenAnt = $ordenAnt - 1;
		
		$query="select * from noticias where Orden=".$cambioOrdenAnt;
		$qNoticia=mysqli_query ($link, $query);
		$rowNoticia=mysqli_fetch_array($qNoticia);
		
		$idNoticiaPost = $rowNoticia["IdNoticia"];
		$ordenPost = $rowNoticia["Orden"];
		mysqli_free_result($qNoticia);
		
		$cambioOrdenPost = $ordenPost + 1;
		
		$query="update noticias set Orden=".$cambioOrdenAnt;
		$query.=" where IdNoticia=".$idNoticiaAnt;
		mysqli_query ($link, $query);

		$query="update noticias set Orden=".$cambioOrdenPost;
		$query.=" where IdNoticia=".$idNoticiaPost;
		mysqli_query ($link, $query);
    }
    else if ($accion == "D")
    {
		$query="select * from noticias where IdNoticia=".$_GET['IdNoticia'];
		$qNoticia=mysqli_query ($link, $query);
		$rowNoticia=mysqli_fetch_array($qNoticia);
		
		$idNoticiaAnt = $rowNoticia["IdNoticia"];
		$ordenAnt = $rowNoticia["Orden"];
		mysqli_free_result($qNoticia);
		
		$cambioOrdenAnt = $ordenAnt + 1;
		
		$query="select * from noticias where Orden=".$cambioOrdenAnt;
		$qNoticia=mysqli_query ($link, $query);
		$rowNoticia=mysqli_fetch_array($qNoticia);
		
		$idNoticiaPost = $rowNoticia["IdNoticia"];
		$ordenPost = $rowNoticia["Orden"];
		mysqli_free_result($qNoticia);
		
		$cambioOrdenPost = $ordenPost - 1;
		
		$query="update noticias set Orden=".$cambioOrdenAnt;
		$query.=" where IdNoticia=".$idNoticiaAnt;
		mysqli_query ($link, $query);
			
		$query="update noticias set Orden=".$cambioOrdenPost;
		$query.=" where IdNoticia=".$idNoticiaPost;
		mysqli_query ($link, $query);	
    }
?>
<h1 class="text-center">NOTICIAS</h1>

<form role="form" id="noticia" method="post" action="noticias.php">
	<input type="hidden" name="Accion" id="Accion" value=<?= $accion ?>>
	<input type="hidden" name="IdNoticia" id="IdNoticia" value=<?= $idNoticia ?>>
	
	<table class="table">
   		<tr class="d-flex">
			<td class="col-4 text-right">T&iacute;tulo espa&ntilde;ol:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="TituloES" id="TituloES" value="<?= $tituloES ?>"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Texto espa&ntilde;ol:</td>
       		<td class="col-8 text-center">
       			<textarea id="TextoES" name="TextoES" class="form-control" rows="3" cols="80"><?= $textoES ?></textarea>
       		</td>
       	</tr>
	
		<tr class="d-flex">
			<td class="col-4 text-right">T&iacute;tulo catal&aacute;n:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="TituloCA" id="TituloCA" value="<?= $tituloCA ?>"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Texto catal&aacute;n:</td>
       		<td class="col-8 text-center">
       			<textarea id="TextoCA" name="TextoCA" class="form-control" rows="3" cols="80"><?= $textoCA ?></textarea>
       		</td>
       	</tr>
	
		<tr class="d-flex">
			<td class="col-4 text-right">T&iacute;tulo ingl&eacute;s:</td>
       		<td class="col-8 text-center"><input type="text" class="form-control" size="50" name="TituloEN" id="TituloEN" value="<?= $tituloEN ?>"></td>
       	</tr>
       	
       	<tr class="d-flex">
			<td class="col-4 text-right">Texto ingl&eacute;s:</td>
       		<td class="col-8 text-center">
       			<textarea id="TextoEN" name="TextoEN" class="form-control" rows="3" cols="80"><?= $textoEN ?></textarea>
       		</td>
       	</tr>
		
		<tr class="d-flex">
       		<td class="col-12 text-center">
       			<button type="submit" class="btn btn-default"><?= cambiarAcentos(_ENVIAR) ?></button>
       		</td>
       	</tr>
	</table>
	
	<table class="table table-bordered">
   		<thead class="thead-dark">
	   		<tr class="d-flex">
	   			<th class="col-1 text-center">&nbsp;</th>
	   			<th class="col-1 text-center">&nbsp;</th>
	   			<th class="col-2 text-center">T&iacute;tulo</th>
	   			<th class="col-4 text-center">Texto</th>
	   			<th class="col-1 text-center">Modificar</th>
	   			<th class="col-1 text-center">Eliminar</th>
<?php 
                if ($_SESSION["tipo_usuario"] == 1){
?>	   			
	   				<th class="col-2 text-center">Fecha</th>
<?php 
                }
?>	   			
	   		</tr>
	   	</thead>
	   	
<?php
	  	//Query
	    $query="select * from noticias order by orden";
	    $qNoticias=mysqli_query ($link, $query);
	    $totalNoticias=mysqli_num_rows($qNoticias);
	
	    $x=0;
		while($noticia=mysqli_fetch_array($qNoticias, MYSQLI_BOTH))
	    {
	    
?>
			<tr class="d-flex">
				<td class="col-1">
<?php 
                if ($x==0)
                {
?>
					&nbsp;
<?php 
                }
                else
                {
?>
					<a href="noticias.php?Accion=U&IdNoticia=<?= $noticia["IdNoticia"] ?>"><img src="../../imagenes/up.gif"/></a>
<?php 
                }
?>
				</td>

				<td class="col-1">
<?php 
                if ($x==($totalNoticias-1))
                {
?>
					&nbsp;
<?php 
                }
                else
                {
?>
					<a href="noticias.php?Accion=D&IdNoticia=<?= $noticia["IdNoticia"] ?>"><img src="../../imagenes/down.gif"/></a>
<?php 
                }
?>
				</td>				
				
				<td class="col-2">
					<?= $noticia["TituloES"] ?>
				</td>
	   			
	   			<td class="col-4">
	   				<?= $noticia["TextoES"] ?>
	   			</td>
			
				<td class="col-1">
	   				<a href="noticias.php?Accion=B&IdNoticia=<?= $noticia["IdNoticia"] ?>"><img src="../../imagenes/modificar.gif"/></a>
	   			</td>
	   			
	   			<td class="col-1">
	   				<a href="noticias.php?Accion=E&IdNoticia=<?= $noticia["IdNoticia"] ?>"><img src="../../imagenes/eliminar.gif"/></a>
	   			</td>
			
<?php 
                if ($_SESSION["tipo_usuario"] == 1){
?>
    				<td class="col-2 text-center">
    	   				<?= $noticia["Fecha"] ?>
    	   			</td>
<?php 
                }
?>
			</tr>
<?php    	
            $x++;
	    }
	    mysqli_free_result($qNoticias);
?>
	</table>
</form>	