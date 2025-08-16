<?php
session_start();
if (isset($_SESSION['sesion_email'])){
  //echo "el usuario paso el login";
  $email_session = $_SESSION['sesion_email'];
  $query_session = $pdo->prepare("SELECT * FROM usuarios WHERE email = '$email_session' AND id_usuarios = '1' ");
  $query_session->execute();

  $datos_session_usuarios = $query_session->fetchAll(PDO:: FETCH_ASSOC);
    foreach ($datos_session_usuarios as $datos_session_usuarios) {
      $nombre_session_usuario = $datos_session_usuarios ['nombres'];
    }

}else{
  //echo " el usuario no realizo el login";
  header('Location:'.APP_URL."/login");
}
?>

<!doctype html>
<html lang="es">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo APP_NAME;?></title>
  <!--begin::Primary Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="title" content="AdminLTE v4 | Dashboard" />
  <meta name="author" content="ColorlibHQ" />
  <meta name="description"
    content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
  <meta name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
  <!--end::Primary Meta Tags-->
  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
  <!--end::Fonts-->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
    integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
  <!--end::Third Party Plugin(OverlayScrollbars)-->
  <!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
  <!--end::Third Party Plugin(Bootstrap Icons)-->
  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="<?=APP_URL;?>../public/dist/css/adminlte.css" />
  <!--end::Required Plugin(AdminLTE)-->
  <!-- apexcharts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
    integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />
  <!-- jsvectormap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
    integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous" />
