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
    $cuerpo="Nombre: ".$nombre."<br> Email: ".$email."<br> Mensaje: ".$mensaje;
	//mail($email2,$asunto,$cuerpo,"From: Contacta Hospitalense");
	
    //incluimos la clase PHPMailer
   /* require_once('../conf/PHPMailer/PHPMailerAutoload.php');
    
    //instancio un objeto de la clase PHPMailer
	$correo = new PHPMailer();
	
	//$correo->SMTPDebug = 1;
	
	$correo->IsSMTP();
	
	$correo->SMTPAuth = true;
	
	$correo->SMTPSecure = 'tls';
	
	$correo->Host = "smtp.gmail.com";
	
	$correo->Port = 587;
	
	$correo->Username = "puntairesmari@gmail.com";
	
	$correo->Password   = "torres2008";
	
	$correo->SMTPOptions = array(
			'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
			)
	);
	
	$correo->IsHTML(true);
	$correo->CharSet = 'UTF-8';
	
	//$correo->SetFrom("puntairesmari@gmail.com", "Mi Codigo PHP");
	$correo->SetFrom($email, $nombre);
	
	//$correo->AddReplyTo("puntairesmari@gmail.com","Mi Codigo PHP");
	//$correo->AddReplyTo($email2, "Sugerencias");
	
	//$correo->AddAddress("destino@correo.com", "Jorge");
	$correo->AddAddress($email2, "Sugerencias");
	
	//$correo->Subject = "Mi primero correo con PHPMailer";
	$correo->Subject = $asunto;
	
	//$correo->MsgHTML("Mi Mensaje en <strong>HTML</strong>");
	$correo->MsgHTML($cuerpo);
	
	//$correo->AddAttachment("images/phpmailer.gif");
	
	$correo->Send();*/
	/*if(!$correo->Send()) {
	  echo "Hubo un error: " . $correo->ErrorInfo;
	} else {
	  echo "Mensaje enviado con exito.";
	}*/

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
