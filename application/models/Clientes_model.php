<?php
class Clientes_model extends CI_Model {
	
		private $table_name = 'clientes';
		private $PK = 'CUIT';

        public function __construct()
        {
			$this->load->database();
        }
		public function getAll()
		{
			return $this->db->query("SELECT  c.CUIT, c.RAZON_SOCIAL, c.DOMICILIO, c.TELEFONO, e.APELLIDO, c.ESTADO
									 FROM clientes c
									 JOIN empleados e ON c.LEGAJO_ENCARGADO=e.LEGAJO")->result_array();
			
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
		
}