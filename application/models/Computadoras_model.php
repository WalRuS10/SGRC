<?php
class Computadoras_model extends CI_Model {
	
		private $table_name = 'computadoras';
		private $PK = 'ID_COMPUTADORA';

        public function __construct()
        {
			$this->load->database();
        }
		public function getAll()
		{
			return $this->db->query("SELECT co.*, cl.RAZON_SOCIAL
									 FROM $this->table_name as co
									 LEFT JOIN clientes as cl on
										cl.CUIT = co.CUIT_CLIENTE
									 ")->result_array();
			
		}
		public function getById($id)
		{
			return $this->db->query("SELECT co.*, cl.RAZON_SOCIAL
									 FROM $this->table_name as co
									 LEFT JOIN clientes as cl on
										cl.CUIT = co.CUIT_CLIENTE
									 where $this->PK = $id")->row_array();
			
		}
		
		public function search($field, $searchword)
		{
			return $this->db->query("SELECT A.*, cl.RAZON_SOCIAL
									 FROM $this->table_name A
									 LEFT JOIN clientes cl on
										cl.CUIT = A.CUIT_CLIENTE
									 WHERE (A.$field LIKE '%$searchword%' AND '$searchword' <> ''
											OR '$searchword' = '')
									 ")->result_array();
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
		
}