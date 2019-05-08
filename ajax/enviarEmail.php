<?php 
use PHPMailer\PHPMailer\PHPMailer;
require '../src/PHPMailer.php';
require '../src/SMTP.php';
require '../src/OAuth.php';
require '../src/Exception.php';


$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$rut = $_POST['rut'];
$sala_cama = $_POST['sala_cama'];
$medico = $_POST['medico'];
$antibiotico = $_POST['antibiotico'];
$dias_tratamiento = $_POST['dias_tratamiento'];

$mail = new PHPMailer;

try {
    $mail->isSMTP(); 
    //$mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    //$mail->SMTPSecure = 'ssl';
    $mail->Host = "mail.redsalud.gob.cl";
    $mail->Port = 25;

    $mail->Username = "carlos.henriquez@redsalud.gob.cl";
    $mail->Password = "173446837";

    $mail->From = "carlos.henriquez@redsalud.gob.cl";
    $mail->FromName = "TIC - Programa Antibioticos";
    $mail->Subject = "Notificacion paciente";

    /*----------acá pondremos todos los destinatarios es decir todos los usuarios de medicina------------*/ 

    $mail->addAddress('carlos.henriquez@redsalud.gob.cl'); //

    /*--------------------------------------------------------------------------------------------------*/
    $mail->MsgHTML("<html>
    <head>
    <style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
        text-align: left;   
    }

    th{
        color: white;    
        background-color: #0072C6;       
    }
    </style>
    </head>
    <body>
    
    <h2>Notificacion pacientes</h2>
    <p>El paciente <b>".$nombres." ".$apellidos."</b> lleva ".$dias_tratamiento." dias de tratamiento con el antibiotico <b>".$antibiotico."</b></p>

    
    <table style=\"width:100%\">
      <tr>
        <th>Rut</th>
        <th>Nombres</th>
        <th>Apellidos</th> 
        <th>Sala-Cama</th>
        <th>Medico Tratante</th>
        <th>ATB</th>
      </tr>
      <tr>
        <td>".$rut."</td>
        <td>".$nombres."</td>
        <td>".$apellidos."</td>
        <td>".$sala_cama."</td>
        <td>".$medico."</td>
        <td>".$antibiotico."</td>
      </tr>
    </table>
    </body>
    </html>");

    $mail -> Send();
    echo("El email se ha enviado con éxito");
} catch (Exception $e) {
    echo "El email no ha podido ser enviado: {$mail->ErrorInfo}";
}
?>