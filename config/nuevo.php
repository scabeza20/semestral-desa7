<?php session_start();
require 'config.php';
require '../funciones.php';

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSession();

// Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

// Comprobamos si los datos han sido enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$titulo = limpiar($_POST['titulo']);
	$extracto = limpiar($_POST['extracto']);
	// Con la funcion nl2br podemos transformar los saltos de linea en etiquetas <br>
	$texto = $_POST['texto'];
	$thumb = $_FILES['thumb']['tmp_name'];

	// Direccion final del archivo incluyendo el nombre
	# Importante recordar que este archivo se encuentra dentro de la carpeta admin, asi que
	# tenemos que concatenar al inicio '../' para bajar a la raiz de nuestro proyecto.
	$archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];

	// Subimos el archivo
	move_uploaded_file($thumb, $archivo_subido);

	$statement = $conexion->prepare(
		"CALL `sp_ingresar_articulos`('".$titulo."', '".$extracto."', '".$texto."', '".$_FILES['thumb']['name']."')"
	);

	$statement->execute();

	header('Location: ' . RUTA . '/config');
}


require '../vistas/nuevo.view.php';

?>