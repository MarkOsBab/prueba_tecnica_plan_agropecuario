<?php 
	include 'config.class.php';

	$errorMSG = '';

	//Validamos que el input se envíe 
	if (isset($_POST['save_color'])) {
		//Obtenemos la función para conectarnos con la base de datos
		$db = getDB();


		// Seleccionamos los inputs para luego enviarlos en la consulta
		$color_switch = $_POST['color_switch'];

		// Verificamos que el color no se repita 
		$check_color = $db->prepare("SELECT COUNT(color) FROM saved_colors WHERE color='$color_switch'");
		$check_color->execute();

		// Creamos la variable para ejecutar condición
		$result_check_color = $check_color->fetchColumn();

		// Creamos una condicional para no repetir los colores en la base de datos
		if ($result_check_color >= 1) {
			$errorMSG = '
				<div class="bg-danger text-center">
					<h6 class="text-light p-3">Este color ya se ingresó en la base de datos</h6>
				</div>
			';
		} else {
			// Realizamos la consulta a la base de datos
			$save_new_color = $db->prepare("INSERT INTO saved_colors (color) VALUES ('$color_switch')");
			$save_new_color->execute();
		}
	}

	// Función para mostrar la lista de colores
	function show_color_list() {
		//Obtenemos la función para conectarnos con la base de datos
		$db = getDB();

		// Ejecutamos la consulta para seleccionar todos los colores guardados
		$select_color = $db->prepare("SELECT * FROM saved_colors ORDER BY id DESC");
		$select_color->execute();

		// Ejecutamos consulta para ver que hayan colores en la tabla "saved_colors"
		$check_count = $db->prepare("SELECT COUNT(*) FROM saved_colors");
		$check_count->execute();

		// Creamos una variable que valide si hay o no hay datos que contar
		$result_check_count = $check_count->fetchColumn();

		// Validamos que hayan datos ingresados en la base de datos
		if ($result_check_count > 0) {
			// Obtenemos los datos que queremos mostrar
			foreach ($select_color as $row) {
				// Creamos una variable para los colores ingresados
				$rowColor = $row['color'];

				// Mostramos los datos
				echo '
				<tr>
					<th scope="col"><p>'.$rowColor.'</p></th>
					<th scope="col">
						<div style="background-color: '.$rowColor.'" class="p-3"></div>
					</th>
				</tr>
				';
			}
			// Si no hay datos que contar mostramos lo siguiente
		} else {
			echo '
			<tr>
				<th scope="col">No hay resultados, ningun color guardado</th>
				<th scope="col"></th>
			</tr>
			';
		}
	}

	// Función para guardar el último color guardado en la tabla "saved_colors"
	function get_color_value() {
		// Obtenemos la función para conectarnos con la base de datos
		$db = getDB();

		// Obtenemos el último ID ingresado en la base de datos
		$last_color_id = $db->prepare("SELECT MAX(id) AS id FROM saved_colors");
		$last_color_id->execute();

		// Creamos la variable para obtener el resultado
		$result_id = $last_color_id->fetch(PDO::FETCH_NUM);

		// Eliminamos espacios en blaco o caracteres innecesarios
		$id = trim($result_id[0]);

		// Seleccionamos el último ID ingresado para realizar la consulta y obtener el color
		$select_color = $db->prepare("SELECT * FROM saved_colors WHERE id='$id'");
		$select_color->execute();

		// Ejecutamos consulta para ver que hayan colores en la tabla "saved_colors"
		$check_count = $db->prepare("SELECT COUNT(*) FROM saved_colors");
		$check_count->execute();

		// Creamos una variable que valide si hay o no hay datos que contar
		$result_check_count = $check_count->fetchColumn();


		// Validamos que hayan datos ingresados en la base de datos
		if ($result_check_count > 0) {
			foreach ($select_color as $row) {
				// Creamos una variable para los colores ingresados
				$rowColor = $row['color'];
				// Mostramos los datos
				echo $rowColor;
			}
			//Si no hay datos mostramos el color negro por defecto
		} else {
			echo '#000000';
		}
	}
?>