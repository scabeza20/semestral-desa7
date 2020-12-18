<?php session_start();

require 'config.php';
require '../funciones.php';

// Comprobamos si la session esta iniciada, sino, redirigimos.
comprobarSession();

// 1.- Conectamos a la base de datos
$conexion = conexion($bd_config);
if(!$conexion){
	header('Location: ../error.php');
}

$id = limpiar($_GET['id']);

// Comprobamos que exista un ID
if (!$id) {
	header('Location:' . RUTA . '/config');
}

$statement = $conexion->prepare("CALL `sp_eliminar_articulo`('".$id."')");
$statement->execute(array('id' => $id));

header('Location: ' . RUTA . '/config');

?>