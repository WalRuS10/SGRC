<?php
class Componentes_model extends CI_Model {
	
		private $table_name = 'componentes';
		private $PK = 'ID_COMPONENTE';

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
									 where $this->PK = $id")->row_array();
			
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
		
		public function add_proveedor($cuit_proveedor, $idcomponente, $precio)
		{
			$this->db->insert('proveedores_componentes', array('CUIT_PROVEEDOR' => $cuit_proveedor,
																'ID_COMPONENTE' => $idcomponente,
																'PRECIO' => $precio));
		}
		
}