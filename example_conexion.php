/*
	se debe crear un directorio config donde debe ir este fichero con el nombre de conexion.php
*/
<?php 
	class Conectar{
		protected $dbh;
		protected function Conexion(){
			try {
				$server = "mysql:local=".'localhost';
				$database = ";dbname=".'webservices';
				$user = 'root';
				$password = 'Pr0t3c$1on';
				$conectar = $this->dbh = 
				new PDO(
						$server.$database, 
						$user, $password);
				return $conectar;
			} catch (Exception $e) {
				print "Error BDD: ".$e->getMessage()."<br/>";
				die();
			}
		}
		public function set_names(){
			//return $this->dbh->query("SET NAMES 'utf8");
		}
	}

 ?>#   
