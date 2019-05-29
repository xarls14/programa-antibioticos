<style type="text/css">
  nav{
    margin-bottom: 50px;
  }
</style>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Programa Antibióticos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../administrador/inicio.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Gestión de usuarios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" data-toggle="modal" data-target="#myModalCrearUsuario" data-backdrop="static" data-keyboard="false" style="cursor: pointer;">Nuevo usuario</a>
          <a class="dropdown-item" href="../administrador/inicio.php">Listar usuarios</a>
        </div>
      </li>
    </ul>
  </div>
  <div>
    <ul class="navbar-nav" style="float: left;">
        <li class="nav-item active">
          <a class="nav-link" href="#" style="cursor: pointer; margin-right: 20px;" onclick="javascript:abrirModalNuevoPassword('<?php echo($_SESSION['id_usuario']) ?>');" data-toggle="modal" data-target="#myModalNuevoPassword" data-backdrop="static" data-keyboard="false">Cambiar Contraseña<span class="sr-only">(current)</span></a>
        </li>
    </ul> 
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../logout.php">Cerrar Sesión<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>