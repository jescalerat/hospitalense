<?php
	session_start();
    if (!isset($_SESSION['registrado']))
	{
		header("Location:login.php");	
	}
	require_once("../../conf/conexion.php");
	require_once("../../conf/funciones.php");
	$link=Conectarse();

	$idJugador = "";
	$idCategoria = "";
	$idFoto = "";
	$idDirectiva = "";
	$idFormulario = "";
	
	if (isset($_GET['idJugador'])){
		$idJugador=$_GET['idJugador'];
	} else if (isset($_POST['IdJugador'])){
		$idJugador=$_POST['IdJugador'];
	}
	
	if (isset($_GET['idCategoria'])){
		$idCategoria=$_GET['idCategoria'];
	} else if (isset($_POST['IdCategoria'])){
		$idCategoria=$_POST['IdCategoria'];
	}
	
	if (isset($_GET['idFoto'])){
		$idFoto=$_GET['idFoto'];
	} else if (isset($_POST['IdFoto'])){
		$idFoto=$_POST['IdFoto'];
	}
	
	if (isset($_GET['idDirectiva'])){
		$idDirectiva=$_GET['idDirectiva'];
	} else if (isset($_POST['IdDirectiva'])){
		$idDirectiva=$_POST['IdDirectiva'];
	}
	
	if (isset($_GET['idFormulario'])){
		$idFormulario=$_GET['idFormulario'];
	} else if (isset($_POST['IdFormulario'])){
		$idFormulario=$_POST['IdFormulario'];
	}

	$titulo = "";
	$titulo2 = "";
	if ($idJugador != ""){
		$query="select * from jugadores where IdJugador=".$idJugador;
		$qjugador=mysqli_query ($link, $query);
		$rowJugador=mysqli_fetch_array($qjugador);
		$titulo2 = buscaJugador($rowJugador["IdJugador"], $link);
		
		$query="select * from categoria where IdCategoria=".$rowJugador["IdCategoria"];
		$qCategoria=mysqli_query ($link, $query);
		$rowCategoria=mysqli_fetch_array($qCategoria);
		$titulo = $rowCategoria["Categoria"];
		
		mysqli_free_result($qjugador);
		mysqli_free_result($qCategoria);
	} else if ($idCategoria != ""){
		$query="select * from categoria where IdCategoria=".$idCategoria;
		$qCategoria=mysqli_query ($link, $query);
		$rowCategoria=mysqli_fetch_array($qCategoria);
		$titulo = $rowCategoria["Categoria"];
		
		mysqli_free_result($qCategoria);
	} else if ($idFoto != ""){
		$query="select * from fotos_historia where IdFoto=".$idFoto;
		$qfoto=mysqli_query ($link, $query);
		$rowFoto=mysqli_fetch_array($qfoto);
		$titulo = $rowFoto["DescripcionES"];
		
		mysqli_free_result($qfoto);
	} else if ($idDirectiva != ""){
		$query="select * from directiva where IdDirectiva=".$idDirectiva;
		$qdirectiva=mysqli_query ($link, $query);
		$rowDirectiva=mysqli_fetch_array($qdirectiva);
		$titulo = $rowDirectiva["Nombre"]." ".$rowDirectiva["Apellido1"]." ".$rowDirectiva["Apellido2"];

		mysqli_free_result($qdirectiva);
	} else if ($idFormulario != ""){
		$query="select * from formularios where IdFormulario=".$idFormulario;
		$qformularios=mysqli_query ($link, $query);
		$rowFormularios=mysqli_fetch_array($qformularios);
		$titulo = $rowFormularios["DescripcionES"];
	}
	
	// Verificamos que el formulario no ha sido enviado aun
	$postback = (isset($_POST["enviar"])) ? true : false;
	if($postback){
	  // Nivel de errores
	  error_reporting(E_ALL);
	  // Constantes
	  # Altura de el thumbnail en píxeles
	  define("ALTURA", 100);
	  # Nombre del archivo temporal del thumbnail
	  //define("NAMETHUMB", "/tmp/thumbtemp"); //Esto en servidores Linux, en Windows podría ser:
	  //define("NAMETHUMB", "c:/windows/temp/thumbtemp"); //y te olvidas de los problemas de permisos
	  # Servidor de base de datos
	  //define("DBHOST", "localhost");
	  # nombre de la base de datos
	  //define("DBNAME", "test");
	  # Usuario de base de datos
	  //define("DBUSER", "root");
	  # Password de base de datos
	  //define("DBPASSWORD", "");
	  // Mime types permitidos
	  //$mimetypes = array("image/jpeg", "image/pjpeg", "image/gif", "image/png");
	  // Variables de la foto
	  $name = $_FILES["foto"]["name"];
	  $type = $_FILES["foto"]["type"];
	  $tmp_name = $_FILES["foto"]["tmp_name"];
	  $size = $_FILES["foto"]["size"];
	  // Verificamos si el archivo es una imagen válida
	  //if(!in_array($type, $mimetypes))
	//	die("El archivo que subiste no es una imagen válida");
	  // Creando el thumbnail
/*	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  $img = imagecreatefromjpeg($tmp_name);
		  break;
		case $mimetypes[2]:
		  $img = imagecreatefromgif($tmp_name);
		  break;
		case $mimetypes[3]:
		  $img = imagecreatefrompng($tmp_name);
		  break;
	  }
/*	  $datos = getimagesize($tmp_name);
	  $ratio = ($datos[1]/ALTURA);
	  $ancho = round($datos[0]/$ratio);
*/	  
	  /*$thumb = imagecreatetruecolor($ancho, ALTURA);
	  imagecopyresized($thumb, $img, 0, 0, 0, 0, $ancho, ALTURA, $datos[0], $datos[1]);
	  switch($type) {
		case $mimetypes[0]:
		case $mimetypes[1]:
		  imagejpeg($thumb, NAMETHUMB);
			  break;
		case $mimetypes[2]:
		  imagegif($thumb, NAMETHUMB);
		  break;
		case $mimetypes[3]:
		  imagepng($thumb, NAMETHUMB);
		  break;
	  }*/
	  // Extrae los contenidos de las fotos
	  # contenido de la foto original
	  $fp = fopen($tmp_name, "rb");
	  $tfoto = fread($fp, filesize($tmp_name));
	  $tfoto = addslashes($tfoto);
	  fclose($fp);
	  # contenido del thumbnail
	  /*$fp = fopen(NAMETHUMB, "rb");
	  $tthumb = fread($fp, filesize(NAMETHUMB));
	  $tthumb = addslashes($tthumb);
	  fclose($fp);*/
	  // Borra archivos temporales si es que existen
	  /*@unlink($tmp_name);
	  @unlink(NAMETHUMB);*/
	  // Guardamos todo en la base de datos
	  #nombre de la foto

	  //$link = mysql_connect(DBHOST, DBUSER, DBPASSWORD) or die(mysql_error($link));;
	  //mysql_select_db(DBNAME, $link) or die(mysql_error($link));
	  if ($idJugador != ""){
		$query = "update jugadores set foto='$tfoto', mime='$type' where IdJugador=".$idJugador;
	  } else if ($idCategoria != ""){
		$query = "update categoria set foto='$tfoto', mime='$type' where IdCategoria=".$idCategoria;
	  }	else if ($idFoto != ""){
		$query = "update fotos_historia set foto='$tfoto', mime='$type' where IdFoto=".$idFoto;
	  }	else if ($idDirectiva != ""){
		$query = "update directiva set foto='$tfoto', mime='$type' where IdDirectiva=".$idDirectiva;
	  }	else if ($idFormulario != ""){
		$query = "update formularios set foto='$tfoto', mime='$type' where IdFormulario=".$idFormulario;
	  }	 

	  //$query="insert into fotos (IdRuta,IdGaleria,Descripcion,Foto,Mime) values (".$idRuta.",".$idGaleria.",'".$descripcion."','".$tfoto."','".$type."')";
	  $qresultado=mysqli_query ($link, $query);
	  
	  /*$query="select IdFoto from fotos order by IdFoto desc limit 1";
	  $qfoto=mysql_query ($query,$link);
	  
	  $IdFoto = mysql_result($qfoto,0,"IdFoto");
	  
	  $query="update fotos set foto='$tfoto', mime='$type' where IdFoto=".$IdFoto;
	  $qresultadofoto=mysql_query ($query,$link);*/

	  print("<br>Resultado: ".$qresultado);
	  //mysql_query($sql, $link) or die(mysql_error($link));
	  echo "<br>Fotos guardadas";
	  //exit();
	  
	  echo "<script type=\"text/javascript\">";
		echo "close();";
	  echo "</script>";
	}

?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" name="formfoto" id="formfoto" enctype="multipart/form-data">
		<input type="hidden" name="IdJugador" id="IdJugador" value=<?= $idJugador ?>>
		<input type="hidden" name="IdCategoria" id="IdCategoria" value=<?= $idCategoria ?>>
		<input type="hidden" name="IdFoto" id="IdFoto" value=<?= $idFoto ?>>
		<input type="hidden" name="IdDirectiva" id="IdDirectiva" value=<?= $idDirectiva ?>>
		<input type="hidden" name="IdFormulario" id="IdFormulario" value=<?= $idFormulario ?>>
		
		<h1 class="text-center"><?= $titulo ?></h1>
		
<?php
		  if ($titulo2 != ""){
?>
			<h2 class="text-center"><?= $titulo2 ?></h2>
<?php
		  }
?>
		Foto: <input name="foto" type="file" />
		</br></br>
		<button type="submit" name="enviar" id="enviar">Enviar</button></center>
	</form>	
