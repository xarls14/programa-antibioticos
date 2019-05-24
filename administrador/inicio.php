<?php
session_start();

include '../modal/modalCrearUsuario.php';
include '../modal/modalActualizarUsuario.php';
include '../config.php';

if(!isset($_SESSION['rut']) || empty($_SESSION['rut'])){
    header("location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Administrador</title>


<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
<link rel="icon" type="image/x-icon" href="../favicon.ico" />

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<script src="../vendor/jquery-3.1.1.js"></script>
<script src="../vendor/jquery.validate.min.js"></script>
<script src="../vendor/additional-methods.min.js"></script>
<script src="../js/jquery.rut.chileno.min.js"></script>


<!---------------data range picker---------------------------->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<!------------------------------------------------------------->


<!-----------------------alertas de js----------------------------->
<!-- JavaScript -->
<script src="../vendor/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="../vendor/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="../vendor/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="../vendor/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="../vendor/bootstrap.min.css"/>
<!-------------------------------termino de alertas de js------------------>



<!-- multi date picker --->
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.js"></script>

<script src="https://cdn.jsdelivr.net/momentjs/2.3.1/moment.min.js"></script>

<script src="../jquery-ui.multidatespicker.js"></script>

<link href="../jquery-ui.multidatespicker.css" rel="stylesheet">
<!------------------------>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


<!--JQuery DataTables plugin-->
<link rel="stylesheet" type="text/css" href="../dataTables/bootstrap.css">
<script type="text/javascript" src="../dataTables/jquery.dataTables.min.js"></script>
<script src="../dataTables/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dataTables/dataTables.bootstrap4.min.css">
<script type="text/javascript" src="../dataTables/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../dataTables/pdfmake.min.js"></script>
<script type="text/javascript" src="../dataTables/vfs_fonts.js"></script>
<script type="text/javascript" src="../dataTables/buttons.html5.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dataTables/buttons.dataTables.min.css">
<script type="text/javascript" src="../dataTables/buttons.flash.min.js"></script>
<script type="text/javascript" src="../dataTables/buttons.html5.min.js"></script>
<script type="text/javascript" src="../dataTables/jszip.min.js"></script>
<link rel="stylesheet" type="text/css" href="../dataTables/responsive.dataTables.min.css">
<!--JQuery DataTables plugin-->

<link rel="stylesheet" href="../css/tabla-pacientes.css">

<script type="text/javascript" src="../js/script.js"></script>

</head>

<body>
<?php include '../layout/headerAdmin.php';?>

<div>

    <h3 style="margin-bottom: 25px; width:95%; margin: 0 auto;">Lista de usuarios</h3>
    <div class="display" style="width:95%; margin: 0 auto; margin-top: 25px;"></div>
</div>

<?php include '../layout/footer.php';?>
</body>
</html>

<script type="text/javascript">
$(document).ready( function () {
  actualizarTablaUsuarios();
});

</script>