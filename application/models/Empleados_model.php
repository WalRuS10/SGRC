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
			return $this->db->query("SELECT *
							FROM $this->table_name")->result_array();
			
		}
		public function getById($id)
		{
			return $this->db->query("SELECT *
							FROM $this->table_name
							where $this->PK = $id
							")->row_array();
			
		}
		
		public function search($keywords)
		{
			//To Do...
		}
		
		public function insert($data)
		{
			return $this->db->insert($this->table_name, $data);
		}
		
		public function delete($id)
		{
			return $this->db->delete($this->table_name, array($this->PK => $id)); 
		}
		
		public function update($id, $data)
		{
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
			echo $password_hash;
			return password_verify($password_string, $password_hash);
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
		
}