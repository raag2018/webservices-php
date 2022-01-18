<?php 
	class Categoria extends Conectar{
		public function get_categoria(){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM categoria WHERE estado = 1;";
			$sql = $conectar->prepare($sql);
			$sql->execute();
			return $result = $sql->fetchAll(PDO::FETCH_ASSOC);
		}
		public function get_categoria_x_id($id_cat){
			$conectar = parent::conexion();
			//parent::set_names();
			$sql = "SELECT * FROM categoria WHERE id_cat = ? AND estado = 1;";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1,$id_cat);
			$sql->execute();
			$result = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		public function insert_categoria($nombre, $descripcion){
			$conectar = parent::conexion();
			//parent::set_names();
			$estado = 0;
			$sql = "INSERT INTO categoria(nombre, descripcion, estado) VALUES(?,?,?);";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1,$nombre);
			$sql->bindValue(2,$descripcion);
			$sql->bindValue(3,$estado);
			$sql->execute();
			$result = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		public function update_categoria($id_cat, $nombre, $descripcion){
			$conectar = parent::conexion();
			//parent::set_names();
			$estado = 1;
			$sql = "UPDATE categoria SET nombre = ?, descripcion = ?, estado = ? WHERE id_cat = ?";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $nombre);
			$sql->bindValue(2, $descripcion);
			$sql->bindValue(3, $estado);
			$sql->bindValue(4, $id_cat);
			$sql->execute();
			$result = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		public function delete_categoria($id_cat){
			$conectar = parent::conexion();
			//parent::set_names();
			$estado = 0;
			$sql = "UPDATE categoria SET estado = ? WHERE id_cat = ?;";
			$sql = $conectar->prepare($sql);
			$sql->bindValue(1, $estado);
			$sql->bindValue(2, $id_cat);
			$sql->execute();
			$result = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}

	}
 ?>