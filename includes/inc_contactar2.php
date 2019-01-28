<?php
    
  	$nombre=$_POST['nombre'];
  	$email=$_POST['correo'];
  	$mensaje=$_POST['mensaje'];

	$query="insert into correo (Nombre,Email,Mensaje,IP) values (\"".$nombre."\",\"".$email."\",\"".$mensaje."\",\"".getRealIP()."\")";
  	mysqli_query($link, $query);

	//Mando el mensaje a mi dirección de email
	//En el campo De aparecerá javi@calendario
    $email2="webmaster.hospitalense@gmail.com";
    $asunto="Sugerencias";
    $cuerpo="Nombre: ".$nombre."\r\nEmail: ".$email."\r\nMensaje: ".$mensaje;
    //$cabeceras = 'From: webmaster@example.com';
    $cabeceras = 'From: contacta@hospitalense.es';
    //mail($email2,$asunto,$cuerpo,"From: Contacta Hospitalense");
    
    imap_mail($email2, $asunto, $cuerpo, $cabeceras);
	
?>
    <table border="0" width="100%">
		<tr>
			<td>
            	<p class="text-center text-info"><?= cambiarAcentos(_RESPUESTA1) ?></p>
            	<p class="text-center text-info"><?= cambiarAcentos(_RESPUESTA2) ?></p>
            </td>
        </tr>
        <tr>
            <td>
            	<p class="text-center"><a class="btn btn-default btn-block" href="javascript:llamada_prototype('paginas/contactar.php','principal')"><?= _OTRACONSULTA ?></a></p>
             </td>
		</tr>
    </table>
