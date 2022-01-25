<?php
	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="alumnos";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
        public function sanitize($var){
            $return = mysqli_real_escape_string($this->con, $var);
            return $return;
        }
        public function create($matricula,$nombre,$apellido,$direccion,$correo_electronico){
            $sql = "INSERT INTO `alumnos` (matricula, nombre, apellido, direccion, correo_electronico) VALUES ('$matricula, $nombre', '$apellido' , '$direccion', '$correo_electronico')";
            $res = mysqli_query($this->con, $sql);
            if($res){
              return true;
            }else{
            return false;
         }
        }
        public function read(){
        $sql = "SELECT * FROM alumnos";
        $res = mysqli_query($this->con, $sql);
        return $res;
        }
        public function single_record($matricula){
			$sql = "SELECT * FROM alumnos where matricula='$matricula'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function update($nombre,$apellido,$direccion,$correo_electronico, $matricula){
			$sql = "UPDATE clientes SET nombre='$nombre', apellido='$apellido', direccion='$direccion', correo_electronico='$correo_electronico' WHERE matricula=$matricula";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
        public function delete($matricula){
            $sql = "DELETE FROM alumnos WHERE matricula=$matricula";
            $res = mysqli_query($this->con, $sql);
            if($res){
            return true;
            }else{
            return false;
            }
        }
}
?>