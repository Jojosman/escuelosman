<?php 
session_start();
include("../php/m/SQLConexion.php");
$sql = new SQLConexion();
//validación de la sesion
if (isset($_SESSION['id_usuario'])) {
  switch ($_SESSION['privilegio']) {
    case 1://Admin

      break;
    case 2://Maestro
      echo  '<script>window.location.href="../maestro/index.php";</script>';
      break;
    case 3://Alumno
      echo  '<script>window.location.href="../alumno/index.php";</script>';
      break;
    default:
      echo  '<script>window.location.href="../index.php";</script>';
      break;
  }
}else{
  echo  '<script>window.location.href="../index.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Administrador
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/dataTables.bootstrap4.min.js"></script>
  <script src="../js/datatables.js"></script>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          Administrador
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="#">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="">
            <a href="#!" id="ver_alumnos">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Alumnos</p>
            </a>
          </li>
          <li>
            <a href="#!" id="ver_maestros">
              <i class="now-ui-icons business_badge"></i>
              <p>Maestros</p>
            </a>
          </li>
          <li>
            <a href="#!" id="ver_carreras">
              <i class="now-ui-icons education_hat"></i>
              <p>Carreras</p>
            </a>
          </li>
          <li>
            <a href="#!" id="ver_grupos">
              <i class="now-ui-icons users_single-02"></i>
              <p>Grupos</p>
            </a>
          </li>
          <li>
            <a href="#!" id="ver_materias">
              <i class="now-ui-icons education_agenda-bookmark"></i>
              <p>Materias</p>
            </a>
          </li>
          <li>
            <a href="#!" id="cerrar_sesion">
              <i class="now-ui-icons arrows-1_minimal-left"></i>
              <p>Cerrar Sesión</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-lg">
        <canvas id="bigDashboardChart"></canvas>
      </div>
      <div class="content">
        <div class="row" id="contenedor_formulario"></div>
        <div class="row" id="contenedor_tabla"></div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <ul>
              <li>
                <a href="#!">
                  Phantom Software
                </a>
              </li>
              <li>
                <a href="#!">
                  Acerca de nosotros
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script src="../js/funciones.js"></script>
  <!-- <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/dataTables.bootstrap4.min.js"></script>
  <script src="../js/datatables.js"></script>
 --></body>

</html>