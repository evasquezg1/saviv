<?php
	
	class Database{
		
		public function conn() {
	        $dbhost = "localhost";
	        $dbname = "saviv";        
	        $dbuser = "root";
	        $dbpass = "";   

	        if($conn = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'))){
	            return($conn);
	         }
	         else {
	            return null;
	        }
	    }

	}

	class Saviv{

		public function insertEmpleado($datos){
			$db = new Database();
			$conn = $db->conn();

			$sql = $conn->prepare("INSERT INTO empleados VALUES(NULL,'".$datos['nombre']."','".$datos['apellido']."','".$datos['email']."','".$datos['telefono']."','".$datos['fecha_contratacion']."','1','".$datos['salario']."','".$datos['porcentaje']."','1','".$datos['departamento']."')");
			$sql->execute();
		}

		public function getDepartamentos(){
			$db = new Database();
			$conn = $db->conn();

			$sql = $conn->prepare("SELECT * FROM departamentos");
			$sql->execute();
			return $sql->fetchAll();
		}

		public function insertDepartamento($datos){
			$db = new Database();
			$conn = $db->conn();

			$sql = $conn->prepare("INSERT INTO departamentos VALUES(NULL,'".$datos['nombre']."','1','1')");
			$sql->execute();
		}

		public function getNumEmplDep(){
			$db = new Database();
			$conn = $db->conn();

			$sql = $conn->prepare("SELECT count(e.ID_EMPLEADO) as total, d.NOMBRE_DEPARTAMENTO FROM empleados AS e INNER JOIN departamentos AS d ON d.ID_DEPARTAMENTO=e.ID_DEPARTAMENTO GROUP BY d.ID_DEPARTAMENTO");
			$sql->execute();

			return $sql->fetchAll();
		}

		public function getEmplDep(){
			$db = new Database();
			$conn = $db->conn();

			$sql = $conn->prepare("SELECT CONCAT(e.NOMBRE,' ',e.APELLIDO) AS nombre_completo, d.NOMBRE_DEPARTAMENTO, d.ID_DEPARTAMENTO FROM empleados AS e INNER JOIN departamentos AS d ON d.ID_DEPARTAMENTO=e.ID_DEPARTAMENTO");
			$sql->execute();

			return $sql->fetchAll();
		}

		public function getEmplDepSal(){
			$db = new Database();
			$conn = $db->conn();

			$sql = $conn->prepare("SELECT CONCAT(e.NOMBRE,' ',e.APELLIDO) AS NOMBRE_COMPLETO, e.SALARIO, d.NOMBRE_DEPARTAMENTO FROM empleados e, departamentos d WHERE e.SALARIO IN(SELECT MIN(SALARIO) FROM empleados GROUP BY ID_DEPARTAMENTO) GROUP BY e.ID_DEPARTAMENTO");
			$sql->execute();

			return $sql->fetchAll();
		}

		public function burbuja($A,$n){
        	for($i=1;$i<$n;$i++){
                for($j=0;$j<$n-$i;$j++){
                    if($A[$j]>$A[$j+1]){
                    	$k=$A[$j+1];
                    	$A[$j+1] = $A[$j];
                    	$A[$j] = $k;
                    }
                }
        	}
  	    	return $A;
    	}

    	public function getVendedores(){
    		$db = new Database();
			$conn = $db->conn();

			$sql = $conn->prepare("SELECT vendedor FROM dt_vendedores");
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_COLUMN);		
    	}

	}

?>