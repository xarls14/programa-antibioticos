<?php 
$destinatario = "xarls_11@hotmail.com";
// Asunto
$asunto = "Email de prueba del Tutorial PHP 7";
// Mensaje
 $mensaje = "Hola, este email es una prueba del Tutorial PHP 7. Los datos anexos al email son: <br><br>";
 // Cabeceras
 // Para enviar un correo HTML, debe establecerse la cabecera Content-type
  $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
  $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  // Cabeceras adicionales
   $cabeceras .= 'To: TU NOMBRE <xarls_11@hotmail.com>' . "\r\n";
   $cabeceras .= 'From: Tutorial PHP 7 <tutorial@tutorialphp.net>' . "\r\n";
// Enviamos el email


mail($destinatario, $asunto, $mensaje, $cabeceras)


?>