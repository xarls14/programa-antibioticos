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
        <a class="nav-link" href="../laboratorio/inicio.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Listar pacientes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../laboratorio/inicio.php">Listar Activos</a>
          <a class="dropdown-item" href="../laboratorio/inicioListarEgresados.php">Listar Egresados</a>
          <a class="dropdown-item" href="../laboratorio/inicioListarSuspendidos.php">Listar Suspendidos</a>
          <a class="dropdown-item" href="../laboratorio/inicioListarTodos.php">Listar Todos</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Listar tratamientos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="../laboratorio/verTratamientos.php">Listar tratamientos</a>
        </div>
      </li>
    </ul>
  </div>
  <div>
  	<ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../logout.php">Cerrar Sesión<span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>