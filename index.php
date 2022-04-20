<!DOCTYPE html>
<html>
<head>
	<?php require './public/classes/consult.class.php'; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prueba técnica Plan Agropecuario</title>

	<!-- CSS Files -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./public/css/main.css">
</head>
<body>

<!-- Sección seleccionar color -->
<section class="container-fluid">
	<div class="d-flex align-items-center justify-content-center">
		<div class="col-sm-12 col-md-8 col-lg-8">
			<h1>Generador de fondos</h1>
			<!-- Seleccionador de fondo -->
			<form method="post">
				<div class="row d-flex align-items-center justify-content-center text-light text-center">
					<div class="col-sm-12 col-md-12 col-lg-12 clear-box mt-2">
						<div class="bg-dark p-3">
						<h2 class="p-3">Selecciona un color</h2>
							<!-- Seleccionamos el color -->
							<input class="form-control-lg d-inline" onchange="switch_color()" type="color" id="color_switch" name="color_switch" value="<?php get_color_value(); ?>">
							<!-- Muestra el código hexadecimal del color seleccionado -->
							<h5 class="p-3" id="hex_code">HEX CODE: <code><?php get_color_value(); ?></code></h5>
						</div>
					</div>
					<!-- Resultado del color seleccionado -->
					<div class="col-sm-12 col-md-12 col-lg-12 h-100 bg-dark">
						<h2 class="p-3">Color seleccionado</h2>

						<div class="d-flex justify-content-center p-4">
							<div class="p-5 rounded" id="display_color" style="background-color: <?php get_color_value(); ?>;"></div>
							<!-- Botón para guardar el color en la base de datos -->
							<button class="btn btn-lg btn-warning m-2 mt-4 mb-4" name="save_color">Guardar estílo</button>
						</div>
						<div class="row">
							<!-- Mostramos el mensaje de error cuando lo haya -->
							<?php echo $errorMSG; ?>
						</div>
					</div>
				</div>
			</form>
			<div class="row m-5">
				<h2>Lista de colores guardados</h2>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Estilo guardado</th>
							<th scope="col">Color</th>
						</tr>
					</thead>
					<tbody>
						<?php show_color_list(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>

<!-- JS Files -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="public/js/main.js"></script>
</body>
</html>