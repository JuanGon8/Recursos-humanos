<?php
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	// $nombres = $_SESSION['nombres'];
	
	$sql = "SELECT * FROM limpieza";
	$resultado = $mysqli->query($sql);
	
	
?>

		<?php
			include 'navbar.php';
		?>
			<div id="layoutSidenav_content">
				<main>
					<div class="container-fluid"><br>
						<h1 class="mt-0">Limpieza</h1>
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item"><a href="principal.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Vigilancia</li>
						</ol>
						<!-- <div class="card mb-4">
							<div class="card-body">En este apartado, encontrarás la información de los empleados del área de vigilancia.</div>
						</div> -->
						<div class="card mb-4">
                            <div class="card">
                                <div class="card-body">
                                <form method="POST" action="guardar_limpieza.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="nombres">Nombres</label>
                                            <input class="form-control inputwidth" type="text" name="nombres" required>
                                        </div>
                                        <div class="col-2">
                                            <label for="primer_apellido">Primer Apellido</label>
                                            <input class="form-control" type="text" name="primer_apellido" required>
                                        </div>
                                        <div class="col-2">
                                            <label for="segundo_apellido">Segundo Apellido</label>
                                            <input class="form-control" type="text" name="segundo_apellido" required>
                                        </div>
                                        <div class="col-2">
                                            <label for="ubicacion">Ubicación</label>
                                            <input class="form-control" type="text" name="ubicacion" required>
                                        </div>
										<div class="col-2">
                                            <div class="form-group">
                                                <label for="gafette">Gafette</label>
                                                    <select name="gafette" id="gafette" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Sí">Sí</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                        </div>
										<div class="col-2">
                                            <div class="form-group">
                                                <label for="bata">Bata</label>
                                                    <select name="bata" id="bata" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Sí">Sí</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                        </div>
										
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="tenis">Tenis</label>
                                                    <select name="tenis" id="tenis" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Sí">Sí</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div> <br>
                                    <div id="liveAlertPlaceholder"></div>
                                    <input type="submit" value="Guardar" class="btn btn-primary col-2 submitbutton" id="liveAlertBtn">
                                </form>
                                </div>
                            </div>
						</div>
						<div class="card mb-4">
							<div class="card-header"><i class="fas fa-table mr-1"></i>Vigilantes</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>ID</th>
												<th>Nombre</th>
												<th>Primer apellido</th>
												<th>Segundo apellido</th>
                                                <th>Ubicación</th>
                                                <th>Gafette</th>
                                                <th>Bata</th>
                                                <th>Tenis</th>
                                                <th>Acciones</th>
                                                
											</tr>
										</thead>
										<tbody>
											<?php while($row = $resultado->fetch_assoc()) { ?>
												
												<tr id="row_<?php echo $row['id']; ?>">
													<td><?php echo $row['id']; ?></td>
													<td><?php echo $row['nombres']; ?></td>
													<td><?php echo $row['primer_apellido']; ?></td>
													<td><?php echo $row['segundo_apellido']; ?></td>
                                                    <td><?php echo $row['ubicacion']; ?></td>
                                                    <td><?php echo $row['gafette']; ?></td>
                                                    <td><?php echo $row['bata']; ?></td>
                                                    <td><?php echo $row['tenis']; ?></td>
													<td>
                                                        <button class="btn btn-primary" onclick="openModal(<?php echo $row['id']; ?>)">Editar</button>
                                                                <div class="modal" id="myModal">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Editar Registro</h5>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <!-- Contenido específico del modal -->
                                                                            <!-- Puedes agregar campos de edición, formularios, etc. aquí -->
                                                                            <!-- Por ejemplo: -->
                                                                            <p>Estás editando el registro con ID: <span id="modalRecordId"></span></p>
                                                                            <label for="nombres">Nombres</label>
                                                                                <input class="form-control inputwidth" type="text" name="nombres" required>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                            <button type="button" class="btn btn-primary" onclick="saveChanges()">Guardar Cambios</button>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-danger" onclick="deleteRow(<?php echo $row['id']; ?>)">Borrar</button>
                                                    </td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
									
								</div>
								</div>
								</div>
					</div>
					</main>

			</div>
			</div>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/datatables-demo.js"></script>
		<!-- ... (código HTML anterior) ... -->
 