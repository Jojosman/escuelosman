<!--Vista del header-->
<?php
session_start(); 
include "php/v/header.php";

if (isset($_SESSION['id_usuario'])) {
  switch ($_SESSION['privilegio']) {
    case 1:
      echo  '<script>window.location.href="admin/index.php";</script>';
      break;
    case 2:
      echo  '<script>window.location.href="maestro/index.php";</script>';
      break;
    case 3:
      echo  '<script>window.location.href="alumno/index.php";</script>';
      break;
  }
}
;?>
<body class="offline-doc">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container">
      <div class="navbar-wrapper">
        <div class="navbar-toggle">
          <button type="button" class="navbar-toggler">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </button>
        </div>
        <a class="navbar-brand" href="#"></a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="examples/dashboard.html">
              Iniciar Sesión
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://github.com/creativetimofficial/now-ui-dashboard/issues" target="_blank">
              Ayuda
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="page-header clear-filter" filter-color="black">
    <div class="page-header-image" style="background-image: url('assets/img/backgroud_index.jpg');"></div>
    <div class="container text-center">
      <div class="col-md-8 ml-auto mr-auto">
        <div class="brand">
          <h1 class="title">
            Sistema administrador
          </h1>
          <h3 class="description">Escuelosman</h3>
          <br />
          <a href="#" id="modal_login" class="btn btn-danger btn-round btn-lg">Iniciar Sesión</a>
        </div>
      </div>
      <div class="col-md-8 ml-auto mr-auto" id="form_login" style="border-radius: 15px !important; background-color: #f96332; display: none;">
        <div class="col-md-8 ml-auto mr-auto" style="color: #FFF !important;">
          <label for="matricula_login">Matricula</label>
          <input type="number" min="1" step="1" name="matricula_login" id="matricula_login" placeholder="matricula" class="form-control">
        </div>
        <div class="col-md-8 ml-auto mr-auto" style="color: #FFF !important; margin-bottom: 10px;">
          <label for="curp_login">CURP</label>
          <input type="text" maxlength="18" name="curp_login" id="curp_login" placeholder="CURP" class="form-control">
          <a href="#!" id="btn_login" class="btn btn-round btn-md btn-success">Ingresar</a>
        </div>
      </div>
    </div>
  </div>
<?php 
//Incluimos algunas vistas
include_once("php/v/modal.php");//Modal
include_once("php/v/footer.php");//Footer
?>
