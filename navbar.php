<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Tables - SB Admin</title>
		<link href="css/styles.css" rel="stylesheet" />
		<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
	</head>
	<body class="sb-nav-fixed">
		<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
			<a class="navbar-brand" href="principal.php"><img src="assets/img/svm_logo.png" class="logonav"alt=""> Grupo SVM</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
			><!-- Navbar Search-->
			<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
				<div class="input-group">
					<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
					<div class="input-group-append">
						<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
					</div>
				</div>
			</form>
			<!-- Navbar-->
			<ul class="navbar-nav ml-auto ml-md-0">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
						<a class="dropdown-item" href="index.php">Cerrar sesión</a>
					</div>
				</li>
			</ul>
		</nav>
		<div id="layoutSidenav">
			<div id="layoutSidenav_nav">
				<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
					<div class="sb-sidenav-menu">
						<div class="nav">
							<div class="sb-sidenav-menu-heading">Core</div>
							<a class="nav-link" href="principal.php"
							><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
								Dashboard</a
							>
							<div class="sb-sidenav-menu-heading">Módulos de registro</div>
                            <a class="nav-link" href="registro_reclutamiento.php">
								<div class="sb-nav-link-icon">
									<i class="fas fa-table"></i>
								</div>
								Registro candidatos</a>
							<!-- <a class="nav-link" href="candidatos.php">
									<div class="sb-nav-link-icon">
										<i class="fas fa-user"></i>
									</div>
								Candidatos</a> -->
                            <div class="sb-sidenav-menu-heading">Vigilancia</div>
							<!-- <a class="nav-link" href="tabla.php">
								<div class="sb-nav-link-icon">
									<i class="fas fa-chart-area"></i>
								</div>
								Usuarios</a> -->
							<a class="nav-link" href="vigilante.php">
							<div class="sb-nav-link-icon">
								<i class="fas fa-chart-area"></i>
							</div>
								Vigilantes</a>
								<a class="nav-link" href="limpieza.php">
							<div class="sb-nav-link-icon">
								<i class="fas fa-chart-area"></i>
							</div>
								Limpieza</a>
						</div>
					</div>
					<div class="sb-sidenav-footer">
						<div class="small">Sesión iniciada como:</div>
						Usuario
					</div>
				</nav>
			</div>