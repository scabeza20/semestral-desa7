<?php session_start();
require 'config/config.php';
require 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = limpiar($_POST['usuario']);
	$password = limpiar($_POST['password']);

	if ($usuario == $blog_admin['usuario'] && $password == $blog_admin['password']) {
		$_SESSION['admin'] = $blog_admin['usuario'];
		header('Location: '. RUTA . 'config');
	}
}

require 'vistas/login.view.php';

?>