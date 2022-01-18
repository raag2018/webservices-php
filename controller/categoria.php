<?php 
	header("Content-Type: application/json");
	require_once("../config/conexion.php");
	require_once("../models/Categoria.php");
	$body = json_decode(file_get_contents("php://input"),true);
	$categoria = new Categoria();
	switch ($_GET['op']) {
		case 'GetAll':
			$datos = $categoria->get_categoria();
			echo json_encode($datos);
			break;
		case 'GetId':
			$datos = $categoria->get_categoria_x_id($body["id_cat"]);
			echo json_encode($datos);
			break;
		case 'Insert':
			$datos = $categoria->insert_categoria($body["nombre"],$body["descripcion"]);
			echo json_encode("Guardado con exito");
			break;
		case 'Update':
			$datos = $categoria->update_categoria($body["id_cat"],$body["nombre"],$body["descripcion"]);
			echo json_encode("Actualizado con exito");
			break;
		case 'Delete':
			$datos = $categoria->delete_categoria($body["id_cat"]);
			echo json_encode("Eliminado con exito");
			break;
		default:
			echo "Sin datos";
			break;
	}
 ?>