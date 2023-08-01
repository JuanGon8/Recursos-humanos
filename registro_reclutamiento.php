<?php
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	// $nombres = $_SESSION['nombres'];
	
	$sql = "SELECT * FROM reclutamiento";
	$resultado = $mysqli->query($sql);
	
	
?>

		<?php
			include 'navbar.php';
		?>
			<div id="layoutSidenav_content">
				<main>
					<div class="container-fluid"><br>
						<h1 class="mt-0">Módulo de registro</h1>
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item"><a href="principal.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Módulo de reclutamiento</li>
						</ol>
						<div class="card mb-4">
                            <div class="card">
                                <div class="card-body">
                                <form method="POST" action="guardar_informacion.php" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <label for="nombres">Nombres</label>
                                            <input class="form-control inputwidth" type="text" name="nombres" required>
                                        </div>
                                        <div class="col">
                                            <label for="primer_apellido">Primer Apellido</label>
                                            <input class="form-control" type="text" name="primer_apellido" required>
                                        </div>
                                        <div class="col">
                                            <label for="segundo_apellido">Segundo Apellido</label>
                                            <input class="form-control" type="text" name="segundo_apellido" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <label for="telefono">Teléfono</label>
                                            <input class="form-control" type="text" name="telefono" required>
                                        </div>
                                        <div class="col">
                                            <label for="edad">Edad</label>
                                             <input class="form-control" type="text" name="edad" required>
                                        </div>
										<div class="col">
											<label for="direccion">Dirección</label>
											<input class="form-control" type="text" name=
											"direccion">
										</div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="moto">¿Cuenta con vehículo?</label>
                                                    <select name="moto" id="moto" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Sí">Sí</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="ultimo_empleo">Último Empleo</label>
                                            <input class="form-control" type="text" name="ultimo_empleo" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="antiguedad">Antigüedad</label>
                                            <input class="form-control" type="text" name="antiguedad" required>
                                        </div>
                                        <div class="col">
                                            <label for="motivo_salida">Motivo de Salida</label>
                                            <input class="form-control" type="text" name="motivo_salida" required>
                                        </div>
                                        <div class="col">
                                            <label for="puesto_aplicado">Puesto Aplicado</label>
                                            <input class="form-control" type="text" name="puesto_aplicado" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col">
                                            <label for="comentarios">Comentarios</label>
                                            <textarea class="form-control texta" name="comentarios" required rows="5"></textarea>
                                        </div>
                                        <div class="col">
                                        <div class="form-group">
                                            <label for="estats">Estatus</label>
                                                <select name="estats" id="estats" class="form-control" required>
                                                    <option selected disabled>Elige una opción</option>
                                                    <option value="Aprobado">Aprobado</option>
                                                    <option value="Denegado">Denegado</option>
                                                    <option value="Pendiente">Pendiente</option>
                                                </select>
                                            </div>
											<!-- <div class="input-group">
												<div class="custom-file">
													<input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="archivo">
													<label class="custom-file-label" for="inputGroupFile04">Seleccionar archivo</label>
												</div>
											</div> -->
                                        </div>
                                    </div>
                                    <br>
                                    <div id="liveAlertPlaceholder"></div>
                                    <input type="submit" value="Guardar" class="btn btn-primary col-2 submitbutton" id="liveAlertBtn">
                                </form>
                                </div>
                            </div>
						</div>
					</div>
                    <div class="container-fluid"><br>
						<h1 class="mt-0">Candidatos</h1>
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item"><a href="principal.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Módulo de reclutamiento</li>
						</ol>
						<div class="card mb-4">
							<div class="card-body">En este apartado, encontrarás la fuente de información sobre los futuros reclutamientos.</div>
						</div>
						<div class="card mb-4">
						</div>
						<div class="card mb-4">
							<div class="card-header"><i class="fas fa-table mr-1"></i>Posibles reclutamientos</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
										<thead>
											<tr>
												<th>ID</th>
												<th>Nombre</th>
												<th>Primer apellido</th>
												<th>Segundo apellido</th>
												<th>Teléfono</th>
                                                <th>Edad</th>
												<th>Dirección</th>
                                                <th>Vehículo</th>
                                                <th>Último empleo</th>
                                                <th>Antigüedad</th>
                                                <th>Motivo de salida</th>
                                                <th>Puesto aplicado</th>
                                                <th>Estatus</th>
                                                <th>Comentarios</th>
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
													<td><?php echo $row['telefono']; ?></td>
                                                    <td><?php echo $row['edad']; ?></td>
													<td><?php echo $row['direccion']; ?></td>
                                                    <td><?php echo $row['moto']; ?></td>
                                                    <td><?php echo $row['ultimo_empleo']; ?></td>
                                                    <td><?php echo $row['antiguedad']; ?></td>
                                                    <td><?php echo $row['motivo_salida']; ?></td>
                                                    <td><?php echo $row['puesto_aplicado']; ?></td>
                                                    <td><?php echo $row['estats']; ?></td>
                                                    <td><?php echo $row['comentarios']; ?></td>
													<td>  <!-- Botón para borrar la fila -->
                                <button class="btn btn-danger" onclick="deleteRow(<?php echo $row['id']; ?>)">Borrar</button></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
								</div>
								</div>
					</div>
					</main>
					<footer class="py-4 bg-light mt-auto">
						<div class="container-fluid">
						<div class="d-flex align-items-center justify-content-between small">
					<div class="text-muted">Copyright &copy; Your Website 2019</div>
					<div>
						<a href="#">Privacy Policy</a>
						&middot;
						<a href="#">Terms &amp; Conditions</a>
					</div>
					</div>
					</div>
				</footer>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/datatables-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	</body>
</html>
<script>
    function deleteRow(id) {
        // This function will handle the deletion of the row from the client-side
        if (confirm("¿Estás seguro de que quieres eliminar este registro?")) {
            // If the user confirms the deletion, send an AJAX request to delete the row
            $.ajax({
                type: "POST",
                url: "eliminar_registro.php",
                data: { id: id },
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        // If the deletion was successful, remove the row from the table
                        const table = document.getElementById("dataTable");
                        const row = document.getElementById("row_" + id);
                        table.deleteRow(row.rowIndex);
                    } else {
                        // If there was an error in the deletion, display an error message
                        alert("Error: " + response.message);
                    }
                },
                error: function () {
                    alert("Error en la solicitud AJAX");
                }
            });
        }
    }
</script>
