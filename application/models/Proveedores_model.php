<?php
class Proveedores_model extends CI_Model {
	
		private $table_name = 'proveedores';
		private $PK = 'CUIT';

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
		
		public function search($field, $searchword)
		{
			return $this->db->query("SELECT *
									 FROM $this->table_name A
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