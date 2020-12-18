<?php

function conexion($bd_config){
    try {
        $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basededatos'],$bd_config['usuario'],$bd_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }

}

function limpiar($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function pagina_actual(){
    
    return isset($_GET['p']) ? (int)$_GET['p'] : 1; 
}

function obtener_post($post_por_pagina,$conexion){
$inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
$sentencia = $conexion->prepare("CALL `sp_select_articulos`('".$inicio."', '".$post_por_pagina."')");
$sentencia->execute();
return $sentencia->fetchAll();
}

function numero_paginas($post_por_pagina, $conexion){
    $total_post = $conexion->prepare("select found_rows() as total;");
    $total_post->execute();
    $total_post = $total_post->fetch()['total'];
    $numero_paginas = ceil($total_post / $post_por_pagina);
    return $numero_paginas;

}

function id_articulo($id){
    return (int)limpiar($id);

}

//obtiene el id del articulo que mostrare cuando se abra un post
function obtener_post_por_id($conexion,$id){
    $resultado = $conexion->query("CALL `sp_select_post`('".$id."')");
    $resultado = $resultado->fetchAll();
    return ($resultado) ? $resultado : false;
}

# Funcion para comprobar la session del admin
function comprobarSession(){
	// Comprobamos si la session esta iniciada
	if (!isset($_SESSION['admin'])) {
		header('Location: ' . RUTA);
	}
}

?>