<!--sweetalert2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- DataTables -->
  <link rel="stylesheet" href="<?=APP_URL;?>../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=APP_URL;?>../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=APP_URL;?>../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
  <!--begin::App Wrapper-->
  <div class="app-wrapper">
    <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body">
      <!--begin::Container-->
      <div class="container-fluid">
        <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
              <i class="bi bi-list"></i>
            </a>
          </li>
          <li class="nav-item d-none d-md-block"><a href="<?=APP_URL;?>/admin" class="nav-link"><?=APP_NAME?></a></li>

        </ul>
        <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
          <!--begin::Navbar Search-->
          <li class="nav-item">
          <!--  <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="bi bi-search"></i>
            </a>
          </li>
          <!--end::Navbar Search-->
          <!--begin::Messages Dropdown Menu-->
          <li class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
              <i class="bi bi-chat-text"></i>
              <span class="navbar-badge badge text-bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <a href="#" class="dropdown-item">
                <!--begin::Message-->
                <div class="d-flex">
                </div>
                <!--end::Message-->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>
          <!--end::Messages Dropdown Menu-->
          <!--begin::Notifications Dropdown Menu-->
          <li class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
              <i class="bi bi"><i class="bi bi-bell"></i></i>
              <span class="navbar-badge badge text-bg-warning"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="bi bi-envelope me-2"></i> 4 new messages
                <span class="float-end text-secondary fs-7">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="bi bi-people-fill me-2"></i> 8 friend requests
                <span class="float-end text-secondary fs-7">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                <span class="float-end text-secondary fs-7">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
            </div>
          </li>
          <!--end::Notifications Dropdown Menu-->
          <!--begin::Fullscreen Toggle-->
          <li class="nav-item">
            <a class="nav-link" href="#" data-lte-toggle="fullscreen">
              <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
              <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
            </a>
          </li>
          <!--end::Fullscreen Toggle-->
          <!--begin::User Menu Dropdown-->
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <img src="https://external-preview.redd.it/kawaii-sea-turtle-digital-illustration-by-me-v0-rakD3EZE4dJ7fyPUQ4gK5-w9aE2wXCdGAuxOqXzwQqs.jpg?width=640&crop=smart&auto=webp&s=38c7fb2566a2a46f96434e645026329b3781ea4d" class="user-image rounded-circle shadow"
                alt="User Image" />
              <span class="d-none d-md-inline">Tortuga Geir</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <!--begin::User Image-->
              <li class="user-header text-bg-primary">
                <img src="https://external-preview.redd.it/kawaii-sea-turtle-digital-illustration-by-me-v0-rakD3EZE4dJ7fyPUQ4gK5-w9aE2wXCdGAuxOqXzwQqs.jpg?width=640&crop=smart&auto=webp&s=38c7fb2566a2a46f96434e645026329b3781ea4d" class="rounded-circle shadow" alt="User Image" />
                <p>
                  Tortuga Geir - Web Developer
                  <small>Member since Nov. 2023</small>
                </p>
              </li>
              <!--end::User Image-->
              <!--begin::Menu Body-->
              <li class="user-body">
                <!--begin::Row-->
                <div class="row">
                  <!--<div class="col-4 text-center"><a href="#">Followers</a></div>-->
                  <div class="col-4 text-center"><a href="#">grado</a></div>
                  <div class="col-4 text-center"><a href="#">Friends</a></div>
                </div>
                <!--end::Row-->
              </li>
              <!--end::Menu Body-->
              <!--begin::Menu Footer-->
              <li class="user-footer">
                <a href="#" class="btn btn-default btn-flat"><i class="bi bi-person-fill"></i>Perfil</a>
                <a href="<?=APP_URL;?>/login/logout.php" class="btn btn-default btn-flat float-end"><i class="bi bi-door-closed-fill"></i>Salir</a>
              </li>
              <!--end::Menu Footer-->
            </ul>
          </li>
          <!--end::User Menu Dropdown-->
        </ul>
        <!--end::End Navbar Links-->
      </div>
      <!--end::Container-->
    </nav>
    <!--end::Header-->
    <!--begin::Sidebar-->
    <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
      <!--begin::Sidebar Brand-->
      <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="<?=APP_URL;?>/admin" class="brand-link">
          <!--begin::Brand Image-->
          <img src="<?=APP_URL;?>../public/dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
          <!--end::Brand Image-->
          <!--begin::Brand Text-->
          <span class="brand-text fw-light">Edu cloud</span>
          <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
      </div>
      <!--end::Sidebar Brand-->
      <!--begin::Sidebar Wrapper-->
      <div class="sidebar-wrapper">
        <nav class="mt-2">
          <!--begin::Sidebar Menu-->
          <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon bi"><i class="bi bi-backpack3"></i></i>
                <p>
                  Roles
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=APP_URL;?>/admin/roles" class="nav-link active">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Listado de Roles</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../dist/pages/index2.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Dashboard v2</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi"><i class="bi bi-people-fill"></i></i>
                <p>
                  Usuarios
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?=APP_URL;?>/admin/usuarios" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Listado de Usuarios</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../dist/pages/widgets/info-box.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>info Box</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../dist/pages/widgets/cards.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Cards</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-clipboard-fill"></i>
                <p>
                  Layout Options
                  <span class="nav-badge badge text-bg-secondary me-3">6</span>
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../dist/pages/layout/unfixed-sidebar.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Default Sidebar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../dist/pages/layout/fixed-sidebar.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Fixed Sidebar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../dist/pages/layout/layout-custom-area.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Layout <small>+ Custom Area </small></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../dist/pages/layout/sidebar-mini.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Sidebar Mini</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../dist/pages/layout/collapsed-sidebar.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Sidebar Mini <small>+ Collapsed</small></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../dist/pages/layout/logo-switch.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Sidebar Mini <small>+ Logo Switch</small></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../dist/pages/layout/layout-rtl.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Layout RTL</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-tree-fill"></i>
                <p>
                  UI Elements
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../dist/pages/UI/general.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>General</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../dist/pages/UI/icons.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Icons</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../dist/pages/UI/timeline.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Timeline</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-pencil-square"></i>
                <p>
                  Forms
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../dist/pages/forms/general.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>General Elements</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-table"></i>
                <p>
                  Tables
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../dist/pages/tables/simple.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Simple Tables</p>
                  </a>
                </li>
              </ul>
            </li>
           
                 
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-filetype-js"></i>
                <p>
                  Javascript
                  <i class="nav-arrow bi bi-chevron-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="../dist/pages/docs/javascript/treeview.html" class="nav-link">
                    <i class="nav-icon bi bi-circle"></i>
                    <p>Treeview</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="../dist/pages/docs/browser-support.html" class="nav-link">
                <i class="nav-icon bi bi-browser-edge"></i>
                <p>Browser Support</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../dist/pages/docs/how-to-contribute.html" class="nav-link">
                <i class="nav-icon bi bi-hand-thumbs-up-fill"></i>
                <p>How To Contribute</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../dist/pages/docs/faq.html" class="nav-link">
                <i class="nav-icon bi bi-question-circle-fill"></i>
                <p>FAQ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../dist/pages/docs/license.html" class="nav-link">
                <i class="nav-icon bi bi-patch-check-fill"></i>
                <p>License</p>
              </a>
            </li>
            
            <li class="nav-header">LABELS</li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-circle text-danger"></i>
                <p class="text">Important</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-circle text-warning"></i>
                <p>Warning</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-circle text-info"></i>
                <p>Informational</p>
              </a>
            </li>
          </ul>
          <!--end::Sidebar Menu-->
        </nav>
      </div>
      <!--end::Sidebar Wrapper-->
    </aside>
    <!--end::Sidebar-->
    <!--begin::App Main-->
    <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Row-->
          <div class="row">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
              </ol>
            </div>
          </div>
          <!--end::Row-->
        </div>
        <!--end::Container-->
      </div>