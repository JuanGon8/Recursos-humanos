<?php
	session_start();
	require 'conexion.php';
	
	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
	
	// $nombres = $_SESSION['nombres'];
	
	$sql = "SELECT * FROM vigilantes";
	$resultado = $mysqli->query($sql);
	
	
?>

		<?php
			include 'navbar.php';
		?>
			<div id="layoutSidenav_content">
				<main>
					<div class="container-fluid"><br>
						<h1 class="mt-0">Vigilantes</h1>
						<ol class="breadcrumb mb-4">
							<li class="breadcrumb-item"><a href="principal.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Vigilancia</li>
						</ol>
						<div class="card mb-4">
                            <div class="card">
                                <div class="card-body">
                                <form method="POST" action="guardar_vigilancia.php" enctype="multipart/form-data">
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
                                            <div class="form-group">
                                                <label for="vigilante">Puesto</label>
                                                    <select name="vigilante" id="vigilante" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Vigilante">Vigilante</option>
                                                        <option value="Supervisor">Supervisor</option>
														<option value="Rondinero">Rondinero</option>
														<option value="Casetero">Casetero</option>
                                                    </select>
                                            </div>
                                        </div>
										<div class="col-2">
                                            <div class="form-group">
                                                <label for="vehiculo">Vehículo asignado</label>
                                                    <select name="vehiculo" id="vehiculo" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Bicicleta">Bicicleta</option>
                                                        <option value="Cuatrimoto">Cuatrimoto</option>
														<option value="Moto">Moto</option>
														<option value="Auto">Auto</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <label for="ubicacion">Ubicacion</label>
                                            <input class="form-control inputwidth" type="text" name="ubicacion" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="uniforme_cant">Cantidad de uniformes</label>
                                            <input class="form-control" type="text" name="uniforme_cant" required>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="cor_mando">Cordón de mando</label>
                                                    <select name="cor_mando" id="cor_mando" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Sí">Sí</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
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
                                                <label for="fornitura">Fornitura</label>
                                                    <select name="fornitura" id="fornitura" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Sí">Sí</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="gorra">Gorra</label>
                                                    <select name="gorra" id="gorra" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Sí">Sí</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="tonfa">Tonfa</label>
                                                    <select name="tonfa" id="tonfa" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Sí">Sí</option>
                                                        <option value="No">No</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    <br>
                                    <div class="row">
                                    <div class="col-2">
                                            <div class="form-group">
                                                <label for="radio">Radio</label>
                                                    <select name="radio" id="radio" class="form-control" required>
                                                        <option selected disabled>Elige una opción</option>
                                                        <option value="Steren RAD-010">Steren RAD-010</option>
                                                        <option value="Kenwood TK-3000">Kenwood TK-3000</option>
                                                    </select>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                                <div class="form-group">
                                                    <label for="botas">Botas</label>
                                                        <select name="botas" id="botas" class="form-control" required>
                                                            <option selected disabled>Elige una opción</option>
                                                            <option value="Sí">Sí</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                </div>
                                            </div> <br>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="silbato">Silbato</label>
                                                        <select name="silbato" id="silbato" class="form-control" required>
                                                            <option selected disabled>Elige una opción</option>
                                                            <option value="Sí">Sí</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="det_metal">Detector de metal</label>
                                                        <select name="det_metal" id="det_metal" class="form-control" required>
                                                            <option selected disabled>Elige una opción</option>
                                                            <option value="Sí">Sí</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="lamparas">Lámpara</label>
                                                        <select name="lamparas" id="lamparas" class="form-control" required>
                                                            <option selected disabled>Elige una opción</option>
                                                            <option value="Sí">Sí</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="body_cam">Body cam</label>
                                                        <select name="body_cam" id="body_cam" class="form-control" required>
                                                            <option selected disabled>Elige una opción</option>
                                                            <option value="Sí">Sí</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                </div>
                                            </div>
                                    </div> <br>
                                    <div class="row">
                                    <div class="col-2">
                                                <div class="form-group">
                                                    <label for="casco">Casco</label>
                                                        <select name="casco" id="casco" class="form-control" required>
                                                            <option selected disabled>Elige una opción</option>
                                                            <option value="Sí">Sí</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="chalecos">Chaleco</label>
                                                        <select name="chalecos" id="chalecos" class="form-control" required>
                                                            <option selected disabled>Elige una opción</option>
                                                            <option value="Sí">Sí</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="telefono_asig">Teléfono asignado</label>
                                                        <select name="telefono_asig" id="telefono_asig" class="form-control" required>
                                                            <option selected disabled>Elige una opción</option>
                                                            <option value="Redmi 9A">Redmi 9A</option>
                                                            <option value="Samsung 04">Samsung 04</option>
                                                            <option value="Moto E6 Play">Moto E6 Play</option>
                                                            <option value="Alcatel 1B">Alcatel 1B</option>
                                                            <option value="Redmi 1A">Redmi 1A</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="impermeable">Impermeable</label>
                                                        <select name="impermeable" id="impermeable" class="form-control" required>
                                                            <option selected disabled>Elige una opción</option>
                                                            <option value="Sí">Sí</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                </div>
                                            </div>
                                    </div>
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
                                                <th>Puesto</th>
                                                <th>Vehiculo asignado</th>
                                                <th>Ubicación</th>
                                                <th>Cantidad de uniformes</th>
                                                <th>Cordón de mando</th>
												<th>Gafette</th>
                                                <th>Fornitura</th>
												<th>Gorra</th>
                                                <th>Tonfa</th>
                                                <th>Radio</th>
                                                <th>Botas</th>
                                                <th>Telefono asignado</th>
                                                <th>Silbato</th>
                                                <th>Detector de metales</th>
												<th>Lámpara</th>
												<th>Body cam</th>
												<th>Casco</th>
												<th>Chaleco</th>
                                                <th>Impermeable</th>
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
                                                    <td><?php echo $row['vigilante']; ?></td>
                                                    <td><?php echo $row['vehiculo']; ?></td>
                                                    <td><?php echo $row['ubicacion']; ?></td>
													<td><?php echo $row['uniforme_cant']; ?></td>
                                                    <td><?php echo $row['cor_mando']; ?></td>
													<td><?php echo $row['gafette']; ?></td>
                                                    <td><?php echo $row['fornitura']; ?></td>
                                                    <td><?php echo $row['gorra']; ?></td>
                                                    <td><?php echo $row['tonfa']; ?></td>
                                                    <td><?php echo $row['radio']; ?></td>
                                                    <td><?php echo $row['botas']; ?></td>
                                                    <td><?php echo $row['telefono_asig']; ?></td>
                                                    <td><?php echo $row['silbato']; ?></td>
													<td><?php echo $row['det_metal']; ?></td>
													<td><?php echo $row['lamparas']; ?></td>
													<td><?php echo $row['body_cam']; ?></td>
													<td><?php echo $row['casco']; ?></td>
                                                    <td><?php echo $row['chalecos']; ?></td>
                                                    <td><?php echo $row['impermeable']; ?></td>
													<td>
                                                        <!-- <div class="modal" id="myModal">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Editar Registro</h5>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <div class="modal-body">
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
                                                        </div> -->
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
                                                                        <input type="hidden" id="modalRecordId">
                                                                        <label for="nombres">Nombres</label>
                                                                        <input class="form-control inputwidth" type="text" name="nombres" required>
                                                                        <!-- Agregar los demás campos del registro aquí -->
                                                                        <!-- ... -->
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        <button type="button" class="btn btn-primary" onclick="saveChanges()">Guardar Cambios</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button class="btn btn-primary" onclick="openModal(<?php echo $row['id']; ?>)">Editar</button>
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
		<!-- ... (código HTML anterior) ... -->