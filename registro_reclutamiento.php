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
						<h1 class="mt-0">Registro de candidatos</h1>
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
						<d  iv class="card mb-4">
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
                                                <th>Teléfono</th>
                                                <th>Dirección</th>
                                                <th>Edad</th>
                                                <th>Moto</th>
                                                <th>Último empleo</th>
                                                <th>Antiguedad</th>
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
                                                    <td><?php echo $row['direccion']; ?></td>
                                                    <td><?php echo $row['edad']; ?></td>
                                                    <td><?php echo $row['moto']; ?></td>
                                                    <td><?php echo $row['ultimo_empleo']; ?></td>
                                                    <td><?php echo $row['antiguedad']; ?></td>
                                                    <td><?php echo $row['motivo_salida']; ?></td>
                                                    <td><?php echo $row['puesto_aplicado']; ?></td>
                                                    <td><?php echo $row['estats']; ?></td>
                                                    <td><?php echo $row['comentarios']; ?></td>
													<td>
                                                    <button class="btn btn-primary" onclick="openModal(<?php echo json_encode($row['id']); ?>)">Editar</button>

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
                                                        <button class="btn btn-success" onclick="moveToVigilantes(<?php echo $row['id']; ?>)">Mover a Vigilantes</button></td>
                                                        <!-- <button class="btn btn-primary" id="transferButton">Mover Datos a Vigilantes</button> -->
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
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		<script src="js/scripts.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
		<script src="assets/demo/datatables-demo.js"></script>
		<!-- ... (código HTML anterior) ... -->
        <script>
            function deleteRow(id) {
                // This function will handle the deletion of the row from the client-side
                if (confirm("¿Estás seguro de que quieres eliminar este registro?")) {
                    // If the user confirms the deletion, send an AJAX request to delete the row
                    $.ajax({
                        type: "POST",
                        url: "eliminar_vigilancia.php",
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
<script>
function openModal(recordId) {
  // Asigna el ID del registro al elemento en el modal que muestra el ID
  document.getElementById('modalRecordId').textContent = recordId;
  // Abre el modal utilizando el método de Bootstrap
  $('#myModal').modal('show');
}

function saveChanges() {
  // Obtener el nuevo valor del campo "nombre" del input en el modal
  var nuevoNombre = $('input[name="nombres"]').val();
  
  // Obtener el ID del registro que se está editando
  var recordId = $('#modalRecordId').text();
  
  // Enviar una solicitud AJAX para actualizar el nombre en el servidor
  $.ajax({
    type: "POST",
    url: "actualizar_nombre.php", // Cambia esto por la URL de tu script de actualización
    data: { id: recordId, nuevoNombre: nuevoNombre },
    success: function(response) {
      // Aquí puedes actualizar la interfaz de usuario si la actualización fue exitosa
      $('#myModal').modal('hide');
      $('#row_' + recordId + ' td:nth-child(2)').text(nuevoNombre); // Actualizar el nombre en la tabla
    },
    error: function(error) {
      // Manejar el error si la actualización falla
      console.error("Error al actualizar: ", error);
    }
  });
}
() {
        if (confirm("¿Estás seguro de que deseas mover los datos a reclutamiento_baja?")) {
            // Realiza una petición AJAX para mover los datos
            $.ajax({
                type: "POST",
                url: "mover_datos.php",
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        alert("Datos movidos correctamente.");
                        // Actualiza la página para reflejar los cambios en la tabla
                        location.reload();
                    } else {
                        alert("Error al mover los datos: " + response.message);
                    }
                },
                error: function () {
                    alert("Error en la solicitud AJAX");
                }
            });
        }
    }
</script>

<script>
    function moveToVigilantes(id) {
        // This function will handle the data transfer to the "vigilantes" table
        if (confirm("¿Estás seguro de que quieres mover estos datos a la tabla de vigilantes?")) {
            // Send an AJAX request to move the data
            $.ajax({
                type: "POST",
                url: "move_to_vigilantes.php",
                data: { id: id },
                dataType: "json",
                success: function (response) {
                    if (response.status === "success") {
                        // If the data transfer was successful, remove the row from the table
                        const table = document.getElementById("dataTable");
                        const row = document.getElementById("row_" + id);
                        table.deleteRow(row.rowIndex);
                    } else {
                        // If there was an error in the data transfer, display an error message
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

</html>
 