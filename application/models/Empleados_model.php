<?php
class Empleados_model extends CI_Model {
	
		private $table_name = 'empleados';
		private $PK = 'LEGAJO';

        public function __construct()
        {
			$this->load->database();
        }
		public function getAll()
		{
			//Martín - Se modificó la consulta para devolver el cargo
			return $this->db->query("SELECT A.*, CASE WHEN A.$this->PK = B.$this->PK THEN 'E'
													  WHEN A.$this->PK = C.$this->PK THEN 'T'
												 END AS 'CARGO'
									 FROM $this->table_name A LEFT JOIN encargados B
									 ON B.$this->PK = A.$this->PK LEFT JOIN tecnicos C
									 ON C.$this->PK = A.$this->PK")->result_array();
			
		}
		public function getById($id)
		{
			return $this->db->query("SELECT A.*, CASE WHEN A.$this->PK = B.$this->PK THEN 'E'
													  WHEN A.$this->PK = C.$this->PK THEN 'T'
												 END AS 'CARGO'
									 FROM $this->table_name A LEFT JOIN encargados B
									 ON B.$this->PK = A.$this->PK LEFT JOIN tecnicos C
									 ON C.$this->PK = A.$this->PK
									 where A.$this->PK = $id")->row_array();
			
		}
		
		//Martín - Esta función busca y devuelve filas si $searchword contiene un valor o devuelve todas si está vacía
		public function search($field, $searchword)
		{
			return $this->db->query("SELECT A.*, CASE WHEN A.$this->PK = B.$this->PK THEN 'E'
													  WHEN A.$this->PK = C.$this->PK THEN 'T'
												 END AS 'CARGO'
									 FROM $this->table_name A LEFT JOIN encargados B
									 ON B.$this->PK = A.$this->PK LEFT JOIN tecnicos C
									 ON C.$this->PK = A.$this->PK
									 WHERE (A.$field LIKE '%$searchword%' AND '$searchword' <> ''
											OR '$searchword' = '')
									 ")->result_array();
		}
		
		public function insert($data, $cargo)
		{
			$retorno = $this->db->insert($this->table_name, $data);
			
			//Martín - Se verifica el tipo de empleado y se hace el INSERT en la tabla correspondiente
			if ($cargo == "T"){
				$insert = new Tecnicos_model;
				$insert->insert(array('LEGAJO' => $data['LEGAJO']));
			};
			if ($cargo == "E"){
				$insert = new Encargados_model;
				$insert->insert(array('LEGAJO' => $data['LEGAJO']));
			};
			
			return $retorno;
		}
		
		public function delete($id)
		{
			//Martín - Se limpian las tablas hijas primero
			$tecnico = new Tecnicos_model;
			if ($tecnico->getById($id)){
				$tecnico->delete($id);
			}
			$encargado = new Encargados_model;
			if ($encargado->getById($id)){
				$encargado->delete($id);
			}
			
			return $this->db->delete($this->table_name, array($this->PK => $id)); 
		}
		
		public function update($id, $data, $cargo)
		{
			//Martín - Se verifica el cargo del empleado y se inserta el legajo en la tabla correspondiente
			$tecnico = new Tecnicos_model;
			$encargado = new Encargados_model;
			if ($tecnico->getById($id) != NULL && $cargo == "E"){
				$tecnico->delete($id);
				$encargado->insert(array($encargado->PK => $id));
			}
			if ($encargado->getById($id) != NULL && $cargo == "T"){
				$encargado->delete($id);
				$tecnico->insert(array($tecnico->PK => $id));
			}
			
			$this->db->where($this->PK, $id);
			return $this->db->update($this->table_name, $data);
		}
		
		public function createPassword($password_string)
		{
			$options = array(
				'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
				'cost' => 12,
			);
			$password_hash = password_hash($password_string, PASSWORD_BCRYPT, $options);
			return $password_hash;
		}
		
		public function verifyPassword($password_string, $password_hash)
		{
			//return password_verify($password_string, $password_hash);
			return $password_string == $password_hash;
		}
		
		public function checkLogin($user, $pass)
		{
			$user_data = $this->db->query("SELECT *
							FROM $this->table_name
							where NOMBRE = '$user'
							")->row_array();
			if(isset($user_data)){
				if($this->verifyPassword($pass,$user_data['PASSWORD']))
					return $user_data;
			}
		}
		
		public function changePassword($id, $new_password)
		{
			$this->db->where($this->PK, $id);
			return $this->db->update($this->table_name, array('PASSWORD' => $new_password));
		}
		
}