<?
	session_start();
  if (!isset($_SESSION['registrado']))
	{
		header("Location:login.php");	
	}
	require_once("../conf/conexion.php");
	require_once("../conf/funciones.php");
	$link=Conectarse();
	mysql_query ("SET NAMES 'utf8'");
	
	$accion = "A";
	
	if (isset($_POST['Accion']))
	{
		$accion = $_POST['Accion'];	
	}
	
	$idUsuario="";
	$usuario="";
	$nombre="";
	$password="";
	$tipoUsuario="";
	
	if ($_POST['nombre'] != "" && $accion == "A")
  {
	  	//Query
	    $query="insert into usuarios (Nombre,Usuario,Password,Tipo) values (";
	    $query.="'".$_POST['nombre']."'";
	    $query.=",'".$_POST['usuario']."'";
	    $query.=",'".$_POST['pass']."'";
	    $query.=",".$_POST['tipou'].")";
			mysql_query ($query,$link);
			$accion = "A";
  }
  else if ($accion == "M")
  {
	  	//Query
	    $query="update usuarios set Nombre='".$_POST['nombre']."'";
	    $query.=", Usuario='".$_POST['usuario']."'";
	    $query.=", Tipo=".$_POST['tipou'];
	    $query.=" where IdUsuario=".$_POST['IdUsuario'];
			mysql_query ($query,$link);
			$accion = "A";
  }
  else if ($accion == "B")
  {
  	//Query
    $query="select * from usuarios where IdUsuario=".$_POST['IdUsuario'];
		$q=mysql_query ($query,$link);

		$idUsuario = mysql_result($q,0,"IdUsuario");
		$nombre = mysql_result($q,0,"Nombre");
		$usuario = mysql_result($q,0,"Usuario");
		$password = mysql_result($q,0,"Password");
		$tipoUsuario = mysql_result($q,0,"Tipo");
		$accion = "M";
  }
  else if ($accion == "E")
  {
  	//Query
    $query="delete from usuarios where IdUsuario=".$_POST['IdUsuario'];
		mysql_query ($query,$link);
		$accion = "A";
  }
?>
<h1 class="admin">USUARIOS</h1>
<form action="javascript:llamada_prototype('categorias.php','principal', 4);" method="POST" name="usuario" id="usuario">
	<input type="hidden" name="Accion" id="Accion" value=<?=$accion?>>
	<input type="hidden" name="IdUsuario" id="IdUsuario" value=<?=$idUsuario?>>
	<table align="center" border="0" width="80%">
		<tr>
			<td width="23%" align="right">Nombre:</td>
			<td width="23%"><input type="text" size="20" name="nombre" id="nombre" value="<?=$nombre?>"></td>
			<td width="8%">&nbsp;</td>
			<td width="23%" align="right">Tipo Usuario:</td>
			<td width="23%">
				<SELECT name="tipou" id="tipou">
						<option value="">Tipo Usuario</option>
						<?
							//Query
					    $query="select * from tipo_usuario order by IdTipoUsuario";
							$q=mysql_query ($query,$link);
					
					    //Obtener el numero de filas devuelto
					    $filas=mysql_num_rows($q);
							for ($x=0;$x<$filas;$x++)
							{
								$seleccionado = "";
								if ($tipoUsuario == mysql_result($q,$x,"IdTipoUsuario"))
								{
									$seleccionado = "selected";
								}
						?>
								<option value="<?=mysql_result($q,$x,"IdTipoUsuario")?>" <?= $seleccionado ?>><?=mysql_result($q,$x,"TipoUsuario")?></option>
						<?}?>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">Usuario:</td>
			<td><input type="text" size="20" name="usuario" id="usuario" value="<?=$usuario?>"></td>
			<td>&nbsp;</td>
			<td align="right">Password:</td>
			<?
				$deshabilitado = "disabled";
				if ($accion == "A")
				{
					$deshabilitado = "";	
				}
			?>
			<td><input type="text" size="20" name="pass" id="pass" value="<?=$password?>" <?= $deshabilitado ?>></td>
		</tr>
		<tr>
			<td colspan="5"><center><button type=submit name=submit onclick="return ejecutarAccion('usuarios.php','<?=$accion?>','<?=$idUsuario?>');">Enviar</button></center></td>
		</tr>
	</table>
	
	<table border="1" width="100%">
		<tr>
			<th width="30%">
				Usuario
			</th>
			<th width="30%">
				Tipo Usuario
			</th>
			<th width="15%">
				Modificar
			</th>
			<th width="15%">
				Eliminar
			</th>
		</tr>
	
	<?
	  	//Query
	    $query="select * from usuarios order by tipo";
			$q=mysql_query ($query,$link);
	
	    //Obtener el numero de filas devuelto
	    $filas=mysql_num_rows($q);
	    
	    //Mostrar los valores de la base de datos
	    for ($x=0; $x < $filas; $x++)
	    {
	    	$query="select * from tipo_usuario where IdTipoUsuario=".mysql_result($q,$x,"Tipo");
				$qtipo=mysql_query ($query,$link);
	    	$tipoUsuarioMostrar=mysql_result($qtipo,0,"TipoUsuario");
	?>
				<tr>
					<td>
						<?=mysql_result($q,$x,"Usuario")?>
					</td>
					<td>
						<?=$tipoUsuarioMostrar?>
					</td>
					<td align="center">
						<a href="#" onclick="ejecutarAccion('usuarios.php','B','<?=mysql_result($q,$x,"IdUsuario")?>');"><img src="../imagenes/modificar.gif"/></a>
					</td>
					<td align="center">
						<a href="#" onclick="ejecutarAccion('usuarios.php','E','<?=mysql_result($q,$x,"IdUsuario")?>');"><img src="../imagenes/eliminar.gif"/></a>
					</td>
				</tr>
	<?    	
	    }
	?>
	</table>
</form>	